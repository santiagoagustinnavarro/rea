<?php echo form_open('comentario/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="idRecurso" class="col-md-4 control-label"><span class="text-danger">*</span>IdRecurso</label>
		<div class="col-md-8">
			<input type="text" name="idRecurso" value="<?php echo $this->input->post('idRecurso'); ?>" class="form-control" id="idRecurso" />
			<span class="text-danger"><?php echo form_error('idRecurso');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nombreUsuario" class="col-md-4 control-label"><span class="text-danger">*</span>NombreUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreUsuario" value="<?php echo $this->input->post('nombreUsuario'); ?>" class="form-control" id="nombreUsuario" />
			<span class="text-danger"><?php echo form_error('nombreUsuario');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="descripcion" class="col-md-4 control-label"><span class="text-danger">*</span>Descripcion</label>
		<div class="col-md-8">
			<input type="text" name="descripcion" value="<?php echo $this->input->post('descripcion'); ?>" class="form-control" id="descripcion" />
			<span class="text-danger"><?php echo form_error('descripcion');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="fecha" class="col-md-4 control-label">Fecha</label>
		<div class="col-md-8">
			<input type="text" name="fecha" value="<?php echo $this->input->post('fecha'); ?>" class="form-control" id="fecha" />
		</div>
	</div>
	<div class="form-group">
		<label for="hora" class="col-md-4 control-label">Hora</label>
		<div class="col-md-8">
			<input type="text" name="hora" value="<?php echo $this->input->post('hora'); ?>" class="form-control" id="hora" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>