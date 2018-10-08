<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Registro de Usuario</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.min.js" ></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"/>
  		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" ></script>
	</head>
	<body>
<div class="container">
<h1 class="text-secondary">Registro Usuario</h1>
  <form method="post" action="ej.php">
    <div class="form-group">
		<label for="nombre" class="text-secondary">Nombre</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
			<label for="apellido" class="text-secondary">Apellido</label>
      <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido">
      <label for="email" class="text-secondary">Correo Electronico</label>
      <input type="email" class="form-control" id="email" placeholder="ejemplo@..." name="email">
			<label for="user" class="text-secondary">Nombre del Usuario</label>
      <input type="text" class="form-control" id="user" placeholder="Nombre Usuario" name="user">
    </div>
    <div class="form-group">
      <label for="clave" class="text-secondary">Contraseña</label>
      <input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
	</body>
</html>
