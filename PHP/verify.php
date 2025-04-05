<?php

require "conection.php";

$usuario = addslashes($_POST['usuario']);
$contrasenia = addslashes($_POST['contrasenia']);


$comparar = "SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {

    $fila = $resultado->fetch_array();

    if (password_verify($contrasenia, $fila["contrasenia"]))
        session_start();
        $_SESSION["username"] = $usuario;
        $_SESSION["autentificar"] = "SI";
        header("Location:panel.php");
    }else{
        header("Location: login.php?errorusario=SI");
    }
mysqli_free_result($resultado);
mysqli_close($conectar);