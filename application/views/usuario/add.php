<div class="container py-4">
	<div class="col-md-6 mx-auto">
		<div class="container">
			<h1 class="titulo text-secondary">Registro Usuario</h1>
			<?php 
				if(isset($mensaje)){
					echo "<h2>".$mensaje."</h2>";
				}
				echo form_open('usuario/add',array("class"=>"form")); ?>
  				<form id="registro" method="post">
    					<div class="form-group">
								<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="domicilio" placeholder="Domicilio" name="domicilio">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" name="dni">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Correo@ejemplo..." name="email">
							</div>
							<div class="form-group">
     						<input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" name="nombreUsuario">
    					</div>
    					<div class="form-group">
      					<input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave">
							</div>
							<div class="form-group" id="boton">
								<button type="submit" class="btn btn-success">Enviar</button>
							</div>
 					</form>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
