<?php echo form_open('usuario/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="clave" class="col-md-4 control-label"><span class="text-danger">*</span>Clave</label>
		<div class="col-md-8">
			<input type="text" name="clave" value="<?php echo $this->input->post('clave'); ?>" class="form-control" id="clave" />
			<span class="text-danger"><?php echo form_error('clave');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="dni" class="col-md-4 control-label">Dni</label>
		<div class="col-md-8">
			<input type="text" name="dni" value="<?php echo $this->input->post('dni'); ?>" class="form-control" id="dni" />
			<span class="text-danger"><?php echo form_error('dni');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="apellido" class="col-md-4 control-label"><span class="text-danger">*</span>Apellido</label>
		<div class="col-md-8">
			<input type="text" name="apellido" value="<?php echo $this->input->post('apellido'); ?>" class="form-control" id="apellido" />
			<span class="text-danger"><?php echo form_error('apellido');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nombre" class="col-md-4 control-label"><span class="text-danger">*</span>Nombre</label>
		<div class="col-md-8">
			<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
			<span class="text-danger"><?php echo form_error('nombre');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="estudio" class="col-md-4 control-label"><span class="text-danger">*</span>Estudio</label>
		<div class="col-md-8">
			<input type="text" name="estudio" value="<?php echo $this->input->post('estudio'); ?>" class="form-control" id="estudio" />
			<span class="text-danger"><?php echo form_error('estudio');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>