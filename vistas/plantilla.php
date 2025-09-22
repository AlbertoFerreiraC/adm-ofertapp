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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<?php
// Determinamos la ruta. Por defecto, siempre será 'dashboard'.
$ruta = isset($_GET["ruta"]) ? $_GET["ruta"] : 'dashboard';

// <-- CAMBIO CLAVE: Se elimina toda la lógica de rutas protegidas. Ya no es necesaria.

// Determinamos la clase del body según la ruta actual
$bodyClass = ($ruta == 'login' || $ruta == 'forgot-password' || $ruta == 'reset-password' || $ruta == 'register')
    ? 'login-page'
    : 'hold-transition skin-blue sidebar-mini';
?>

<body class="<?php echo $bodyClass; ?>">

    <?php
    if ($bodyClass != 'login-page') {
        echo '<div class="wrapper">';
        include __DIR__ . "/modulos/cabezote.php";
        // Solo generamos el menú y el contenedor si es comerciante
        if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] === "comercial") {
            include __DIR__ . "/modulos/menu.php";
        } else {
            // Si no es comerciante, quitamos la clase sidebar-mini para evitar el espacio
            echo "<script>
        document.body.classList.remove('sidebar-mini');
        document.body.classList.add('sidebar-collapse');
    </script>";
        }
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
        "informes_empresas",
        "register",
        "dashboard_comerciante",
        "nosotros",
        "descripcionProductos"
    ];


    if (in_array($ruta, $rutasExistentes)) {
        if ($ruta === "dashboard") {
            if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] === "comercial") {
                include __DIR__ . "/modulos/dashboard_comerciante.php";
            } else {
                include __DIR__ . "/modulos/dashboard.php";
            }
        } else {
            include __DIR__ . "/modulos/" . $ruta . ".php";
        }
    } else {
        include __DIR__ . "/modulos/404.php";
    }


    // Si abrimos la estructura principal, también la cerramos
    if ($bodyClass != 'login-page') {

        // Mostrar footer SOLO si NO es comerciante
        if (!isset($_SESSION["tipo_usuario"]) || $_SESSION["tipo_usuario"] !== "comercial") {
            include __DIR__ . "/modulos/footer.php";
        }

        echo '</div>'; // Fin de .wrapper
    }
    ?>

    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/login.js"></script>
</body>

</html>