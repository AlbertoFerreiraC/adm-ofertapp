<header class="main-header">
    <nav class="navbar navbar-static-top">
        <ul class="navbar-menu-links">
            <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="#"><i class="fas fa-tags"></i> Ofertas y Promociones</a></li>
            <li class="active"><a href="#"><i class="fas fa-bars"></i> Categorías</a></li>
        </ul>

        <div class="navbar-search-container">
            <form action="#" method="get" class="search-form">
                <input type="text" name="q" placeholder="Buscar Productos">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
                    <li>
                        <a href="perfil">
                            <i class="fas fa-user" style="color:#f08438; margin-right: 8px;"></i> Mi Perfil
                        </a>
                    </li>
                    <li>
                        <a href="salir">
                            <i class="fa fa-sign-out text-red" style="margin-right: 8px;"></i> Cerrar Sesión
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login">
                            <i class="fas fa-user" style="color:#c00; margin-right: 8px;"></i> Iniciar Sesión
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

    </nav>
</header>

<style>
    /* Reset y estilos base para la barra de navegación */
    .main-header .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 15px;
        background-color: #f8f9fa;
        /* Color de fondo gris claro, similar a la imagen */
        border-bottom: 1px solid #dee2e6;
    }

    /* Ajuste del logo para que no tenga el fondo azul por defecto */
    .main-header .logo {
        background-color: #f8f9fa !important;
        color: rgba(204, 139, 0, 1) !important;
        /* Color rojo para el logo */
        font-weight: bold;
        width: auto;
    }

    .main-header .logo:hover {
        background-color: #f0f0f0 !important;
    }

    /* Contenedor para los enlaces de navegación del medio */
    .navbar-menu-links {
        display: flex;
        align-items: center;
        list-style: none;
        padding-left: 20px;
        margin: 0;
    }

    .navbar-menu-links li a {
        display: flex;
        align-items: center;
        padding: 15px;
        color: #f0f0f0;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
    }

    .navbar-menu-links li a:hover,
    .navbar-menu-links li.active a {
        color: #f0f0f0
            /* Color rojo al pasar el mouse o en la página activa */
    }

    .navbar-menu-links li a .fas {
        margin-right: 8px;
        /* Espacio entre el icono y el texto */
        color: #f08438;
        /* Color rojo para los iconos */
    }

    /* Contenedor de la barra de búsqueda para que ocupe el espacio sobrante */
    .navbar-search-container {
        flex-grow: 1;
        /* Permite que este contenedor crezca y ocupe el espacio disponible */
        display: flex;
        justify-content: center;
        padding: 0 40px;
    }

    .search-form {
        position: relative;
        width: 100%;
        max-width: 450px;
        /* Ancho máximo para la barra de búsqueda */
    }

    .search-form input[type="text"] {
        width: 100%;
        padding: 8px 40px 8px 15px;
        /* Espacio para el icono */
        border: 1px solid #ccc;
        border-radius: 20px;
        /* Bordes redondeados */
        font-size: 14px;
    }

    .search-form button {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 40px;
        background: none;
        border: none;
        cursor: pointer;
        color: #f0f0f0;
        font-size: 16px;
    }

    .sidebar-toggle {
        display: none !important;
    }
</style>