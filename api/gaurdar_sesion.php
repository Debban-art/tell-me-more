<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Método no permitido", "data" => null]);
    exit;
}

$id_proyecto = filter_input(INPUT_POST, 'id_proyecto', FILTER_VALIDATE_INT);
$duracion = filter_input(INPUT_POST, 'duracion', FILTER_VALIDATE_INT) ?? 0;
$transcripcion = trim($_POST['transcripcion'] ?? '');
$palabras = filter_input(INPUT_POST, 'palabras', FILTER_VALIDATE_INT) ?? 0;
$muletillas = filter_input(INPUT_POST, 'muletillas', FILTER_VALIDATE_INT) ?? 0;
$pausas = filter_input(INPUT_POST, 'pausas', FILTER_VALIDATE_INT) ?? 0;
$ppm = filter_input(INPUT_POST, 'ppm', FILTER_VALIDATE_INT) ?? 0;
$retroalimentacion = trim($_POST['retroalimentacion'] ?? '');

if (!$id_proyecto) {
    echo json_encode(["success" => false, "message" => "ID de proyecto requerido", "data" => null]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO sesiones (id_proyecto, duracion, transcripcion, palabras, muletillas, pausas, ppm, retroalimentacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisiiiis", $id_proyecto, $duracion, $transcripcion, $palabras, $muletillas, $pausas, $ppm, $retroalimentacion);

if ($stmt->execute()) {
    $id_sesion = $stmt->insert_id;
    echo json_encode(["success" => true, "message" => "Sesión guardada", "data" => ["id_sesion" => $id_sesion]]);
} else {
    echo json_encode(["success" => false, "message" => "Error al guardar sesión", "data" => null]);
}

$stmt->close();
$conn->close();