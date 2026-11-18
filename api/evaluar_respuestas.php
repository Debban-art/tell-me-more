
<?php

require_once "../config/conexion.php";
require_once "common.php";

$data = obtenerJSON();

$idSimulacion = intval($data["id_simulacion"] ?? 0);
$numero = intval($data["numero_pregunta"] ?? 0);
$respuesta = trim($data["respuesta"] ?? "");

if (
    $idSimulacion <= 0 ||
    $numero < 0 ||
    strlen($respuesta) < 10 ||
    strlen($respuesta) > 10000
) {
    responderJSON([
        "success" => false,
        "message" => "La respuesta o los datos son inválidos."
    ], 422);
}

$stmt = $conn->prepare("
    SELECT
        s.id_simulacion,
        s.perfil,
        s.dificultad,
        s.preguntas,
        p.titulo,
        p.descripcion,
        p.problematica,
        p.objetivo,
        p.justificacion,
        p.metodologia,
        p.tecnologias,
        p.resultados
    FROM simulaciones s
    INNER JOIN proyectos p
        ON p.id_proyecto = s.id_proyecto
    WHERE s.id_simulacion = ?
      AND s.estado = 'en_progreso'
");

$stmt->bind_param("i", $idSimulacion);
$stmt->execute();

$simulacion = $stmt->get_result()->fetch_assoc();

if (!$simulacion) {
    responderJSON([
        "success" => false,
        "message" => "La simulación no existe o ya terminó."
    ], 404);
}

$preguntas = json_decode(
    $simulacion["preguntas"],
    true
);

if (!isset($preguntas[$numero])) {
    responderJSON([
        "success" => false,
        "message" => "La pregunta no existe."
    ], 404);
}

$pregunta = $preguntas[$numero]["pregunta"];

$contexto = "
PROYECTO: {$simulacion['titulo']}
DESCRIPCIÓN: {$simulacion['descripcion']}
PROBLEMÁTICA: {$simulacion['problematica']}
OBJETIVO: {$simulacion['objetivo']}
JUSTIFICACIÓN: {$simulacion['justificacion']}
METODOLOGÍA: {$simulacion['metodologia']}
TECNOLOGÍAS: {$simulacion['tecnologias']}
RESULTADOS: {$simulacion['resultados']}
";

$instruccion = "
Actúa como un evaluador universitario.

PERFIL DEL SINODAL:
{$simulacion['perfil']}

DIFICULTAD:
{$simulacion['dificultad']}

CONTEXTO DEL PROYECTO:
$contexto

PREGUNTA REALIZADA:
$pregunta

RESPUESTA DEL ESTUDIANTE:
$respuesta

Evalúa la respuesta de forma constructiva.

CRITERIOS:

1. Pertinencia: responde realmente la pregunta.
2. Claridad: explica las ideas comprensiblemente.
3. Fundamentación: proporciona razones y evidencias.
4. Argumentación: justifica las decisiones.
5. Dominio: demuestra comprensión del proyecto.

IMPORTANTE:

- No inventes información.
- No supongas que algo es correcto si no está respaldado.
- Distingue entre una respuesta incompleta y una incorrecta.
- No castigues al alumno por no utilizar términos técnicos
  cuando la explicación sea conceptualmente correcta.
- La puntuación es orientativa, no una calificación oficial.

Devuelve exclusivamente JSON:

{
  \"puntaje\": 75,
  \"pertinencia\": 80,
  \"claridad\": 70,
  \"fundamentacion\": 60,
  \"argumentacion\": 75,
  \"fortalezas\": [
    \"Fortaleza identificada\"
  ],
  \"mejoras\": [
    \"Aspecto que necesita mejorar\"
  ],
  \"respuesta_sugerida\": \"Ejemplo de una respuesta mejor desarrollada\",
  \"pregunta_seguimiento\": \"Pregunta adicional relacionada con la respuesta\"
}
";

try {

    $evaluacion = responderGemini($instruccion);

    if (
        !isset($evaluacion["puntaje"]) ||
        !isset($evaluacion["fortalezas"]) ||
        !isset($evaluacion["mejoras"]) ||
        !isset($evaluacion["respuesta_sugerida"]) ||
        !isset($evaluacion["pregunta_seguimiento"])
    ) {
        throw new Exception("Evaluación incompleta.");
    }

    $evaluacion["puntaje"] = max(
        0,
        min(100, intval($evaluacion["puntaje"]))
    );

    $jsonEvaluacion = json_encode(
        $evaluacion,
        JSON_UNESCAPED_UNICODE
    );

    // Incorporar la pregunta de seguimiento al historial
$seguimiento = trim(
    $evaluacion["pregunta_seguimiento"] ?? ""
);

if ($seguimiento !== "" && count($preguntas) < 10) {

    $preguntas[] = [
        "pregunta" => $seguimiento,
        "objetivo" => "Profundizar en la respuesta anterior",
        "tema" => "Seguimiento"
    ];

    $jsonPreguntas = json_encode(
        $preguntas,
        JSON_UNESCAPED_UNICODE
    );

    $update = $conn->prepare(
        "UPDATE simulaciones SET preguntas = ?
         WHERE id_simulacion = ?"
    );

    $update->bind_param(
        "si",
        $jsonPreguntas,
        $idSimulacion
    );

    $update->execute();
}

    $stmt = $conn->prepare("
        INSERT INTO respuestas (
            id_simulacion,
            numero_pregunta,
            pregunta,
            respuesta,
            evaluacion
        ) VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "iisss",
        $idSimulacion,
        $numero,
        $pregunta,
        $respuesta,
        $jsonEvaluacion
    );

    $stmt->execute();

    responderJSON([
        "success" => true,
        "evaluacion" => $evaluacion
    ]);

} catch (Throwable $e) {

    error_log($e->getMessage());

    responderJSON([
        "success" => false,
        "message" => $e->getMessage()
    ], 500);
}
