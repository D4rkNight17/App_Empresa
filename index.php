<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot - Asistente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .chat-container {
            width: 350px;
            max-width: 100%;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .chat-box {
            height: 300px;
            overflow-y: auto;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .chat-box .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            max-width: 80%;
        }

        .chat-box .user-message {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }

        .chat-box .bot-message {
            background-color: #e0e0e0;
            color: #333;
            align-self: flex-start;
        }

        .input-container {
            display: flex;
        }

        .input-container input {
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .input-container button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .input-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="chat-container">
    <h3>Asistente Virtual</h3>
    <div class="chat-box" id="chat-box">
        <!-- Mensajes del chat aparecerán aquí -->
    </div>

    <div class="input-container">
        <input type="text" id="user-message" placeholder="Escribe tu mensaje..." required>
        <button onclick="sendMessage()">Enviar</button>
    </div>
</div>

<script>
    function sendMessage() {
        const userMessage = document.getElementById('user-message').value;
        if (userMessage.trim() === '') return;

        // Añadir el mensaje del usuario al chat
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML += `<div class="message user-message">${userMessage}</div>`;
        document.getElementById('user-message').value = '';

        // Enviar el mensaje al servidor
        fetch('chat.php', {
            method: 'POST',
            body: new URLSearchParams({
                'text': userMessage
            }),
        })
        .then(response => response.text())
        .then(data => {
            // Añadir la respuesta del bot al chat
            chatBox.innerHTML += `<div class="message bot-message">${data}</div>`;
            chatBox.scrollTop = chatBox.scrollHeight; // Desplazar hacia abajo
        })
        .catch(error => {
            chatBox.innerHTML += `<div class="message bot-message">Error al procesar tu mensaje.</div>`;
        });
    }
</script>

</body>
</html>
