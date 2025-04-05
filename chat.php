<?php
session_start();

// Si es la primera vez que el usuario interactúa, iniciar el array de respuestas
if (!isset($_SESSION['responses'])) {
    $_SESSION['responses'] = [];
}

$apiKey = "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";  // Asegúrate de reemplazarla por tu propia API Key

$questions = [
    "¿Cuál es tu nombre completo?",
    "¿Cuál es tu número de teléfono y correo electrónico?",
    "¿Tienes LinkedIn, portafolio web o redes profesionales relevantes?",
    "¿Cuál es tu dirección (opcional, dependiendo del país)?",
    "¿Cuál es tu profesión o área de expertise?",
    "¿Qué te define como profesional en 3-4 líneas?",
    "¿Qué valor puedes aportar a una empresa?",
    "¿Cuáles han sido tus trabajos anteriores (empresa, puesto, periodo)?",
    "¿Cuáles fueron tus principales logros en cada puesto? (Usa verbos de acción: Gestioné, Implementé, Logré)",
    "¿Tienes experiencia freelance o proyectos relevantes?",
    "¿Qué títulos o certificaciones tienes (universidad, técnico, cursos)?",
    "¿Incluyes año de inicio y graduación?",
    "¿Qué habilidades técnicas dominas (herramientas, idiomas, software)?",
    "¿Qué habilidades interpersonales destacan en ti (liderazgo, comunicación)?",
    "¿Has recibido premios, reconocimientos o certificaciones relevantes?",
    "¿Has participado en voluntariados o proyectos extracurriculares?",
    "¿Qué idiomas hablas y en qué nivel (B1, C2, nativo)?",
    "¿Incluirás referencias laborales o será 'disponibles bajo petición'?",
    "¿Tienes disponibilidad para viajar o reubicarte?",
    "¿Quieres añadir información adicional (intereses relevantes, blog, publicaciones)?"
];

// Obtener la pregunta actual
$currentQuestionIndex = $_POST['question'] ?? 0;
$userMessage = $_POST['text'] ?? '';

// Verificar si el mensaje del usuario es válido
if (!empty($userMessage)) {
    $_SESSION['responses'][] = $userMessage;
}

// Si ya se respondieron todas las preguntas
if ($currentQuestionIndex >= count($questions)) {
    echo "Gracias por responder todas las preguntas. ¡Tu CV está listo!";
    exit;
}

// Verificar la respuesta y si es válida
$response = '';
switch ($currentQuestionIndex) {
    case 0:
        $response = "Perfecto, tu nombre completo es: " . htmlspecialchars($userMessage) . ".";
        break;
    case 1:
        $response = "Genial, tu contacto es: " . htmlspecialchars($userMessage) . ".";
        break;
    default:
        $response = "Gracias por tu respuesta. Ahora, " . $questions[$currentQuestionIndex + 1];
        break;
}

// Configuración de la solicitud a la API
$data = [
    "model" => "anthropic/claude-3-haiku",  // Modelo válido y gratuito
    "messages" => [
        ["role" => "system", "content" => "Eres un asistente experto en creación de CVs. Ayuda al usuario a recopilar la información necesaria para crear un CV profesional."],
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
$responseFromAI = curl_exec($ch);

// Verificar si ocurrió algún error en la solicitud
if ($responseFromAI === false) {
    echo "Error: " . curl_error($ch);
    curl_close($ch);
    exit;
}

// Cerrar la conexión cURL
curl_close($ch);

// Decodificar la respuesta JSON
$result = json_decode($responseFromAI, true);

// Verificar si la respuesta contiene un mensaje válido
if (isset($result['choices'][0]['message']['content'])) {
    echo $result['choices'][0]['message']['content'];  // Mostrar respuesta de la IA
} else {
    echo "❌ Error en la respuesta:<br><pre>";
    print_r($result);  // Mostrar error completo si no se obtiene respuesta válida
    echo "</pre>";
}
?>
