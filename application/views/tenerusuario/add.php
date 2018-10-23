<?php echo form_open('tenerusuario/add',array("class"=>"form-horizontal")); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">	
		<h1 class="titulo">Alta Usuario</h1>
			<div class="form-group">
				<label for="nombreUsuario" class="col-md-12 control-label" id="label">Nombre de Usuario</label>
				<div>
					<input type="text" name="nombreUsuario" value="<?php echo $this->input->post('nombreUsuario'); ?>" class="form-control" id="nombreUsuario" />
				</div>
			</div>
			<div class="form-group">
				<label for="nombreEstadoUsuario" class="col-md-12 control-label" id="label">Nombre del Estado Usuario</label>
				<div>
					<input type="text" name="nombreEstadoUsuario" value="<?php echo $this->input->post('nombreEstadoUsuario'); ?>" class="form-control" id="nombreEstadoUsuario" />
				</div>
			</div>
			<div class="form-group">
				<label for="fechaFin" class="col-md-12 control-label" id="label">Fecha Fin</label>
				<div>
					<input type="text" name="fechaFin" value="<?php echo $this->input->post('fechaFin'); ?>" class="form-control" id="fechaFin" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-12" id="boton">
					<button type="submit" class="btn btn-success">Guardar</button>
        		</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
