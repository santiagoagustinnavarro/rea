<?php echo form_open('tienerol/edit/'.$tienerol['nombreUsuario'],array("class"=>"form-horizontal")); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">	
			<h1 id="titulo">Agregar Rol</h1>
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
					<button type="submit" class="btn btn-success">Guardar</button>
        		</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
