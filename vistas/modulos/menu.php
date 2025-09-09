<aside class="main-sidebar">
	<section class="sidebar">
		<!-- Menú principal (sin user-panel) -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENÚ PRINCIPAL</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-search"></i><span>Consultas</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="busqueda-avanzada"><i class="fa fa-filter"></i> Búsqueda Avanzada</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-book"></i><span>Gestión de Catálogo</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="productos"><i class="fa fa-cube"></i> Productos</a></li>
					<li><a href="ofertas"><i class="fa fa-star"></i> Ofertas</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-building"></i><span>Mi Empresa</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="empresa"><i class="fa fa-industry"></i> Registro de Empresas</a></li>
					<li><a href="categorias"><i class="fa fa-tags"></i> Categorías</a></li>
				</ul>
			</li>

			<li>
				<a href="descripcionProductos">
					<i class="fa fa-id-card"></i> Membresías
				</a>
			</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-users"></i><span>Clientes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="clientes"><i class="fa fa-list"></i> Gestionar Clientes</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-bar-chart"></i><span>Informes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="informe-busquedas"><i class="fa fa-line-chart"></i> Búsquedas Populares</a></li>
					<li><a href="informe-productos"><i class="fa fa-pie-chart"></i> Productos Populares</a></li>
					<li><a href="informe-empresas"><i class="fa fa-area-chart"></i> Actividad de Empresas</a></li>
				</ul>
			</li>

			<li>
				<a href="nosotros">
					<i class="fa fa-info-circle"></i> <span>Nosotros</span>
				</a>
			</li>

			<?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Administrador"): ?>
				<li class="treeview">
					<a href="#"><i class="fa fa-cogs"></i><span>Administración</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
					<ul class="treeview-menu">
						<li><a href="usuarios"><i class="fa fa-user-plus"></i> Usuarios</a></li>
						<li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
					</ul>
				</li>
			<?php endif; ?>

			<?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
				<li><a href="salir"><i class="fa fa-sign-out text-red"></i> <span>Cerrar Sesión</span></a></li>
			<?php else: ?>
				<li><a href="login"><i class="fa fa-sign-in"></i> <span>Iniciar Sesión</span></a></li>
			<?php endif; ?>
		</ul>
	</section>
</aside>

<style>
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
</style>