<?php echo form_open('categoria/edit/'.$categoria['nombre'],array("class"=>"form-horizontal")); ?>
<br/>
<div class="container">
	<div class="box box-primary col-md-12">
		<h1>Editar una Categoria</h1>
		<br/>
		<div class="form-group">
			<label for="nombre" class="col-md-2 control-label">Nombre</label>
			<div class="col-md-8">
				<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $categoria['nombre']); ?>" class="form-control" id="nombre" />
				<span class="text-danger"><?php echo form_error('nombre');?></span>
			</div>
		</div>
		<div class="form-group">
			<label for="descripcion" class="col-md-2 control-label">Descripcion</label>
			<div class="col-md-8">
				<textarea name="descripcion"class="form-control" id="descripcion"><?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $categoria['descripcion']); ?>
				</textarea>
				<span class="text-danger"><?php echo form_error('descripcion');?></span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				<button type="submit" class="btn btn-success">Actualizar</button>
        	</div>
		</div>
		<br/>
		<?php 
		echo form_close(); 
		?>
	</div>
</div>
