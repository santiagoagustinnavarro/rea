<?php echo form_open('tienerol/add',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="fechaInicio" class="col-md-12 control-label">Fecha Inicio</label>
		<div>
			<input type="text" name="fechaInicio" value="<?php echo $this->input->post('fechaInicio'); ?>" class="form-control" id="fechaInicio" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaFin" class="col-md-12 control-label">Fecha Fin</label>
		<div>
			<input type="text" name="fechaFin" value="<?php echo $this->input->post('fechaFin'); ?>" class="form-control" id="fechaFin" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
<?php echo form_close(); ?>
