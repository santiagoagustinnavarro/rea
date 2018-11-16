<?php
	include_once "application/controllers/usuario.php";
	$sesion=new Login();
	if ($_SESSION["iniciada"]) {
?>
<div class="container py-4">
	<?php
		if(isset($mensaje)){
			echo $mensaje;
		}	
	?>
	<div class="col-md-6 mx-auto">
		<div class="container">
  			<form id="formulario" method="post" action="editarPerfil" onsubmit="return validarPerfil();">
				<div id="transparencia">
			  	<h2>Datos Personales</h2>
			  	</br>
			  	<div class="form-group">
					<label class="label" for="nombreUsuario">Nombre de Usuario</label>
  	  	  			<input readonly type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" name="nombreUsuario" minlength="6" maxlength="15" 
					value="<?php echo $_SESSION["nombreUsuario"];?>" required >		
				</div>
    			<div class="form-group">
					<label class="label" for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" minlength="3" maxlength="25"
					value="<?php echo $_SESSION["nombre"];?>" required>
				</div>
				<div class="form-group">
					<label class="label" for="apellido">Apellido</label>
					<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" minlength="4" maxlength="30"
					value="<?php echo $_SESSION["apellido"];?>" required>
				</div>
				<div class="form-group">
					<label class="label" for="domicilio">Domicilio</label>
					<input type="text" class="form-control" id="domicilio" placeholder="Domicilio" minlength="6" maxlength="35"
					value="<?php echo $_SESSION["domicilio"];?>" name="domicilio">
				</div>
				<div class="form-group">
					<label class="label" for="dni">Numero de Documento</label>
					<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" minlength="7" maxlength="12"
					value="<?php echo $_SESSION["dni"];?>" name="dni">
				</div>
				<div class="form-group">
					<label class="label" for="email">Correo Electronico</label>
					<input type="email" class="form-control" id="email" placeholder="Correo@ejemplo.com" name="email" minlength="10" maxlength="40"
					value="<?php echo $_SESSION["email"];?>" required>
				</div>
			</div>
			<div id="transparencia">
				<h3>Actualizar Contraseña</h3>
				<div class="form-group">
					<label class="label" for="clave">Contraseña Antigua</label>
      				<input type="password" class="form-control" id="clave" placeholder="Ingrese Contraseña" name="clave" minlength="8" maxlength="15">
				</div>
				<div class="form-group">
					<label class="label" for="clave1">Nueva Contraseña</label>
      				<input type="password" class="form-control" id="clave1" placeholder="Nueva Contraseña" name="clave1" minlength="8" maxlength="15">
				</div>
				<div class="form-group">
					<label class="label" for="clave">Confirmar Contraseña</label>
      				<input type="password" class="form-control" id="clave2" placeholder="Reingrese Contraseña" name="clave2" minlength="8" maxlength="15">
				</div>
			</div>
				<div class="form-group" id="transparencia">
					<a href="<?php echo base_url()?>inicio">
						<button type="button" name="no" id="no" class="btn btn-danger">Cancelar</button>
					</a>
					<a href="#">
						<button type="submit" class="btn btn-success">Actualizar</button>
					</a>
					<a>
						<button type="reset" class="btn btn-info">Limpiar</button>
					</a>
				</div>
			</form>
		</div> <!-- Cierre del container -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->
<?php
}
?>
