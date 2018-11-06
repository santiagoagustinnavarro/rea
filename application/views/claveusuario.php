<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container" id="transparencia">
  			<form id="formulario" method="get" action="recuperarclave">
			<?php 
			if(isset($mensaje)){
			echo $mensaje;
			}
			?> 
			  <h1 class="titulo">Recuperar clave</h1>
                </br>
  		  		<div class="form-group">
					<label class="label" for="clave"><i class="fa fa-user"></i> Usuario</label>
      				<input type="text" class="form-control" id="nombreUsuario" placeholder="Ingrese el usuario" name="nombreUsuario"  required>
				</div>
				
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div> <!-- Cierre del container -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->

