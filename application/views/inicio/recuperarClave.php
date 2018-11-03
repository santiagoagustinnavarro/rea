<div class="container-fluid">
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<div class="container">
				</br>
				<?php
				echo form_open("login/",array('id'=>'formulario','method'=>'post'),'');
				?>   
				<div id="formulario">
					<h1 id="tituloLogin">Recuperar Contraseña</h1>
        			<div class="form-group">
						<label class="label" for="nombreUsuario">Nombre de Usuario</label>
						<input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre Usuario" required>
					</div>
					<div class="form-group">
						<label class="label" for="clave">E-mail (Verificar su identidad)</label>
    					<input type="email" class="form-control" id="email" name="email" placeholder="Correo@ejemplo..." required >
					</div>
					<div class="form-group">
						<label class="label" for="clave">Contraseña</label>
    					<input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required >
					</div>
					<div class="form-group">
						<label class="label" for="clave">Nueva Contraseña</label>
    					<input type="password" class="form-control" id="clave3" name="clave3" placeholder="Nueva Contraseña" required >
					</div>
					<div class="form-group">
						<label class="label" for="clave">Confirmar Contraseña</label>
    					<input type="password" class="form-control" id="clave4" name="clave4" placeholder="Confirmar Contraseña" required >
					</div>
				</div> <!-- Cierre de id formulario -->
			</div> <!-- Cierre del container -->
		</div><!-- Cierre del offset -->
		</div> <!-- Cierre del col -->
	</div> <!-- Cierre del row -->
</div> <!-- Cierre del container final -->
