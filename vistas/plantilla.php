<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>.::OFERTAPP::.</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="vistas/img/plantilla/iconoOfertapp.png" type="image/x-icon">
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>

<?php
// Determinamos la ruta. Por defecto, siempre será 'dashboard'.
$ruta = isset($_GET["ruta"]) ? $_GET["ruta"] : 'dashboard';

// <-- CAMBIO CLAVE: Se elimina toda la lógica de rutas protegidas. Ya no es necesaria.

// Determinamos la clase del body según la ruta actual
$bodyClass = ($ruta == 'login' || $ruta == 'forgot-password' || $ruta == 'reset-password')
    ? 'login-page'
    : 'hold-transition skin-blue sidebar-mini';
?>

<body class="<?php echo $bodyClass; ?>">

    <?php
    // Si la página a mostrar NO es una de las de login, muestra la estructura principal del panel
    if ($bodyClass != 'login-page') {
        echo '<div class="wrapper">';
        // Incluimos cabezote y menú
        include __DIR__ . "/modulos/cabezote.php";
        include __DIR__ . "/modulos/menu.php";
    }

    // --- ROUTER FINAL ---
    // Carga el módulo correspondiente a la ruta
    // Añadí las rutas que faltaban de tu menú para evitar errores 404
    $rutasExistentes = [
        "dashboard",
        "login",
        "forgot-password",
        "reset-password",
        "404",
        "salir",
        "inicio",
        "perfil",
        "productos",
        "usuarios",
        "categorias",
        "ofertas",
        "compras",
        "clientes",
        "roles",
        "promociones",
        "empresa",
        "membresias_planes",
        "membresias_asignar",
        "membresias_historial",
        "consultas",
        "consultas_avanzadas",
        "pedidos",
        "gestionar_pedidos",
        "envios_pendientes",
        "envios_realizados",
        "informes_ventas_dia",
        "informes_ventas_mes",
        "informes_ventas_cliente",
        "informes_clientes_activos",
        "informes_clientes_inactivos",
        "informes_empresas"
    ];


    if (in_array($ruta, $rutasExistentes)) {
        include __DIR__ . "/modulos/" . $ruta . ".php";
    } else {
        include __DIR__ . "/modulos/404.php";
    }

    // Si abrimos la estructura principal, también la cerramos
    if ($bodyClass != 'login-page') {
        echo '</div>'; // Fin de .wrapper
    }
    ?>

    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/login.js"></script>
</body>

</html>