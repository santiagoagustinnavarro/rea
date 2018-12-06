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
        <!-- Collect the nav links, forms, and other content for toggling -->
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
        </div>
        <!-- /.navbar-custom-menu -->
    </div>
      <!-- /.container-fluid -->
    </nav>
		<?php
			} elseif ($this->session->rol == 'administrador de usuarios') {
    ?>
		<nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>inicio" alt="Inicio">Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar" alt="Area">Area</a></li>
            <li><a href="<?php echo base_url(); ?>contacto" alt="Contactenos">Contactenos</a></li>
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Añadir Categoria <span class="caret"></span></a>
              <ul class="dropdown-menu" id="desplegable" role="menu">
                <li><a href="#">Agregar Categoria</a></li>
                <li><a href="#">Agregar Tema</a></li>
              </ul>
            </li>
						<li>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>login/cerrarSession">
							Cerrar Sesión
							</a>
						</li>
        	</ul>
        </div> <!-- /.navbar-collapse -->
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Nombre Usuario</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
									<p>Nombre Usuario
                  	<small>Rol Usuario</small>
                	</p>
								</li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
									</div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>login/cerrarSession" class="btn btn-default btn-flat">Cerrar Sesion</a>
                  </div>
                </li>
              
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      
      <!-- /.container-fluid -->
    </nav>
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
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>inicio">Inicio<span class="sr-only"></span></a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar">Area</a></li>
            <li><a href="<?php echo base_url(); ?>contacto">Contactenos</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Añadir Categoria <span class="caret"></span></a>
              <ul class="dropdown-menu" id="desplegable" role="menu">
                <li><a href="#">Agregar Categoria</a></li>
                <li><a href="#">Agregar Tema</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Nombre Usuario</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
									<p>Nombre Usuario
                  	<small>Rol Usuario</small>
                	</p>
								</li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
									</div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>login/cerrarSession" class="btn btn-default btn-flat">Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </li>
      </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
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
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>inicio">Inicio<span class="sr-only"></span></a></li>
            <li><a href="<?php echo base_url(); ?>recurso/listar">Area</a></li>
            <li><a href="<?php echo base_url(); ?>contacto">Contactenos</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Nombre Usuario</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url();?>assets/estilo/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
									<p>Nombre Usuario
                  	<small>Rol Usuario</small>
                	</p>
								</li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
									</div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>login/cerrarSession" class="btn btn-default btn-flat">Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </li>
      </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
	<?php
  	}
  ?>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

