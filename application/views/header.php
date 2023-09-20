<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/estilo/imagenes/favicon.png" sizes="16x25" />
	<title>
		<?php echo $title; ?>
	</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo/font-awesome/css/font-awesome.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo/dist/css/skins/skin-blue.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo/css/estilo.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.css" />
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/js/datatables.net/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/datatables.net-bs/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url(); ?>assets/js/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/js/adminlte/adminlte.min.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.md5.js"></script>
	<?php
	if (isset($scripts)) { //Invocacion de scripts propios
		foreach ($scripts as $unScript) {
			echo "<script type=\"text/javascript\" src=\"" . base_url() . "assets/js/" . $unScript . ".js\"></script>";
		}
	}
	if (isset($styles)) { //Invocacion de estilos propios
		foreach ($styles as $unStyle) {
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . base_url() . "assets/estilo/css/" . $unStyle . "\" />";
		}
	}
	?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
	<header class="main-header">


		<nav class="navbar navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>inicio"> Rea </a>
				</div>

				<div class="collapse navbar-collapse" id="myNavbar">
					<?php if ($this->session->iniciada) : ?>
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url(); ?>inicio">Inicio</a></li>
							<li><a href="<?php echo base_url(); ?>recurso/listar">Recursos</a></li>
							<li><a href="<?php echo base_url(); ?>contacto">Contactenos</a></li>
							<?php if ($this->session->rol == 'profesor') : ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Recurso
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" id="desplegable">
										<li><a href="<?php echo base_url() . "recurso/misRecursos" ?>">Mis Recursos</a></li>
										<li><a href="<?php echo base_url() . "recurso/subirRecurso" ?>">Subir Recurso</a></li>
									</ul>
								</li>
							<?php elseif ($this->session->rol == 'administrador de recursos') : ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Agregar Seccion
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" id="desplegable">
										<li><a href="<?php echo base_url(); ?>categoria/add">Añadir Secciones</a></li>
										<li><a href="<?php echo base_url(); ?>categoria">Editar Categoria</a></li>
										<li><a href="<?php echo base_url(); ?>tema">Editar Temas</a></li>
									</ul>
								</li>

							<?php endif ?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- The user image in the navbar-->
									<img src="<?= base_url('assets/upload/fotoPerfil/') . ($this->session->foto == '' ? 'user-default.png' : $this->session->nombreUsuario . '/' . $this->session->foto) ?>" class="user-image" alt="User Image" />
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs"><?php echo $this->session->nombreUsuario; ?></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img src="<?php
													if ($this->session->foto == "") {
														echo base_url() . "assets/upload/fotoPerfil/user-default.png";
													} else {
														echo base_url() . "assets/upload/fotoPerfil/" . $this->session->nombreUsuario . "/" . $this->session->foto;
													}
													?>" class="img-circle" alt="User Image">
										<p><?php echo $this->session->nombreUsuario; ?>
											<small><?= $this->session->userdata('rol'); ?></small>

										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="<?php echo base_url() . "usuario/editarPerfil" ?>">
												<div class="btn btn-primary logeo">Perfil</div>
											</a>
										</div>
										<div class="pull-right">
											<a href="<?php echo base_url(); ?>login/cerrarSession">
												<div class="btn btn-danger logeo">Cerrar Sesión</div>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					<?php else : ?>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a class="btn btn-success logeo" href="<?php echo base_url(); ?>login">Iniciar Sesión</a>
							</li>
						</ul>
				</div> <!-- /.navbar-custom-menu -->
			</div> <!-- /.container fluid-->
		</nav><!-- /.navbar-custom-menu -->
	<?php endif ?>
	</header>
	<!-- Full Width Column -->
	<div class="content-wrapper">
		<!-- Main content -->
		<section class="content">