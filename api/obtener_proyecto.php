<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion.php';

$id_proyecto = filter_input(INPUT_GET, 'id_proyecto', FILTER_VALIDATE_INT);

if (!$id_proyecto || $id_proyecto <= 0) {
    echo json_encode(["success" => false, "message" => "ID de proyecto inválido", "data" => null]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM proyectos WHERE id_proyecto = ?");
$stmt->bind_param("i", $id_proyecto);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode(["success" => true, "message" => "Proyecto encontrado", "data" => $row]);
} else {
    echo json_encode(["success" => false, "message" => "El proyecto no existe", "data" => null]);
}

$stmt->close();
$conn->close();