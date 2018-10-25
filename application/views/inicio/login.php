<div id="registro" class="alert alert-primary">
	<label class="label">Si no esta registrado ingrese aqui </label>
	<a href="<?php echo base_url(); ?>registro" class="nav-link"><button class="btn btn-primary">Registrarse</button></a>
</div>
<div class="container py-4">
	<div class="col-md-6 mx-auto">
		<div class="container">
			<h1 class="titulo">Login</h1>
			<?php
			if(isset($mensaje)){
				echo "<h1>".$mensaje."</h2>";
			}
			
			echo form_open("login/",array('id'=>'formulario','method'=>'post'),'');
			?>
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
			
			echo form_close();
			?>
			
        		
    		
		</div>
	</div>
</div>
