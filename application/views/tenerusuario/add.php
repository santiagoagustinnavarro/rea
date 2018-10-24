<?php echo form_open('tenerusuario/add',array("class"=>"form-horizontal","method"=>"post"),array("fecha"=>$_GET["fecha"],"hora"=>$_GET["hora"])); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">	
		<h1 class="titulo">Cambio estado</h1>
			<div class="form-group">
				<label for="nombreUsuario" class="col-md-12 control-label" id="label">Nombre de Usuario</label>
				<div>
					<input disabled type="text" name="nombreUsuario" value="<?php echo $this->input->get('nombreUsuario'); ?>" class="form-control" id="nombreUsuario" />
				</div>
			</div>
			<div class="form-group">
				<label for="nombreEstadoUsuario" class="col-md-12 control-label" id="label">Nombre del Estado Usuario</label>
				<?php 
	$estados=$this->Estadousuario_model->get_all_estadousuario();
	?><select class="form-control" name="nombreEstadoUsuario" id="nombreEstadoUsuario">
	<?php 
	foreach($estados as $unEstado){
		echo "<option value=\"".$unEstado["nombre"]."\">".$unEstado["nombre"]."</option>";
	}  ?>
	</select>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-12" id="boton">
					<button type="submit" class="btn btn-success">Guardar</button>
        		</div>
			</div>
		</div>
	</div>
	

<?php echo form_close(); ?>

</div>