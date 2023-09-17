<div class="container">
	<div class="col-md-12">
		<div class="register-box-body" id="registro">
			<h1><b>Registro Usuario</b></h1><br />

			<?php
			if (isset($mensaje)) {
				echo $mensaje;
			}
			?>

			<form id="formulario" method="post" action="registro" onsubmit="return validarRegistro();">

				<div class="row">
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="text" class="form-control" id="nombre" placeholder="Nombre/s (*)" name="nombre" minlength="3" maxlength="25" value="<?php echo set_value('nombre'); ?>">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
							<?php echo form_error('nombre'); ?>
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="text" class="form-control" id="apellido" placeholder="Apellido/s (*)" name="apellido" minlength="4" maxlength="30" value="<?php echo set_value('apellido'); ?>">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
							<?php echo form_error('apellido'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" minlength="7" maxlength="12" name="dni" value="<?php echo set_value('dni'); ?>">
							<span class="glyphicon glyphicon-list-alt form-control-feedback"></span>

						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="text" class="form-control" id="estudio" minlength="4" maxlength="40" placeholder="Terciario o Universidad (*)" name="estudio" value="<?php echo set_value('estudio'); ?>">
							<span class="glyphicon glyphicon-book form-control-feedback"></span>
							<?php echo form_error('estudio'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario (*)" name="nombreUsuario" minlength="6" maxlength="15" value="<?php echo set_value('nombreUsuario'); ?>">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
							<?php echo form_error('nombreUsuario'); ?>
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="email" class="form-control" id="email" placeholder="Correo Electronico (*)" name="email" minlength="10" maxlength="40" value="<?php echo set_value('email'); ?>">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							<?php echo form_error('email'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="password" class="form-control" id="clave" placeholder="Ingrese Contraseña (*)" name="clave" minlength="8" maxlength="15" value="<?php echo set_value('clave'); ?>">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<?php echo form_error('claveconf'); ?>
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group has-feedback">
							<input type="password" class="form-control" id="claveconf" placeholder="Reingrese Contraseña (*)" name="claveconf" minlength="8" maxlength="15" value="<?php echo set_value('claveconf'); ?>">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<?php echo form_error('claveconf'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="box-footer">
						<input type="submit" class="btn btn-success" value="Enviar">
					</div> <!-- /.box-footer -->
				</div> <!-- /.row -->
			</form>
		</div> <!-- /.form-box -->
	</div><!-- /.register-box -->
</div>