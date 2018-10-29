<div class="container py-4">
	<div class="col-md-6 mx-auto">
		<div class="container">
			<h1 class="titulo">Registro Usuario</h1>
  			<form id="formulario" method="post" action="registro">
    			<div class="form-group">
					<label class="label" for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"  required>
				</div>
				<div class="form-group">
					<label class="label" for="apellido">Apellido</label>
					<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido"  required>
				</div>
				<div class="form-group">
					<label class="label" for="domicilio">Domicilio</label>
					<input type="text" class="form-control" id="domicilio" placeholder="Domicilio" name="domicilio">
				</div>
				<div class="form-group">
					<label class="label" for="dni">Numero de Documento</label>
					<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" name="dni">
				</div>
				<div class="form-group">
					<label class="label" for="email">E-mail:</label>
					<input type="email" class="form-control" id="email" placeholder="Correo@ejemplo..." name="email"  required>
				</div>
				<div class="form-group">
					<label class="label" for="nombreUsuario">Nombre de Usuario</label>
  	  	  			<input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" name="nombreUsuario" required >
  	 	  		</div>
  		  		<div class="form-group">
					<label class="label" for="clave">Contraseña</label>
      				<input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave"  required>
				</div>
				<div class="form-group">
					<label class="label" for="clave">Confirmar Contraseña</label>
      				<input type="password" class="form-control" id="clave2" placeholder="Reingrese contraseña" name="clave2"  required>
				</div>
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
				<?php 
				if(isset($mensaje)){
				echo $mensaje;
				}
				?> 
			</form>
		</div> <!-- Cierre del container -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->
