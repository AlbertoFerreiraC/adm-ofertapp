<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Menú principal -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ PRINCIPAL</li>

      <?php if (isset($_SESSION['tipo_usuario'])): ?>

        <!-- 🧍 PERFIL PERSONAL -->
        <?php if ($_SESSION['tipo_usuario'] == 'personal'): ?>
          <li><a href="inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>

          <li><a href="productos"><i class="fa fa-cube"></i> <span>Productos</span></a></li>

          <li><a href="mis_reservas"><i class="fa fa-shopping-cart"></i> <span>Mis Reservas</span></a></li>
          <li><a href="historial"><i class="fa fa-history"></i> <span>Historial</span></a></li>
          <li><a href="retroalimentacion"><i class="fa fa-comment"></i> <span>Opiniones y Reseñas</span></a></li>
          <li><a href="perfil"><i class="fa fa-user"></i> <span>Mi Perfil</span></a></li>
        <?php endif; ?>

        <!-- 🏪 PERFIL COMERCIAL -->
        <?php if ($_SESSION['tipo_usuario'] == 'comercial'): ?>
          <li><a href="inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>

          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i><span>Gestión de Catálogo</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
              <li><a href="productos"><i class="fa fa-cube"></i> Mis Productos</a></li>
              <li><a href="agregar_producto"><i class="fa fa-plus-square"></i> Agregar Producto</a></li>
              <li><a href="ofertas"><i class="fa fa-star"></i> Ofertas Activas</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i><span>Mi Empresa</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
              <li><a href="empresa"><i class="fa fa-industry"></i> Datos de la Empresa</a></li>
              <li><a href="membresia"><i class="fa fa-id-card"></i> Membresía / Plan</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i><span>Informes</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
              <li><a href="informe-busquedas"><i class="fa fa-line-chart"></i> Búsquedas Populares</a></li>
              <li><a href="informe-productos"><i class="fa fa-pie-chart"></i> Productos Más Consultados</a></li>
              <li><a href="informe-ventas"><i class="fa fa-area-chart"></i> Actividad Comercial</a></li>
            </ul>
          </li>

          <li><a href="retroalimentacion"><i class="fa fa-comments"></i> <span>Comentarios de Clientes</span></a></li>
          <li><a href="perfil"><i class="fa fa-user"></i> <span>Mi Perfil</span></a></li>
        <?php endif; ?>

      <?php endif; ?>

      <!-- ⚙️ ADMINISTRADOR -->
      <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "administrador"): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i><span>Administración</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
            <li><a href="usuarios"><i class="fa fa-user-plus"></i> Usuarios</a></li>
            <li><a href="perfil_admin"><i class="fa fa-user-circle"></i> Mi Perfil Admin</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <!-- 🔐 LOGIN / LOGOUT -->
      <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
        <li><a href="salir"><i class="fa fa-sign-out text-red"></i> <span>Cerrar Sesión</span></a></li>
      <?php else: ?>
        <li><a href="login"><i class="fa fa-sign-in"></i> <span>Iniciar Sesión</span></a></li>
      <?php endif; ?>
    </ul>
  </section>
</aside>

<style>
  /* ==== Colores/estilos base AdminLTE sidebar ==== */
  .main-sidebar,
  .main-sidebar .sidebar {
    background-color: #222d32 !important;
    color: #fff !important;
  }

  .main-sidebar .sidebar-menu>li>a {
    color: #b8c7ce !important;
    font-weight: 500;
  }

  .main-sidebar .sidebar-menu>li>a:hover {
    background-color: #1e282c !important;
    color: #fff !important;
  }

  .main-sidebar .header {
    color: #4b646f !important;
    border-bottom: 1px solid #1a2226;
  }

  .main-sidebar .user-panel {
    display: none !important;
  }

  body.sidebar-hidden .main-sidebar {
    transform: translateX(-260px);
    transition: transform .25s ease;
  }

  body.sidebar-hidden .content-wrapper,
  body.sidebar-hidden .main-footer {
    margin-left: 0 !important;
    transition: margin .25s ease;
  }

  .main-sidebar {
    transition: transform .25s ease;
  }

  /* Permitir que el dropdown de sugerencias salga del contenedor */
  .sidebar .treeview-menu {
    overflow: visible;
  }

  /* ===== Filtros dinámicos (sidebar oscuro AdminLTE) ===== */
  .filtros-dinamicos {
    padding: 8px 10px;
  }

  .f-block {
    padding: 8px 6px;
    border-bottom: 1px solid #1a2226;
  }

  .f-block:last-child {
    border-bottom: 0;
  }

  .f-label {
    display: block;
    font-size: 12px;
    color: #9fb3bf;
    margin-bottom: 6px;
  }

  .f-input-wrap {
    position: relative;
  }

  .f-input {
    width: 100%;
    background: #1e282c;
    color: #e6eef2;
    border: 1px solid #2b3940;
    outline: 0;
    padding: 8px 10px;
    border-radius: 6px;
    font-size: 13px;
  }

  .f-input:focus {
    border-color: #3ea6ff;
    box-shadow: 0 0 0 2px rgba(62, 166, 255, .2);
  }

  /* Sugerencias (dropdown) */
  .f-suggest {
    position: absolute;
    left: 0;
    right: 0;
    top: calc(100% + 4px);
    z-index: 9999;
    list-style: none;
    margin: 0;
    padding: 0;
    background: #1e282c;
    border: 1px solid #2b3940;
    border-radius: 6px;
    max-height: 180px;
    overflow: auto;
    display: none;
  }

  .f-suggest li {
    padding: 8px 10px;
    cursor: pointer;
    color: #cfe1ea;
  }

  .f-suggest li:hover {
    background: #22313a;
  }

  /* Categorías */
  .f-cats {
    display: grid;
    gap: 6px;
  }

  .f-cat {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #cfe1ea;
    font-size: 13px;
    cursor: pointer;
  }

  .f-cat input {
    margin: 0;
  }

  /* Rango doble */
  .f-range-wrap {
    position: relative;
    height: 32px;
    margin-top: 2px;
  }

  .f-range-track {
    position: absolute;
    left: 0;
    right: 0;
    top: 14px;
    height: 6px;
    border-radius: 999px;
    background: #23313a;
  }

  .f-range {
    position: absolute;
    inset: 0;
    pointer-events: none;
  }

  .f-range input {
    pointer-events: auto;
    -webkit-appearance: none;
    appearance: none;
    background: transparent;
    width: 100%;
    height: 32px;
    margin: 0;
  }

  .f-range input::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #e6eef2;
    border: 2px solid #111;
  }

  .f-range input::-moz-range-thumb {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #e6eef2;
    border: 2px solid #111;
  }

  .f-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
    margin-top: 6px;
  }

  .f-hint {
    font-size: 12px;
    color: #9fb3bf;
    margin-top: 4px;
  }

  /* Swatches color */
  .f-swatches {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 8px;
  }

  .f-swatch {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 2px solid #2b3940;
    cursor: pointer;
    outline: 0;
  }

  .f-swatch.active {
    box-shadow: 0 0 0 2px #3ea6ff, 0 0 0 4px #0b1216;
  }

  /* Radios */
  .f-radio {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #cfe1ea;
    font-size: 13px;
    cursor: pointer;
  }

  .f-radio input {
    margin: 0;
  }

  /* Chips */
  .f-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
  }

  .f-chip {
    background: #26343c;
    color: #cfe1ea;
    border: 1px solid #2b3940;
    border-radius: 999px;
    font-size: 12px;
    padding: 4px 8px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .f-chip .x {
    cursor: pointer;
    color: #9fb3bf;
  }

  .f-chip .x:hover {
    color: #fff;
  }

  /* Botones */
  .f-actions {
    padding: 10px 6px;
    display: flex;
    gap: 8px;
  }

  .f-btn {
    background: #3ea6ff;
    color: #0b1216;
    border: 0;
    padding: 8px 10px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    flex: 1;
  }

  .f-btn.ghost {
    background: transparent;
    color: #cfe1ea;
    border: 1px solid #2b3940;
  }

  .f-btn:hover {
    filter: brightness(1.05);
  }

  .main-header {
    height: 60px;
    /* mismo alto que tu navbar */
    z-index: 1000;
  }

  .main-sidebar {
    position: fixed !important;
    top: 60px !important;
    /* arranca debajo del cabezote */
    height: calc(100% - 60px) !important;
    /* ocupa todo el alto menos el cabezote */
    overflow-y: auto;
  }

  .content-wrapper {
    margin-top: 60px;
    /* empuja el contenido principal hacia abajo */
  }

  .content-header {
    display: none !important;
  }
</style>