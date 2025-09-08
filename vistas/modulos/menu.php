<aside class="main-sidebar">
	<section class="sidebar">

		<?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
			<div class="user-panel">
				<div class="pull-left image">
					<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $_SESSION["nombre"]; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> En Sesión</a>
				</div>
			</div>
		<?php endif; ?>

		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENÚ PRINCIPAL</li>

			<li><a href="dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

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
					<li><a href="categorias"><i class="fa fa-tags"></i> Categorías</a></li>
					<li><a href="ofertas"><i class="fa fa-star"></i> Ofertas</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-building"></i><span>Empresas</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">

					<li><a href="empresa"><i class="fa fa-industry"></i> Registro de Empresas</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"><i class="fa fa-id-card"></i> Membresías<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="membresias_planes"><i class="fa fa-list"></i> Planes de Membresía</a></li>
					<li><a href="membresias_historial"><i class="fa fa-history"></i> Historial</a></li>
				</ul>
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