<?php
// API Key válida de OpenRouter (reemplázala con tu clave personal)
$apiKey = "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";  // Asegúrate de reemplazar esto con tu propia API Key

// Verificar si el mensaje ha sido enviado por el usuario
$userMessage = $_POST['text'] ?? 'Hola, ¿cómo puedo ayudarte a crear tu CV?';  // Si no se recibe mensaje, por defecto envía este

// Configuración de la solicitud a la API
$data = [
    "model" => "anthropic/claude-3-haiku",  // Modelo válido y gratuito
    "messages" => [
        // Establecer el propósito del asistente como creación de CV
        ["role" => "system", "content" => "Eres un asistente experto en creación de CVs. Ayuda al usuario a recopilar la información necesaria para crear un CV profesional. Pregunta por nombre, experiencia laboral, educación y habilidades, y ofrece sugerencias si es necesario."],
        ["role" => "user", "content" => $userMessage]  // Mensaje del usuario
    ],
    "temperature" => 0.7  // Control de creatividad de la respuesta
];

// Cabeceras necesarias para la solicitud HTTP
$headers = [
    "Authorization: Bearer $apiKey",  // Asegúrate de que la clave esté correcta
    "Content-Type: application/json",  // El tipo de contenido es JSON
    "HTTP-Referer: https://tusitio.com",  // Reemplaza con el dominio de tu sitio
    "X-Title: MiBotPHP"  // Nombre de tu aplicación o bot
];

// Inicializar cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://openrouter.ai/api/v1/chat/completions");  // Endpoint para crear chat completions
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  // Incluir cabeceras
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // Datos a enviar

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Verificar si ocurrió algún error en la solicitud
if ($response === false) {
    echo "Error: " . curl_error($ch);
    curl_close($ch);
    exit;
}

// Cerrar la conexión cURL
curl_close($ch);

// Decodificar la respuesta JSON
$result = json_decode($response, true);

// Verificar si la respuesta contiene un mensaje válido
if (isset($result['choices'][0]['message']['content'])) {
    echo nl2br($result['choices'][0]['message']['content']);  // Mostrar respuesta del bot
} else {
    echo "❌ Error en la respuesta:<br><pre>";
    print_r($result);  // Mostrar error completo si no se obtiene respuesta válida
    echo "</pre>";
}
?>
