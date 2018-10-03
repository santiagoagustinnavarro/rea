<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>REA</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.min.js" ></script>
	<style type="text/css" href="<?php echo base_url(); ?>assets/style.css"></style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Rea</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Inicio</a>
    </li>
    <li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Área 
	  <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
	  </div>
	  </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" id="contacto">Contacto</a>
	</li>
  </ul>
  <ul class="navbar-nav">
  	<li class="navv-item" id="registrarse">
		<a class="nav-link btn btn-success">Registrarse</a>
	</li>
  </ul>
</nav>
</body>
</html>
