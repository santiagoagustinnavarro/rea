<?php echo form_open('categoria/edit/'.$categoria['nombre'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		
		<label for="nombre" class="col-md-4 control-label">Nombre</label>
		<div class="col-md-8">
			<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $categoria['nombre']); ?>" class="form-control" id="nombre" />
			<span class="text-danger"><?php echo form_error('nombre');?></span>
			
		</div>
		<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
		<div class="col-md-8">
		<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $categoria['descripcion']); ?>" class="form-control" id="descripcion" />
		<span class="text-danger"><?php echo form_error('descripcion');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Actualizar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>