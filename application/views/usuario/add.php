<?php echo form_open('usuario/add',array("class"=>"form")); ?>

	<div class="form-group">
		<label for="clave" class="col-md-4 control-label">Clave</label>
		<div class="col-md-8">
			<input type="text" name="clave" value="<?php echo $this->input->post('clave'); ?>" class="form-control" id="clave" />
		</div>
	</div>
	<div class="form-group">
		<label for="dni" class="col-md-4 control-label">Dni</label>
		<div class="col-md-8">
			<input type="text" name="dni" value="<?php echo $this->input->post('dni'); ?>" class="form-control" id="dni" />
		</div>
	</div>
	<div class="form-group">
		<label for="apellido" class="col-md-4 control-label">Apellido</label>
		<div class="col-md-8">
			<input type="text" name="apellido" value="<?php echo $this->input->post('apellido'); ?>" class="form-control" id="apellido" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombre" class="col-md-4 control-label">Nombre</label>
		<div class="col-md-8">
			<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
		</div>
	</div>
	<div class="form-group">
		<label for="domicilio" class="col-md-4 control-label">Domicilio</label>
		<div class="col-md-8">
			<input type="text" name="domicilio" value="<?php echo $this->input->post('domicilio'); ?>" class="form-control" id="domicilio" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombreUsuario" class="col-md-4 control-label">NombreUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreUsuario" value="<?php echo $this->input->post('nombreUsuario'); ?>" class="form-control" id="nombreUsuario" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>