<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="css/estilo_panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <?php
    require "encabezado.php";
    ?>

    </header>

    <main class="dashboard">
        <h2>Perfil</h2>
        <br>
        <div class="cards">
            <div class="card">
                <form action="">
                    <!-- Aqui iria la foto de perfil -->
                    <figure class="foto_perfil">
                        <img src="" alt="">
                    </figure>
                    <br>
                    <input type="text" placeholder="Nombre">
                    <br>
                    <input type="text" placeholder="Contraseña">
                    <br>
                    <input type="button" value="Guardar">
                </form>
            </div>
        </div>

    </main>
    <script>
        $("#iconomenu").click(function() {
            $("#contenedormenu").toggleClass("abrir_menu");
        });

        $(".btn-ancla").click(function() {
            $("#contenedormenu").removeClass("abrir_menu");
        });
        $("#cerrarMenu").click(function() {
            $("#contenedormenu").removeClass("abrir_menu");
        });
    </script>
</body>

</html>