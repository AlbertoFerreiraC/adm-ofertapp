<?php
// dashboard.php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    // CORRECCIÓN DE RUTA: Ahora el login está en la subcarpeta 'modulos'.
    header('Location: modulos/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - OfertApp</title>

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'menu.php'; ?>

        <div id="content">
            <h1>Bienvenido al Dashboard, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>

            <div class="logo-container">
                <img src="img/plantilla/logo-ofertapp.png" alt="Logo Principal de OfertApp">
            </div>
        </div>
    </div>
</body>

</html>