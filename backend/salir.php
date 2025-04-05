<?php
session_start();
session_destroy();
echo '<script>
alert("AHORA YA SALISTES DEL SISTEMA");
location.href = "../login.php";</script>';