
<?php

require_once "../config/conexion.php";
require_once "common.php";

$id = intval($_GET["id"] ?? 0);

if ($id <= 0) {
    responderJSON([
        "success" => false,
        "message" => "Identificador inválido."
    ], 400);
}

$stmt = $conn->prepare(
    "SELECT * FROM proyectos WHERE id_proyecto = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$proyecto = $resultado->fetch_assoc();

if (!$proyecto) {
    responderJSON([
        "success" => false,
        "message" => "No se encontró el proyecto."
    ], 404);
}

responderJSON([
    "success" => true,
    "proyecto" => $proyecto
]);
