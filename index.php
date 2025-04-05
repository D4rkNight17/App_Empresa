<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Chat Asistente de CV</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .chat-container {
      max-width: 600px;
      margin: 0 auto;
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      height: 90vh;
      display: flex;
      flex-direction: column;
    }
    .chat-box {
      flex: 1;
      overflow-y: auto;
      margin-bottom: 10px;
    }
    .message {
      padding: 10px;
      margin: 5px 0;
      border-radius: 8px;
      max-width: 80%;
    }
    .user {
      background: #d1e7dd;
      align-self: flex-end;
    }
    .bot {
      background: #f8d7da;
      align-self: flex-start;
    }
    form {
      display: flex;
    }
    input[type="text"] {
      flex: 1;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      padding: 10px;
      border: none;
      background: #0d6efd;
      color: white;
      border-radius: 5px;
      margin-left: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="chat-container">
    <div class="chat-box" id="chat-box">
      <div class="message bot">👋 ¡Hola! Te ayudaré a crear tu CV. ¿Cuál es tu nombre completo?</div>
    </div>
    <form id="chat-form">
      <input type="text" id="user-input" placeholder="Escribe tu respuesta..." required />
      <button type="submit">Enviar</button>
    </form>
  </div>

  <script>
    const form = document.getElementById("chat-form");
    const input = document.getElementById("user-input");
    const chatBox = document.getElementById("chat-box");

    let currentQuestionIndex = 0;
    const questions = [
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

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const message = input.value;
      if (!message) return;

      // Mostrar mensaje del usuario
      chatBox.innerHTML += `<div class="message user">${message}</div>`;
      chatBox.scrollTop = chatBox.scrollHeight;

      // Enviar al servidor
      const response = await fetch("chat.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "text=" + encodeURIComponent(message) + "&question=" + currentQuestionIndex
      });

      const data = await response.text();

      // Mostrar respuesta de la IA
      chatBox.innerHTML += `<div class="message bot">${data}</div>`;
      chatBox.scrollTop = chatBox.scrollHeight;

      input.value = "";
    });
  </script>
</body>
</html>
