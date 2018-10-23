<?php echo form_open('usuario/edit/'.$usuario['nombreUsuario'],array("class"=>"form-horizontal")); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">	
	<div class="form-group">
		<label for="clave" class="col-md-4 control-label">Clave</label>
		<div class="form-control">
			<input type="text" name="clave" value="<?php echo ($this->input->post('clave') ? $this->input->post('clave') : $usuario['clave']); ?>" class="form-control" id="clave" />
		</div>
	</div>
	<div class="form-group">
		<label for="dni" class="col-md-4 control-label">Dni</label>
		<div class="form-control">
			<input type="text" name="dni" value="<?php echo ($this->input->post('dni') ? $this->input->post('dni') : $usuario['dni']); ?>" class="form-control" id="dni" />
		</div>
	</div>
	<div class="form-group">
		<label for="apellido" class="col-md-4 control-label">Apellido</label>
		<div class="form-control">
			<input type="text" name="apellido" value="<?php echo ($this->input->post('apellido') ? $this->input->post('apellido') : $usuario['apellido']); ?>" class="form-control" id="apellido" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombre" class="col-md-4 control-label">Nombre</label>
		<div class="form-control">
			<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $usuario['nombre']); ?>" class="form-control" id="nombre" />
		</div>
	</div>
	<div class="form-group">
		<label for="domicilio" class="col-md-4 control-label">Domicilio</label>
		<div class="form-control">
			<input type="text" name="domicilio" value="<?php echo ($this->input->post('domicilio') ? $this->input->post('domicilio') : $usuario['domicilio']); ?>" class="form-control" id="domicilio" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="form-control">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $usuario['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
        </div>
	</div>
</div>
</div>
</div>
<?php echo form_close(); ?>
