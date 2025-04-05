<?php
require "conexion.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasenia = $_POST['contrasenia'];

$contrasena_encriptada = password_hash($contrasenia , PASSWORD_DEFAULT);

// Verificar
$veridicar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE correo = '$correo'");

if (mysqli_num_rows($veridicar_usuario) > 0) {
  echo '
  <script>
    alert("ESTE USUARIO YA ESTA REGISTRADO");
    location.href="../registro.php";
  </script> ';
  exit;
}
$insertar = "INSERT INTO usuarios (nombre, correo, contrasenia) VALUES ('$nombre', '$correo','$contrasena_encriptada')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
  <script>
    alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
    location.href="../login.php";
  </script>
  ';
  } else {
    echo '
  <script>
    alert("NO SE GUARDO EN LA BASE DE DATOS");
    location.href="../registro.php";
  </script>
  ';
  }