<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "speech_ai";

$conn = mysqli_init();
$conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
@$conn->real_connect($host, $usuario, $password, $base_datos);

if ($conn->connect_error) {
    error_log("Error de conexión MySQL: " . $conn->connect_error);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        "success" => false,
        "message" => "Error de conexión con la base de datos",
        "data" => null
    ]);
    exit;
}

$conn->set_charset("utf8mb4");