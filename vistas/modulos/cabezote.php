<header class="main-header">
    <nav class="navbar navbar-static-top">
        <ul class="navbar-menu-links">
            <li><a href="dashboard"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="productos"><i class="fas fa-tags"></i> Productos</a></li>
        </ul>

        <div class="navbar-search-container">
            <form action="#" method="get" class="search-form">
                <input type="text" id="buscadorProductos" name="q" placeholder="Buscar Productos">
                <button type="submit"><i class="fas fa-search"></i></button>
                <div id="resultadosBusqueda" class="resultados-busqueda"></div>
            </form>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
                    <li>
                        <a href="miPerfil">
                            <i class="fas fa-user"></i> Mi Perfil
                        </a>
                    </li>
                    <li>
                        <a href="salir">
                            <i class="fa fa-sign-out"></i> Cerrar Sesión
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login">
                            <i class="fas fa-user"></i> Iniciar Sesión
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>


<style>
    /* ============================
   HEADER LIMPIO PARA OFERTAPP
===============================*/
    .main-header {
        background-color: #3d8cbd;
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .main-header .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        min-height: 60px;
        background: transparent !important;
        margin: 0;
    }

    /* Menú izquierdo */
    .navbar-menu-links {
        display: flex;
        gap: 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-menu-links li a {
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 14px;
        color: #fff;
        /* 🔹 Blanco */
        text-decoration: none;
        transition: color .2s;
    }

    .navbar-menu-links li a .fas {
        margin-right: 6px;
        color: #f08438;
        /* Naranja */
    }

    .navbar-menu-links li a:hover,
    .navbar-menu-links li.active a {
        color: #f08438;
    }

    /* Buscador centrado */
    .navbar-search-container {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        padding: 0 20px;
    }

    .search-form {
        width: 100%;
        max-width: 600px;
        /* 🔹 Más largo */
        position: relative;
    }

    .search-form input {
        width: 100%;
        padding: 8px 40px 8px 14px;
        border: 1px solid #ccc;
        border-radius: 30px;
        font-size: 14px;
        background: #fff;
        /* 🔹 Fondo blanco */
        color: #333;
    }

    .search-form input::placeholder {
        color: #888;
    }

    .search-form button {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 40px;
        border: none;
        background: transparent;
        color: #f08438;
        /* 🔹 Lupa naranja */
        font-size: 16px;
        cursor: pointer;
    }

    /* Menú derecho */
    .navbar-custom-menu .nav {
        display: flex;
        gap: 15px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-custom-menu .nav li a {
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 14px;
        color: #fff;
        /* 🔹 Blanco */
        text-decoration: none;
    }

    .navbar-custom-menu .nav li a i {
        margin-right: 6px;
        color: #f08438;
    }

    .navbar-custom-menu .nav li a:hover {
        color: #f08438;
    }

    .resultados-busqueda {
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        max-height: 300px;
        overflow-y: auto;
        padding: 5px 0;
        display: none;
    }

    .resultado-item {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .resultado-item:hover {
        background: #f5f5f5;
    }

    .resultado-item img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 10px;
    }

    .resultado-item .info h4 {
        font-size: 14px;
        color: #333;
        margin: 0;
    }

    .resultado-item .info span {
        font-size: 13px;
        color: #f08438;
        font-weight: bold;
    }

    .sin-resultados {
        text-align: center;
        padding: 10px;
        color: #666;
    }
</style>

<script src="vistas/js/cabezote.js"></script>