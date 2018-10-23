<?php echo form_open('tienerol/edit/'.$tienerol['nombreUsuario'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="fechaInicio" class="col-md-4 control-label">FechaInicio</label>
		<div class="col-md-8">
			<input type="text" name="fechaInicio" value="<?php echo ($this->input->post('fechaInicio') ? $this->input->post('fechaInicio') : $tienerol['fechaInicio']); ?>" class="form-control" id="fechaInicio" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaFin" class="col-md-4 control-label">FechaFin</label>
		<div class="col-md-8">
			<input type="text" name="fechaFin" value="<?php echo ($this->input->post('fechaFin') ? $this->input->post('fechaFin') : $tienerol['fechaFin']); ?>" class="form-control" id="fechaFin" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>