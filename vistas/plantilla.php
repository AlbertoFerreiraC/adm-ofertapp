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
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>

<?php
// Verificamos si el usuario está logueado
$usuarioLogueado = (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok");

// Determinamos la ruta. Por defecto, siempre será 'dashboard'.
$ruta = isset($_GET["ruta"]) ? $_GET["ruta"] : 'dashboard';

// Lista de rutas que requieren OBLIGATORIAMENTE iniciar sesión
$rutasProtegidas = ["perfil", "productos", "usuarios", "salir", "categorias", "ofertas", "compras", "clientes", "roles", "promociones", "ofertas"];

// LÓGICA DE SEGURIDAD:
// Si el usuario NO está logueado Y está intentando acceder a una ruta protegida...
if (!$usuarioLogueado && in_array($ruta, $rutasProtegidas)) {
    // ...lo forzamos a ir a la ruta 'login' para que inicie sesión.
    $ruta = 'login';
}

// Determinamos la clase del body según la ruta final
$bodyClass = ($ruta == 'login' || $ruta == 'forgot-password' || $ruta == 'reset-password')
    ? 'login-page'
    : 'hold-transition skin-blue sidebar-mini';
?>

<body class="<?php echo $bodyClass; ?>">

    <?php
    // Si la página a mostrar NO es una de las de login, muestra la estructura principal del panel
    if ($bodyClass != 'login-page') {
        echo '<div class="wrapper">';
        // Incluimos un cabezote y menú "inteligentes" que se adaptan al visitante
        include __DIR__ . "/modulos/cabezote.php";
        include __DIR__ . "/modulos/menu.php";
    }

    // --- ROUTER FINAL ---
    // Carga el módulo correspondiente a la ruta final
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
        "ofertas"
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