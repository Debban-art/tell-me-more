<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../config/config_api.php';
// Incluir la función consultarOpenAI() definida arriba

$id_proyecto = filter_input(INPUT_GET, 'id_proyecto', FILTER_VALIDATE_INT);
$perfil_sinodal = trim($_GET['perfil_sinodal'] ?? 'general');

$perfiles_validos = ['tecnico', 'metodologico', 'critico', 'general'];
if (!in_array($perfil_sinodal, $perfiles_validos)) $perfil_sinodal = 'general';

if (!$id_proyecto) {
    echo json_encode(["success" => false, "message" => "ID de proyecto inválido", "data" => null]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM proyectos WHERE id_proyecto = ?");
$stmt->bind_param("i", $id_proyecto);
$stmt->execute();
$proyecto = $stmt->get_result()->fetch_assoc();
$stmt->close();
$conn->close();

if (!$proyecto) {
    echo json_encode(["success" => false, "message" => "Proyecto no encontrado", "data" => null]);
    exit;
}

$prompt_sistema = "Eres un sinodal de Speech AI. Genera 3 preguntas de defensa basadas estrictamente en el proyecto. Devuelve un JSON: {\"preguntas\": [\"P1\", \"P2\", \"P3\"]}";
$prompt_usuario = "Perfil: {$perfil_sinodal}\nProyecto: {$proyecto['titulo_proyecto']}\nDesc: {$proyecto['descripcion']}\nObjetivo: {$proyecto['objetivo']}\nMetodología: {$proyecto['metodologia']}\nTecnologías: {$proyecto['tecnologias']}";

$messages = [
    ["role" => "system", "content" => $prompt_sistema],
    ["role" => "user", "content" => $prompt_usuario]
];

$respuesta_ai = consultarOpenAI($messages, true);
$datos_ai = json_decode($respuesta_ai, true);

if (!$datos_ai || !isset($datos_ai['preguntas'])) {
    $datos_ai = [
        "preguntas" => [
            "¿Cómo garantizaste la viabilidad técnica de las tecnologías descritas?",
            "¿De qué forma los resultados obtenidos validan directamente el objetivo general?",
            "¿Cuáles fueron las principales limitaciones metodológicas que enfrentaste?"
        ]
    ];
}

echo json_encode(["success" => true, "message" => "Preguntas generadas", "data" => $datos_ai]);