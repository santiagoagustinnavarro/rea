<?php echo form_open('tenerusuario/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreUsuario" class="col-md-4 control-label">NombreUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreUsuario" value="<?php echo $this->input->post('nombreUsuario'); ?>" class="form-control" id="nombreUsuario" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombreEstadoUsuario" class="col-md-4 control-label">NombreEstadoUsuario</label>
		<div class="col-md-8">
			<input type="text" name="nombreEstadoUsuario" value="<?php echo $this->input->post('nombreEstadoUsuario'); ?>" class="form-control" id="nombreEstadoUsuario" />
		</div>
	</div>
	<?php 
	$estados=$this->Estadousuario_model->get_all_estadousuario();
	?><select name="" id="">
	<?php 
	foreach($estados as $unEstado){
		echo "<option>".$unEstado["nombre"]."</option>";
	}  ?>
	</select>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>