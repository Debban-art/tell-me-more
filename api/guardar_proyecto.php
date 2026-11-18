
<?php

require_once "../config/conexion.php";
require_once "common.php";

$data = obtenerJSON();

$id = intval($data["id_proyecto"] ?? 0);

$campos = [
    "nombre_estudiante",
    "carrera",
    "titulo",
    "descripcion",
    "problematica",
    "objetivo",
    "justificacion",
    "metodologia",
    "tecnologias",
    "resultados",
    "duracion",
    "preocupacion"
];

$valores = [];

foreach ($campos as $campo) {
    $valores[$campo] = trim((string)($data[$campo] ?? ""));
}

if ($valores["titulo"] === "" || $valores["descripcion"] === "") {
    responderJSON([
        "success" => false,
        "message" => "El título y la descripción son obligatorios."
    ], 422);
}

$duracion = max(1, min(120, intval($valores["duracion"])));

if ($id > 0) {

    $sql = "UPDATE proyectos SET
        nombre_estudiante=?,
        carrera=?,
        titulo=?,
        descripcion=?,
        problematica=?,
        objetivo=?,
        justificacion=?,
        metodologia=?,
        tecnologias=?,
        resultados=?,
        duracion=?,
        preocupacion=?
        WHERE id_proyecto=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssssisi",
        $valores["nombre_estudiante"],
        $valores["carrera"],
        $valores["titulo"],
        $valores["descripcion"],
        $valores["problematica"],
        $valores["objetivo"],
        $valores["justificacion"],
        $valores["metodologia"],
        $valores["tecnologias"],
        $valores["resultados"],
        $duracion,
        $valores["preocupacion"],
        $id
    );

    $stmt->execute();

    if ($stmt->affected_rows < 0) {
        responderJSON([
            "success" => false,
            "message" => "No se pudo actualizar el proyecto."
        ], 500);
    }

    $idProyecto = $id;

} else {

    $sql = "INSERT INTO proyectos (
        nombre_estudiante,
        carrera,
        titulo,
        descripcion,
        problematica,
        objetivo,
        justificacion,
        metodologia,
        tecnologias,
        resultados,
        duracion,
        preocupacion
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssssis",
        $valores["nombre_estudiante"],
        $valores["carrera"],
        $valores["titulo"],
        $valores["descripcion"],
        $valores["problematica"],
        $valores["objetivo"],
        $valores["justificacion"],
        $valores["metodologia"],
        $valores["tecnologias"],
        $valores["resultados"],
        $duracion,
        $valores["preocupacion"]
    );

    if (!$stmt->execute()) {
        responderJSON([
            "success" => false,
            "message" => "No se pudo registrar el proyecto."
        ], 500);
    }

    $idProyecto = $conn->insert_id;
}

responderJSON([
    "success" => true,
    "id_proyecto" => $idProyecto,
    "message" => "Proyecto guardado correctamente."
]);
