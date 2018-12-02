
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container" id="transparencia">
		<?php
      
            ?> 
  			<form id="formulario" method="post">
			<?php 
			if(isset($mensaje)){ 
			echo $mensaje;
			}
			?> 
			  <h1>Reestablecer Contraseña</h1>
                </br>
  		  		<div class="form-group">
					<label class="label" for="clave"><i class="fa fa-lock"></i> Contraseña</label>
      				<input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave" minlength="8" maxlength="15" required>
				</div>
				<div class="form-group">
					<label class="label" for="clave2"><i class="fa fa-lock"></i> Confirmar Contraseña</label>
      				<input type="password" class="form-control" id="clave2" placeholder="Reingrese contraseña" name="clave2" minlength="8" maxlength="15" required>
				</div>
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div> <!-- Cierre del container -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->
