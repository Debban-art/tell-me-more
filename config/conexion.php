
<?php

$host = "localhost";
$usuario = "root";
$password = "";
$database = "defensa_ai";

$conn = new mysqli(
    $host,
    $usuario,
    $password,
    $database
);

if ($conn->connect_error) {
    error_log($conn->connect_error);

    http_response_code(500);
    die("Error al conectar con la base de datos.");
}

$conn->set_charset("utf8mb4");
