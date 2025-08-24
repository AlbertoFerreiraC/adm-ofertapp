<?php
header("Access-Control-Allow-Origin: *");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Evitar cache -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.::OFERTAPP::.</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="vistas/img/plantilla/iconoOfertapp.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
    <link rel="stylesheet" href="vistas/plugins/iCheck/line/blue.css">
    <link rel="stylesheet" href="vistas/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!-- JS -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="vistas/plugins/iCheck/icheck.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed" style="background-color: #f4f6f9;">

    <?php
    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

        include "modulos/cabezote.php";
        include "modulos/menu.php";

        if (isset($_GET["ruta"])) {

            $ruta = $_GET["ruta"];

            // Páginas principales
            $paginasPrincipales = ["salir", "inicio", "perfil"];

            // Módulo Productos
            $paginasProductos = ["producto", "categoria", "oferta", "promocion"];

            // Módulo Usuarios
            $paginasUsuarios = ["usuario", "roles", "permisos"];

            // Módulo Clientes
            $paginasClientes = ["cliente", "compras", "historial"];

            if (isset($_GET["ruta"])) {
                if ($_GET["ruta"] == "productos") {
                    include "modulos/productos.php";
                } else if ($_GET["ruta"] == "usuarios") {
                    include "modulos/usuarios.php";
                } else if ($_GET["ruta"] == "salir") {
                    include "modulos/salir.php";
                } else {
                    include "modulos/dashboard.php";
                }
            } else {
                include "modulos/login.php";
            }
        }
    } else {
        include "modulos/login.php";
    }
    ?>

    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/login.js"></script>

    <style type="text/css">
        .cajatexto {
            border: 1px solid #007bff;
            font-family: 'Montserrat', sans-serif;
            color: #333;
        }

        .cajatexto:focus {
            border: 1px solid #0056b3;
            color: #111;
        }

        .btn-ofertapp {
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: bold;
        }

        .btn-ofertapp:hover {
            background-color: #0056b3;
        }
    </style>

</body>

</html>