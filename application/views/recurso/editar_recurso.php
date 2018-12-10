
<?php echo form_open('recurso/editar_recurso/'.$recurso['idRecurso'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="titulo" class="col-md-4 control-label"><span class="text-danger">*</span>Titulo</label>
		<div class="col-md-8">
			<input type="text" name="titulo" value="<?php echo ($this->input->post('titulo') ? $this->input->post('titulo') : $recurso['titulo']); ?>" class="form-control" id="titulo" />
			<span class="text-danger"><?php echo form_error('titulo');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="descripcion" class="col-md-4 control-label"><span class="text-danger">*</span>Descripcion</label>
		<div class="col-md-8">
			<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $recurso['descripcion']); ?>" class="form-control" id="descripcion" />
			<span class="text-danger"><?php echo form_error('descripcion');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nombreUsuario" class="col-md-4 control-label"><span class="text-danger">*</span>NombreUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreUsuario" value="<?php echo ($this->input->post('nombreUsuario') ? $this->input->post('nombreUsuario') : $recurso['nombreUsuario']); ?>" class="form-control" id="nombreUsuario" />
			<span class="text-danger"><?php echo form_error('nombreUsuario');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nombreTema" class="col-md-4 control-label"><span class="text-danger">*</span>NombreTema</label>
		<div class="col-md-8">
			<input type="text" name="nombreTema" value="<?php echo ($this->input->post('nombreTema') ? $this->input->post('nombreTema') : $recurso['nombreTema']); ?>" class="form-control" id="nombreTema" />
			<span class="text-danger"><?php echo form_error('nombreTema');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>