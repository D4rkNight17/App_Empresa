<?php
require "conection.php";

$nombre_cliente = $_POST['usuario_nombre'];
$usuario_correo = $_POST['usuario_correo'];
$contrasenia_cliente = $_POST['usuario_password'];


// Verificar
$veridicar_usuario = mysqli_query($conectar, "SELECT * FROM cliente WHERE usuario_correo = '$usuario_correo'");

if (mysqli_num_rows($veridicar_usuario) > 0) {
  echo '
  <script>
    alert("ESTE CLIENTE YA ESTA REGISTRADO");
    location.href="../ProyectoFinal/alta_cliente.php";
  </script> ';
  exit;
}
$insertar = "INSERT INTO cliente (nombre_cliente, usuario_correo, contrasenia_cliente) VALUES ('$nombre_cliente', '$usuario_correo','$contrasenia_cliente')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
  <script>
    alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
    location.href="../ProyectoFinal/cliente.php";
  </script>
  ';
  } else {
    echo '
  <script>
    alert("NO SE GUARDO EN LA BASE DE DATOS");
    location.href="../ProyectoFinal/alta_cliente.php";
  </script>';
}