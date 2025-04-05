<?php
$apiKey = "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";  // Tu API key real

$userMessage = $_POST['text'] ?? 'Hola, ¿cómo estás?';

$data = [
    "model" => "anthropic/claude-3-haiku",  // Modelo válido y gratuito
    "messages" => [
        ["role" => "system", "content" => "Eres un asistente amigable y útil."],
        ["role" => "user", "content" => $userMessage]
    ],
    "temperature" => 0.7
];

$headers = [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json",
    "HTTP-Referer: https://tusitio.com",  // Requerido por OpenRouter
    "X-Title: MiBotPHP"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://openrouter.ai/api/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if (isset($result['choices'][0]['message']['content'])) {
    echo nl2br($result['choices'][0]['message']['content']);
} else {
    echo "❌ Error en la respuesta:<br><pre>";
    print_r($result);
    echo "</pre>";
}
