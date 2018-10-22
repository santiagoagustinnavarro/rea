<?php echo form_open('tenerusuario/edit/'.$tenerusuario['hora'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreUsuario" class="col-md-4 control-label">NombreUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreUsuario" value="<?php echo ($this->input->post('nombreUsuario') ? $this->input->post('nombreUsuario') : $tenerusuario['nombreUsuario']); ?>" class="form-control" id="nombreUsuario" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombreEstadoUsuario" class="col-md-4 control-label">NombreEstadoUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreEstadoUsuario" value="<?php echo ($this->input->post('nombreEstadoUsuario') ? $this->input->post('nombreEstadoUsuario') : $tenerusuario['nombreEstadoUsuario']); ?>" class="form-control" id="nombreEstadoUsuario" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaFin" class="col-md-4 control-label">FechaFin</label>
		<div class="col-md-8">
			<input type="text" name="fechaFin" value="<?php echo ($this->input->post('fechaFin') ? $this->input->post('fechaFin') : $tenerusuario['fechaFin']); ?>" class="form-control" id="fechaFin" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>