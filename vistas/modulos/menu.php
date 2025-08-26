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
				<a href="#"><i class="fa fa-th-large"></i><span>Catálogo</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
				<ul class="treeview-menu">
					<li><a href="productos"><i class="fa fa-cube"></i> Productos</a></li>
					<li><a href="categorias"><i class="fa fa-tags"></i> Categorías</a></li>
					<li><a href="ofertas"><i class="fa fa-star"></i> Ofertas</a></li>
				</ul>
			</li>

			<?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>

				<li class="treeview">
					<a href="#"><i class="fa fa-shopping-cart"></i><span>Ventas</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
					<ul class="treeview-menu">
						<li><a href="compras"><i class="fa fa-list-alt"></i> Gestionar Compras</a></li>
						<li><a href="clientes"><i class="fa fa-users"></i> Clientes</a></li>
					</ul>
				</li>

				<?php if ($_SESSION['tipo_usuario'] == "Administrador"): ?>
					<li class="treeview">
						<a href="#"><i class="fa fa-cogs"></i><span>Administración</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
						<ul class="treeview-menu">
							<li><a href="usuarios"><i class="fa fa-user-plus"></i> Usuarios</a></li>
							<li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
						</ul>
					</li>
				<?php endif; ?>

				<li><a href="salir"><i class="fa fa-sign-out text-red"></i> <span>Cerrar Sesión</span></a></li>

			<?php else: ?>

				<li><a href="login"><i class="fa fa-sign-in"></i> <span>Iniciar Sesión</span></a></li>

			<?php endif; ?>

		</ul>
	</section>
</aside>