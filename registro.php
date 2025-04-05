<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro</title>
  <link rel="stylesheet" href="css/estilo_login.css">
</head>
<body>
  <div class="login-container">
    <h2>Crear Cuenta</h2>
    <form action="backend/registro_usuarios.php" method="POST">
      <input type="text" name="nombre" placeholder="Usuario" required>
      <input type="email" name="correo" placeholder="Correo electrónico" required>
      <input type="password" name="contrasenia" placeholder="Contraseña" required>
      <button type="submit">Registrarme</button>
    </form>

    <div class="links">
      <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
  </div>
</body>
</html>
