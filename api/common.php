
<?php

require_once __DIR__ . "/../config/gemini.php";

function responderGemini($instruccion) {

    $payload = [
        "model" => GEMINI_MODEL,
        "input" => $instruccion
    ];

    $ch = curl_init(GEMINI_URL);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-goog-api-key: " . GEMINI_API_KEY
        ],
        CURLOPT_POSTFIELDS => json_encode(
            $payload,
            JSON_UNESCAPED_UNICODE
        ),
        CURLOPT_TIMEOUT => 90
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($error) {
        throw new Exception("Error de conexión: " . $error);
    }

    $data = json_decode($response, true);

    if ($status < 200 || $status >= 300) {
        $message = $data["error"]["message"]
            ?? "Error al consultar Gemini.";

        throw new Exception($message);
    }

    if (!isset($data["output"]) || !is_array($data["output"])) {
        throw new Exception("Gemini no devolvió una respuesta válida.");
    }

    $texto = "";

    foreach ($data["output"] as $step) {
        if (($step["type"] ?? "") === "model_output") {
            foreach (($step["content"] ?? []) as $content) {
                if (($content["type"] ?? "") === "text") {
                    $texto .= $content["text"] ?? "";
                }
            }
        }
    }

    if (!$texto) {
        throw new Exception("La IA devolvió una respuesta vacía.");
    }

    // Eliminar posibles bloques Markdown
    $texto = trim($texto);

    $texto = preg_replace(
        '/^```(?:json)?\s*/i',
        '',
        $texto
    );

    $texto = preg_replace('/\s*```$/', '', $texto);

    $resultado = json_decode($texto, true);

    if (!is_array($resultado)) {
        throw new Exception(
            "La IA no devolvió un JSON válido."
        );
    }

    return $resultado;
}

function responderJSON($data, $status = 200) {

    http_response_code($status);

    header("Content-Type: application/json; charset=utf-8");

    echo json_encode(
        $data,
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

function obtenerJSON() {

    $data = json_decode(
        file_get_contents("php://input"),
        true
    );

    if (!is_array($data)) {
        responderJSON([
            "success" => false,
            "message" => "Solicitud JSON inválida."
        ], 400);
    }

    return $data;
}
