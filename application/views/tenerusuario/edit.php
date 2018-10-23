<?php echo form_open('tenerusuario/edit/'.$tenerusuario['hora'],array("class"=>"form-horizontal")); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">	
		<h1 class="titulo">Actualizar Usuario</h1>
			<div class="form-group">
				<label for="nombreUsuario" class="control-label">Nombre de Usuario</label>
				<div class="form-control">
					<input type="text" name="nombreUsuario" value="<?php echo ($this->input->post('nombreUsuario') ? $this->input->post('nombreUsuario') : $tenerusuario['nombreUsuario']); ?>" class="form-control" id="nombreUsuario" />
				</div>
			</div>
			<div class="form-group">
				<label for="nombreEstadoUsuario" class="control-label">Nombre de Estado Usuario</label>
				<div class="form-control">
					<input type="text" name="nombreEstadoUsuario" value="<?php echo ($this->input->post('nombreEstadoUsuario') ? $this->input->post('nombreEstadoUsuario') : $tenerusuario['nombreEstadoUsuario']); ?>" class="form-control" id="nombreEstadoUsuario" />
				</div>
			</div>
			<div class="form-group">
				<label for="fechaFin" class="control-label">Fecha Fin</label>
				<div class="form-control">
					<input type="text" name="fechaFin" value="<?php echo ($this->input->post('fechaFin') ? $this->input->post('fechaFin') : $tenerusuario['fechaFin']); ?>" class="form-control" id="fechaFin" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">Guardar</button>
        		</div>
			</div>
		</div>
	</div>
	
<?php echo form_close(); ?>
