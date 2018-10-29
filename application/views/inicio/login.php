<div class="container-fluid">
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<div class="container">
				</br>
				<?php
				echo form_open("login/",array('id'=>'formulario','method'=>'post'),'');
					?>   
				<div id="registro" class="alert alert-primary">
					<label class="label">Si no esta registrado ingrese aqui <i class="fa fa-arrow-right"></i></label>
					<a href="<?php echo base_url(); ?>usuario/registro">
						<button class="btn btn-primary">Registrarse</button>
					</a>
				</div> <!-- Cierre del  id registro-->
				<div id="formulario">
					<h1 id="tituloLogin">Login</h1>
        			<div class="form-group">
						<label class="label" for="nombreUsuario">Nombre de Usuario</label>
						<input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre Usuario" required>
					</div>
					<div class="form-group">
						<label class="label" for="clave">Contraseña</label>
    					<input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required >
					</div>
					<div class="form-group" id="boton">
    					<button type="submit" class="btn btn-success">Ingresar</button>
					</div>
					<?php
					if(isset($mensaje)){
					echo '<div class="alert alert-danger text-center"><h4>'.$mensaje.'</h4>';
					}
					?>
					<?php	
					echo form_close();
					?> 	
				</div> <!-- Cierre de id formulario -->
			</div> <!-- Cierre del container -->
		</div><!-- Cierre del offset -->
		</div> <!-- Cierre del col -->
	</div> <!-- Cierre del row -->
</div> <!-- Cierre del container final -->
