<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../config/config_api.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Método no permitido", "data" => null]);
    exit;
}

$id_sesion = filter_input(INPUT_POST, 'id_sesion', FILTER_VALIDATE_INT);
$perfil_sinodal = trim($_POST['perfil_sinodal'] ?? 'general');
$pregunta = trim($_POST['pregunta'] ?? '');
$respuesta = trim($_POST['respuesta'] ?? '');

if (empty($pregunta) || empty($respuesta)) {
    echo json_encode(["success" => false, "message" => "Faltan datos de pregunta o respuesta", "data" => null]);
    exit;
}

$prompt_sistema = "Evalúa la respuesta de un estudiante en Speech AI bajo criterios: claridad, pertinencia, justificación, fundamentación. Devuelve un JSON estricto:
{
  \"calificacion_sugerida\": \"Aceptable / Excelente / Debe mejorar\",
  \"criterios\": { \"claridad\": \"...\", \"pertinencia\": \"...\", \"justificacion\": \"...\", \"fundamentacion\": \"...\" },
  \"sugerencia_mejora\": \"...\"
}";

$messages = [
    ["role" => "system", "content" => $prompt_sistema],
    ["role" => "user", "content" => "Perfil: {$perfil_sinodal}\nPregunta: {$pregunta}\nRespuesta: {$respuesta}"]
];

$respuesta_ai = consultarOpenAI($messages, true);
$evaluacion_data = json_decode($respuesta_ai, true);

if (!$evaluacion_data) {
    $evaluacion_data = [
        "calificacion_sugerida" => "Aceptable",
        "criterios" => ["claridad" => "Buena", "pertinencia" => "Adecuada", "justificacion" => "Falta profundizar", "fundamentacion" => "Respaldo básico"],
        "sugerencia_mejora" => "Conecta de manera directa tu respuesta con la arquitectura del proyecto."
    ];
}

if ($id_sesion && $id_sesion > 0) {
    $eval_json = json_encode($evaluacion_data, JSON_UNESCAPED_UNICODE);
    $stmt = $conn->prepare("INSERT INTO respuestas_simulador (id_sesion, perfil_sinodal, pregunta, respuesta, evaluacion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id_sesion, $perfil_sinodal, $pregunta, $respuesta, $eval_json);
    $stmt->execute();
    $stmt->close();
}
$conn->close();

echo json_encode(["success" => true, "message" => "Evaluación completada", "data" => $evaluacion_data]);