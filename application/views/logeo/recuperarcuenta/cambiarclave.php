<div class="container">
	<br/>
	<div class="col-md-offset-3 col-md-6">
		<div class="box box-info" id="reestablecerClave">
			<div class="register-box-body">
  				<form id="formulario" method="post">
					<?php 
					if(isset($mensaje)){ 
						echo $mensaje;
					}
					?> 
					<h1>Reestablecer Contraseña</h1>
					<br/>
  		  			<div class="form-group has-feedback">
      					<input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave" minlength="8" maxlength="15" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
      					<input type="password" class="form-control" id="clave2" placeholder="Confirmar contraseña" name="clave2" minlength="8" maxlength="15" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback" id="boton">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>
				</form>
			</div> <!-- Cierre del register-box-body -->
		</div> <!-- Cierre de la clase box box-info -->
	</div> <!-- Cierre de la clase box box-info -->	
</div> <!-- Cierre del container final -->
