<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/estilo/imagenes/favicon.png" sizes="16x25"/>
	<title>
		<?php echo $title; ?>
	</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/dist/css/skins/skin-blue.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/estilo/css/estilo.css">
  <script src="<?php echo base_url();?>assets/estilo/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/estilo/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/estilo/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/estilo/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/estilo/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/estilo/dist/js/demo.js"></script>
	<?php
	if (isset($scripts)) { //Invocacion de scripts propios
    foreach ($scripts as $unScript) {
      echo "<script type=\"text/javascript\" src=\"" . base_url() . "assets/estilo/js/" . $unScript . "\"></script>";
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
	<?php
		if (!$this->session->iniciada) {
	?>
		<nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
				</div>
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>inicio" alt="Inicio">Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar" alt="Area">Area</a></li>
            <li><a href="<?php echo base_url(); ?>contacto" alt="Contactenos">Contactenos</a></li>
						<li>
							<a class="btn btn-success" href="<?php echo base_url(); ?>login" alt="iniciar sesion" value="">
								Iniciar Sesión
							</a>
						</li>
        	</ul>
				</div> <!-- /.navbar-custom-menu -->
				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					<a href="<?php echo base_url(); ?>inicio"><img src="<?php echo base_url(); ?>assets/estilo/imagenes/logo3.png"
				 alt="Logo REA" id="logo"></a>
				</div>
    	</div> <!-- /.container -->
    </nav>
		<?php
			} elseif ($this->session->rol == 'administrador de usuarios') {
    ?>
		<nav class="navbar navbar-static-top">
			<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
				</div>
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
						<li><a href="<?php echo base_url()."usuario"?>" alt="Inicio">Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar" alt="Area">Area</a></li>
            <li><a href="<?php echo base_url(); ?>contacto" alt="Contactenos">Contactenos</a></li>
						<li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php 
                 if($this->session->foto!=""){
                  echo base_url()."assets/upload/fotoPerfil/".$this->session->nombreUsuario."/fotoPerfil.png";
                }else{
                  echo base_url()."assets/upload/fotoPerfil/user-default.png";
                }
                  ?>
                  " class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->nombreUsuario;?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <!-- The user image in the menu -->
								<li class="user-header">
                  <img src="<?php 
                 if($this->session->foto!=""){
                  echo base_url()."assets/upload/fotoPerfil/".$this->session->nombreUsuario."/fotoPerfil.png";
                }else{
                  echo base_url()."assets/upload/fotoPerfil/user-default.png";
                  
                }
                  ?>" class="img-circle" alt="User Image">
									<p><?php echo $this->session->nombreUsuario;?>
                  	<small>Administrador de Usuarios</small>
                	</p>
								</li>  
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url()."usuario/editarPerfil"?>" class="btn btn-primary">Perfil</a>
									</div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>login/cerrarSession" class="btn btn-danger">Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </li>
        	</ul>
				</div> <!-- /.navbar-custom-menu -->
				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					<a href="<?php echo base_url(); ?>inicio"><img src="<?php echo base_url(); ?>assets/estilo/imagenes/logo3.png"
				 alt="Logo REA" id="logo"></a>
				</div>
      </div> <!-- /.container -->
  	</nav><!-- /.navbar-custom-menu -->    
		<?php
			} elseif ($this->session->rol == 'administrador de recursos') {
    ?>
		<nav class="navbar navbar-static-top">
		<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
				</div>
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url()."recurso"?>" alt="Inicio">Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar" alt="Area">Area</a></li>
            <li><a href="<?php echo base_url(); ?>contacto" alt="Contactenos">Contactenos</a></li>
          	<li><a href="<?php echo base_url(); ?>recurso/listarCategoria">Agregar Seccion</a></li>
						<li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="
                <?php 
                if($this->session->foto!=""){
                  echo base_url()."assets/upload/fotoPerfil/".$this->session->nombreUsuario."/fotoPerfil.png";
                }else{   
                  echo base_url()."assets/upload/fotoPerfil/user-default.png";
                }  
                ?> " class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->nombreUsuario;?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="
                  <?php 
                    if($this->session->foto!=""){    
                      echo base_url()."assets/upload/fotoPerfil/".$this->session->nombreUsuario."/fotoPerfil.png";
                    }else{
                      echo base_url()."assets/upload/fotoPerfil/user-default.png";   
                    }
                  ?>" class="img-circle" alt="User Image">
									<p><?php echo $this->session->nombreUsuario;?>
                  	<small>Administrador de Recursos</small>
                	</p>
								</li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url()."usuario/editarPerfil"?>" class="btn btn-primary btn-flat">Perfil</a>
									</div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>login/cerrarSession" class="btn btn-danger btn-flat">Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </li>
        	</ul>
				</div> <!-- /.navbar-custom-menu -->
				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					<a href="<?php echo base_url(); ?>inicio"><img src="<?php echo base_url(); ?>assets/estilo/imagenes/logo3.png"
				 alt="Logo REA" id="logo"></a>
				</div>
      </div> <!-- /.container -->
  	</nav><!-- /.navbar-custom-menu -->
		<?php
    	} elseif ($this->session->rol == 'profesor') {
    ?>
		<nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
				</div>
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>inicio" alt="Inicio">Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar" alt="Area">Area</a></li>
						<li><a href="<?php echo base_url(); ?>contacto" alt="Contactenos">Contactenos</a></li>
						<li><a href="<?php echo base_url()."recurso/subirRecurso"?>" alt="Subir Recurso">Subir Recurso</a></li>
						<li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="
                <?php 
                if($this->session->foto!=""){
                  echo base_url()."assets/upload/fotoPerfil/".$this->session->nombreUsuario."/fotoPerfil.png";
                }else{
                 echo base_url()."assets/upload/fotoPerfil/user-default.png";
                 }
                 ?>" class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->nombreUsuario;?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="
                  <?php 
                    if($this->session->foto!=""){
                      echo base_url()."assets/upload/fotoPerfil/".$this->session->nombreUsuario."/fotoPerfil.png";
                    }else{
                      echo base_url()."assets/upload/fotoPerfil/user-default.png";
                    }
                  ?>" class="img-circle" alt="User Image">
									<p><?php echo $this->session->nombreUsuario;?>
										<small>Profesor</small>
                	</p>
								</li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url()."usuario/editarPerfil"?>" class="btn btn-primary btn-flat">Perfil</a>
									</div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>login/cerrarSession" class="btn btn-danger btn-flat">Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </li>
        	</ul>
				</div> <!-- /.navbar-custom-menu -->
				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					<a href="<?php echo base_url(); ?>inicio"><img src="<?php echo base_url(); ?>assets/estilo/imagenes/logo3.png"
				 alt="Logo REA" id="logo"></a>
				</div>
      </div> <!-- /.container -->
    </nav>
	<?php
  	}
  ?>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

