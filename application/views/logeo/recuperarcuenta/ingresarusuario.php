<div class="container">
	<br/>
	<div class="col-md-offset-3 col-md-6">
		<div class="box box-primary" id="recuperarClave">
			<div class="register-box-body">
           		<?php echo form_open("recuperarcuenta/index",array("method"=>'get'));?> 
				<?php 
					if(isset($mensaje)){
						echo $mensaje;
					}
				?> 
			    <h1>Recuperar clave</h1>
                <br/>
				<div class="form-group has-feedback">
		  			<input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese el Nombre Usuario" minlength="6" maxlength="15">
        			<span class="glyphicon glyphicon-user form-control-feedback"></span>
      			</div>
				<div class="form-group has-feedback">
					<button type="submit" id="enviarmail" class="btn btn-success">Enviar</button>
				</div>
				<div id="loading" hidden>Cargando... <span class="fa fa-spinner fa-spin"></span>
				</div>
			    <?php echo form_close();?> 
			</div> <!-- Cierre del register-box-body -->
		</div> <!-- Cierre de la clase box box-primary -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->
