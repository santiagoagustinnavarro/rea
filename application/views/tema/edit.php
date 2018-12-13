<?php echo form_open('tema/edit/'.$tenercategoria['nombreTema']."/".$tenercategoria['nombreCategoria'], array("class"=>"form-horizontal")); ?>

<div class="form-group">
<label for="nombreTema" class="col-md-4 control-label">Nombre del tema</label>
	<div class="col-md-8">
		<input type="text" class="form-control" name="nombreTema" id="nombreTema" value="<?php echo($this->input->post('nombreTema') ? $this->input->post('nombreTema') : $tenercategoria['nombreTema']); ?>">
		<span class="text-danger"><?php echo form_error('nombreTema');?></span>
	</div>
</div>
<div class="form-group">
		<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
		<div class="col-md-8">
			<textarea name="descripcion" class="form-control" id="descripcion" ><?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $tema['descripcion']); ?></textarea>
			<span class="text-danger"><?php echo form_error('descripcion');?></span>
		</div>
	</div>
<div class="form-group">
	<label for="categoria" class="col-md-4 control-label">Categorias</label>
	<div class="col-md-8">
		<?php
            foreach ($categorias as $unaCat) {
                $cats[$unaCat["nombre"]]=$unaCat["nombre"];
            }
            echo form_dropdown('categoria', $cats, $tenercategoria['nombreCategoria'], "class=form-control");
             ?>
		
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php 
if(isset($mensaje)){
	echo $mensaje;
}
 echo form_close();
?>