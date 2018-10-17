<!DOCTYPE html>
<html>
<head>
	<meta name="viewport"  width="device-width" charset="utf-8"/>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet"   href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet"   href="<?php echo base_url(); ?>assets/css/estilo.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" ></script>
<script>alert('<?php echo base_url();?>')</script>;
	
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
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="menu">
      <div class="container">
			<a href="#"><img class="navbar-brand" src="<?php echo base_url(); ?>assets/imagenes/logo3.png" alt="Logo REA"  id="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
							<a href="#" class="nav-link text-secondary" alt="inicio">Inicio</a>
						</li>
            <li class="nav-item">
							<a href="#" class="nav-link text-secondary" alt="area">Área</a>
						</li>
							<li class="nav-item"><a href="#" class="nav-link text-secondary" alt="contacto">Contacto</a></li>
            </li>
						<li class="nav-item">
              <a href="#" class="nav-link"><button class="btn btn-outline-secondary">Registrarse</button></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
		<div class="container" id="cuerpo">
