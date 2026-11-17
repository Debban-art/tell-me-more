<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Método no permitido", "data" => null]);
    exit;
}

$nombre = trim($_POST['nombre_estudiante'] ?? '');
$titulo = trim($_POST['titulo_proyecto'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$objetivo = trim($_POST['objetivo'] ?? '');
$metodologia = trim($_POST['metodologia'] ?? '');
$tecnologias = trim($_POST['tecnologias'] ?? '');
$resultados = trim($_POST['resultados'] ?? '');

if (empty($nombre) || empty($titulo) || empty($descripcion) || empty($objetivo)) {
    echo json_encode(["success" => false, "message" => "Faltan campos obligatorios", "data" => null]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO proyectos (nombre_estudiante, titulo_proyecto, descripcion, objetivo, metodologia, tecnologias, resultados) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nombre, $titulo, $descripcion, $objetivo, $metodologia, $tecnologias, $resultados);

if ($stmt->execute()) {
    $id_proyecto = $stmt->insert_id;
    echo json_encode([
        "success" => true,
        "message" => "Proyecto guardado exitosamente",
        "data" => ["id_proyecto" => $id_proyecto]
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Error al guardar en base de datos", "data" => null]);
}

$stmt->close();
$conn->close();