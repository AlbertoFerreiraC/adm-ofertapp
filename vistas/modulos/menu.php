<!-- ===== MENÚ LATERAL FIJO ===== -->
<aside class="menu-lateral">
  <ul class="menu-lista">
    <li class="menu-header">MENÚ PRINCIPAL</li>

    <?php if (isset($_SESSION['tipo_usuario'])): ?>

      <!-- === PERFIL PERSONAL === -->
      <?php if ($_SESSION['tipo_usuario'] == 'personal'): ?>
        <li><a href="dashboard"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="productos"><i class="fa fa-cube"></i> Productos</a></li>
        <li><a href="misReservas"><i class="fa fa-shopping-cart"></i> Mis Reservas</a></li>
        <li><a href="historial"><i class="fa fa-history"></i> Historial</a></li>
        <li><a href="miOpinion"><i class="fa fa-comment"></i> Opiniones y Reseñas</a></li>
        <li><a href="miPerfil"><i class="fa fa-user-circle"></i> Mi Perfil</a></li>
      <?php endif; ?>

      <!-- === PERFIL COMERCIAL === -->
      <?php if ($_SESSION['tipo_usuario'] == 'comercial'): ?>
        <li><a href="dashboard"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="productos"><i class="fa fa-cube"></i> Mis Productos</a></li>
        <li><a href="agregar_producto"><i class="fa fa-plus-square"></i> Agregar Producto</a></li>
        <li><a href="ofertas"><i class="fa fa-star"></i> Ofertas Activas</a></li>
        <li><a href="empresa"><i class="fa fa-building"></i> Datos de la Empresa</a></li>
        <li><a href="membresias_planes"><i class="fa fa-id-card"></i> Membresía / Plan</a></li>
        <li><a href="informeBusquedas"><i class="fa fa-line-chart"></i> Búsquedas Populares</a></li>
        <li><a href="informeProductos"><i class="fa fa-pie-chart"></i> Productos Más Consultados</a></li>
        <li><a href="informeActividadComercial"><i class="fa fa-area-chart"></i> Actividad Comercial</a></li>
        <li><a href="comentarios"><i class="fa fa-comments"></i> Comentarios de Clientes</a></li>
        <li><a href="miPerfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
      <?php endif; ?>

      <!-- === PERFIL ADMINISTRADOR === -->
      <?php if ($_SESSION['tipo_usuario'] == 'administrador'): ?>
        <li class="menu-subtitulo">Módulo Personal</li>
        <li><a href="productos"><i class="fa fa-cube"></i> Productos</a></li>
        <li><a href="mis_reservas"><i class="fa fa-shopping-cart"></i> Mis Reservas</a></li>
        <li><a href="historial"><i class="fa fa-history"></i> Historial</a></li>
        <li><a href="comentarios"><i class="fa fa-comment"></i> Opiniones y Reseñas</a></li>
        <li><a href="perfil"><i class="fa fa-user-circle"></i> Mi Perfil</a></li>

        <li class="menu-subtitulo">Módulo Comercial</li>
        <li><a href="productos"><i class="fa fa-cube"></i> Mis Productos</a></li>
        <li><a href="agregar_producto"><i class="fa fa-plus-square"></i> Agregar Producto</a></li>
        <li><a href="ofertas"><i class="fa fa-star"></i> Ofertas Activas</a></li>
        <li><a href="empresa"><i class="fa fa-building"></i> Datos de la Empresa</a></li>
        <li><a href="membresias_planes"><i class="fa fa-id-card"></i> Membresía / Plan</a></li>
        <li><a href="informeBusquedas"><i class="fa fa-line-chart"></i> Búsquedas Populares</a></li>
        <li><a href="informeProductos"><i class="fa fa-pie-chart"></i> Productos Más Consultados</a></li>
        <li><a href="informeActividadComercial"><i class="fa fa-area-chart"></i> Actividad Comercial</a></li>
        <li><a href="comentarios"><i class="fa fa-comments"></i> Comentarios de Clientes</a></li>
        <li><a href="dashboard_comerciante"><i class="fa fa-home"></i> Dashboard Comercial</a></li>

        <!--<li class="menu-subtitulo">Módulo Administración</li>
        <li><a href="usuarios"><i class="fa fa-user-plus"></i> Gestión de Usuarios</a></li>
        <li><a href="perfil_admin"><i class="fa fa-user-circle"></i> Mi Perfil Admin</a></li> -->
      <?php endif; ?>

    <?php endif; ?>

    <!-- 🔐 LOGIN / LOGOUT -->
    <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
      <li><a href="salir" class="cerrar-sesion"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></li>
    <?php else: ?>
      <li><a href="login"><i class="fa fa-sign-in"></i> Iniciar Sesión</a></li>
    <?php endif; ?>
  </ul>
</aside>

<style>
  /* ===== MENÚ LATERAL ===== */
  .menu-lateral {
    position: fixed;
    top: 60px;
    /* debajo del header */
    left: 0;
    width: 230px;
    background-color: #222d32;
    color: #fff;
    padding-top: 10px;
    z-index: 10;

    /* 🧩 Nueva configuración para no pisar el footer */
    height: auto;
    max-height: calc(100vh - 60px - 40px);
    /* 60 = header, 40 = margen antes del footer */
    overflow-y: auto;
  }

  .menu-lista {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .menu-header {
    color: #aaa;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 10px 20px;
    border-bottom: 1px solid #1a2226;
  }

  .menu-lista li a {
    display: block;
    color: #b8c7ce;
    padding: 10px 20px;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.2s ease;
  }

  .menu-lista li a:hover {
    background-color: #1e282c;
    color: #fff;
  }

  .menu-subtitulo {
    padding: 10px 20px;
    color: #f39c12;
    font-weight: 600;
    margin-top: 8px;
    border-top: 1px solid #1a2226;
  }

  .cerrar-sesion {
    color: #ff6b6b !important;
  }

  .cerrar-sesion:hover {
    background-color: #c0392b !important;
    color: #fff !important;
  }

  /* ===== CONTENIDO ===== */
  .content-wrapper {
    margin-left: 230px;
    /* deja espacio para el menú */
    margin-top: 60px;
    /* debajo del header */
    background: #f4f6f9;
    min-height: calc(100vh - 60px);
    padding: 15px;
    box-sizing: border-box;
    position: relative;
    z-index: 1;
  }

  /* ===== FOOTER ===== */
  .main-footer {
    margin-left: 230px;
    background: #111;
    color: #ccc;
    text-align: center;
    padding: 10px 0;
    position: relative;
    z-index: 1;
  }

  /* ===== SCROLL ===== */
  .menu-lateral::-webkit-scrollbar {
    width: 8px;
  }

  .menu-lateral::-webkit-scrollbar-thumb {
    background: #444;
    border-radius: 4px;
  }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 992px) {
    .menu-lateral {
      position: fixed;
      top: 60px;
      left: -230px;
      transition: left 0.3s ease;
      z-index: 2000;
      max-height: calc(100vh - 60px);
    }

    body.menu-abierto .menu-lateral {
      left: 0;
    }

    .content-wrapper,
    .main-footer {
      margin-left: 0;
    }
  }
</style>