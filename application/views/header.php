<!DOCTYPE html>
<html>
<head>
	<meta  name="viewport" content="width=device-width" charset="utf-8"/>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" ></script>	
	<?php 
		if(isset($scripts)){//Invocacion de scripts propios
			
			foreach ($scripts as $unScript){
				echo "<script type=\"text/javascript\" src=\"".base_url()."assets/js/" .$unScript."\"></script>";
			}
		}
		if(isset($styles)){//Invocacion de estilos propios
			foreach ($styles as $unStyle){
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."assets/css/" .$unStyle."\" />";
			}
		}
	?>
</head>
<body>
	<!-- Barra de Menú -->
<?php session_start(); 
if(!isset($_SESSION["iniciada"])){ ?>	
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="menu">
    <div class="container-fluid">
			<a href="<?php echo base_url(); ?>inicio"><img class="navbar-brand" src="<?php echo base_url(); ?>assets/imagenes/logo3.png" alt="Logo REA"  id="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
							<a href="<?php echo base_url(); ?>inicio" class="nav-link text-secondary" alt="inicio">
								<i class="fa fa-home"></i> Inicio
							</a>
						</li>
            <li class="nav-item">
							<a href="<?php echo base_url(); ?>area" class="nav-link text-secondary" alt="area">
							<i class="fa fa-files-o"></i> Área
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>contacto" class="nav-link text-secondary" alt="contactenos">
							<i class="fa fa-envelope"></i>	Contactenos
							</a>
            </li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>login" class="nav-link" alt="iniciar sesion">
								<button class="btn btn-outline-success">
								<i class="fa fa-sign-in"></i> Iniciar Sesión
								</button>
							</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
	 <?php }elseif(in_array('au',$_SESSION['permisos'])){ ?>
			<!-- Barra de Menú -->
<!-- Administrador de Usuarios -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="menu">
    <div class="container-fluid">
		<a href="<?php echo base_url(); ?>inicio"><img class="navbar-brand" src="<?php echo base_url(); ?>assets/imagenes/logo3.png" alt="Logo REA"  id="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
				<a href="<?php echo base_url(); ?>inicio" class="nav-link text-secondary" alt="inicio">
					<i class="fa fa-home"></i> Inicio
				</a>
			</li>
            <li class="nav-item">
				<a href="<?php echo base_url(); ?>area" class="nav-link text-secondary" alt="area">
					<i class="fa fa-files-o"></i> Área	
				</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>contacto" class="nav-link text-secondary" alt="contactenos">
					<i class="fa fa-envelope"></i> Contactenos
				</a>
			</li>
			<li class="nav-item dropdown">
      			<a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>contacto" id="navbardrop" data-toggle="dropdown">
					<i class="fa fa-user-circle"></i> Perfil
				</a>
      			<div class="dropdown-menu" id="desplegable">
        			<a class="dropdown-item" href="#">
						<i class="fa fa-pencil"></i> Editar Perfil
					</a>
        			<a class="dropdown-item " href="#">
						<i class="fa fa-users"></i> Administrar Usuarios
					</a>
     				<a class="dropdown-item" href="#">
						<i class="fa fa-trash"></i> Eliminar Cuenta
					</a>
  				</div>
			</li>
			<li class="nav-item">
				<a href="login/cerrarSession" class="nav-link" alt="cerrar sesion">
					<button class="btn btn-outline-danger">
						<i class="fa fa-sign-out"></i> Cerrar Sesión
					</button>
				</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
	<?php	}elseif(in_array('ar',$_SESSION['permisos'])){
		?><nav class="navbar navbar-expand-lg navbar-light fixed-top" id="menu">
    <div class="container-fluid">
		<a href="<?php echo base_url(); ?>inicio"><img class="navbar-brand" src="<?php echo base_url(); ?>assets/imagenes/logo3.png" alt="Logo REA"  id="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
				<a href="<?php echo base_url(); ?>inicio" class="nav-link text-secondary" alt="inicio">
					<i class="fa fa-home"></i> Inicio
				</a>
			</li>
            <li class="nav-item">
				<a href="<?php echo base_url(); ?>area" class="nav-link text-secondary" alt="area">
					<i class="fa fa-files-o"></i> Área
				</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>contacto" class="nav-link text-secondary" alt="contactenos">
					<i class="fa fa-envelope"></i>	Contactenos
				</a>
			</li>
			<li class="nav-item dropdown">
      			<a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>contacto" id="navbardrop" data-toggle="dropdown">
					<i class="fa fa-user-circle-o"></i> Perfil
				</a>
      			<div class="dropdown-menu" id="desplegable">
        			<a class="dropdown-item" href="#">
						<i class="fa fa-pencil"></i> Editar Perfil
					</a>
        			<a class="dropdown-item " href="#">
						<i class="fa fa-pencil-square-o"></i> Administrar Recursos
					</a>
     				<a class="dropdown-item" href="#">
						<i class="fa fa-trash"></i> Eliminar Cuenta
					</a>
  				</div>
			</li>
			<li class="nav-item">
				<a href="login/cerrarSession"  class="nav-link" alt="cerrar sesion">
					<button class="btn btn-outline-danger">
						<a href=><i class="fa fa-sign-out"></i></a> Cerrar Sesión
					</button>
				</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>

<?php 	}
			
	
	?>
		
<div class="container-fluid" id="cuerpo">
