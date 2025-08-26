<header class="main-header">
	<a href="dashboard.php" class="logo">
		<span class="logo-mini"><b>J</b>A</span>
		<span class="logo-lg"><b>Ofert</b>App</span>
	</a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"): ?>
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">
							<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-footer">
								<div class="pull-left">
									<a href="perfil" class="btn btn-default btn-flat">Perfil</a>
								</div>
								<div class="pull-right">
									<a href="salir" class="btn btn-danger btn-flat">Cerrar Sesión</a>
								</div>
							</li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
</header>