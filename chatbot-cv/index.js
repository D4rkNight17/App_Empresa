require("dotenv").config();
const express = require("express");
const cors = require("cors");

const app = express();

// Middleware
app.use(express.json()); // Para procesar JSON
app.use(cors()); // Habilitar CORS

// Ruta de prueba
app.get("/", (req, res) => {
    res.send("¡El servidor está funcionando! 🚀");
});

// Configuración del puerto
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
    console.log(`✅ Servidor corriendo en http://localhost:${PORT}`);
});
