
<?php

require_once "../config/conexion.php";
require_once "common.php";

$data = obtenerJSON();

$idProyecto = intval($data["id_proyecto"] ?? 0);
$perfil = trim($data["perfil"] ?? "General");
$dificultad = trim($data["dificultad"] ?? "Intermedio");

$perfiles = [
    "Técnico",
    "Metodológico",
    "Crítico",
    "General"
];

if ($idProyecto <= 0 || !in_array($perfil, $perfiles, true)) {
    responderJSON([
        "success" => false,
        "message" => "Datos de simulación inválidos."
    ], 422);
}

$stmt = $conn->prepare(
    "SELECT * FROM proyectos WHERE id_proyecto = ?"
);

$stmt->bind_param("i", $idProyecto);
$stmt->execute();

$proyecto = $stmt->get_result()->fetch_assoc();

if (!$proyecto) {
    responderJSON([
        "success" => false,
        "message" => "No se encontró el proyecto."
    ], 404);
}

$contexto = "
PROYECTO: {$proyecto['titulo']}

CARRERA: {$proyecto['carrera']}

DESCRIPCIÓN:
{$proyecto['descripcion']}

PROBLEMÁTICA:
{$proyecto['problematica']}

OBJETIVO:
{$proyecto['objetivo']}

JUSTIFICACIÓN:
{$proyecto['justificacion']}

METODOLOGÍA:
{$proyecto['metodologia']}

TECNOLOGÍAS:
{$proyecto['tecnologias']}

RESULTADOS:
{$proyecto['resultados']}
";

$instruccion = "
Actúa como un sinodal universitario que realiza
una defensa de proyecto final.

Debes generar exactamente 5 preguntas.

PERFIL DEL SINODAL: $perfil
DIFICULTAD: $dificultad

CONTEXTO DEL PROYECTO:
$contexto

INSTRUCCIONES:

1. Todas las preguntas deben estar relacionadas
   con el proyecto proporcionado.

2. No inventes características del proyecto.

3. No hagas preguntas genéricas que podrían
   aplicarse a cualquier proyecto.

4. Formula preguntas que evalúen comprensión,
   justificación y capacidad de argumentación.

5. Adapta las preguntas al perfil del sinodal.

6. Aumenta progresivamente la dificultad.

7. Si falta información en el proyecto, pregunta
   sobre esa ausencia sin asumir una respuesta.

RESPONDE EXCLUSIVAMENTE CON JSON:

{
  \"preguntas\": [
    {
      \"pregunta\": \"Texto de la pregunta\",
      \"objetivo\": \"Qué busca evaluar\",
      \"tema\": \"Tema evaluado\"
    }
  ]
}
";

try {

    $resultado = responderGemini($instruccion);

    $preguntas = $resultado["preguntas"] ?? [];

    if (count($preguntas) !== 5) {
        throw new Exception(
            "La IA no generó las cinco preguntas solicitadas."
        );
    }

    foreach ($preguntas as $pregunta) {
        if (
            empty($pregunta["pregunta"]) ||
            empty($pregunta["objetivo"]) ||
            empty($pregunta["tema"])
        ) {
            throw new Exception("Formato de preguntas incompleto.");
        }
    }

    $jsonPreguntas = json_encode(
        $preguntas,
        JSON_UNESCAPED_UNICODE
    );

    $stmt = $conn->prepare(
        "INSERT INTO simulaciones
        (id_proyecto, perfil, dificultad, preguntas)
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "isss",
        $idProyecto,
        $perfil,
        $dificultad,
        $jsonPreguntas
    );

    $stmt->execute();

    responderJSON([
        "success" => true,
        "id_simulacion" => $conn->insert_id,
        "preguntas" => $preguntas
    ]);

} catch (Throwable $e) {

    error_log($e->getMessage());

    responderJSON([
        "success" => false,
        "message" => $e->getMessage()
    ], 500);
}
