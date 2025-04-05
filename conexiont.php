<?php
$host = "localhost";
$usuario = "root";
$clave = ""; // Si usas XAMPP y no configuraste clave, déjalo vacío
$bd = "chatbot_cv";

$con = new mysqli($host, $usuario, $clave, $bd);

if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
?>
