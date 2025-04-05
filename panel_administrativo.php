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
        <h2>Bienvenido(a)</h2>

        <div class="cards">
            <div class="card">
                <p>Total de CVs</p>
                <h3>12</h3>
                <small>+2 desde el mes pasado</small>
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