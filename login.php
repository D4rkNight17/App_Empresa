<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="css/estilo_login.css">
</head>
<body>
  <div class="login-container">
    <div class="titulo">
      <h1>GenMyCV</h1>
    </div>
    <br>
    <h2>Iniciar Sesión</h2>
    <form action="backend/verificar.php" method="POST">
      <label for="#">Correo electronico:</label>
      <input type="text" name="correo" placeholder="Ingrese su Correo" required><br>
      <label for="#">Contraseña:</label>
      <input type="password" name="contrasenia" placeholder="Ingrese su Contraseña" required>
      <button type="submit">Ingresar</button>
    </form>

    <div class="links">
      <a href="registro.php">¿No tienes cuenta? Regístrate</a>
      <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
    </div>
  </div>
</body>
</html>
