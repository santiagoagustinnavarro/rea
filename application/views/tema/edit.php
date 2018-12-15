<?php echo form_open('tema/edit/'.$tenercategoria['nombreTema']."/".$tenercategoria['nombreCategoria'], array("class"=>"form-horizontal")); ?>
<br/>
<div class="container">
	<div class=" box box-primary col-md-12">
		<h1>Editar un Tema</h1>
		<br/>
		<div class="form-group">
			<label for="nombreTema" class="col-md-2 control-label">Nombre del Tema</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="nombreTema" id="nombreTema" value="<?php echo($this->input->post('nombreTema') ? $this->input->post('nombreTema') : $tenercategoria['nombreTema']); ?>">
				<span class="text-danger"><?php echo form_error('nombreTema');?></span>
			</div>
		</div>
		<div class="form-group">
			<label for="descripcion" class="col-md-2 control-label">Descripcion</label>
			<div class="col-md-8">
				<textarea name="descripcion" class="form-control" id="descripcion" ><?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $tema['descripcion']); ?>
				</textarea>
				<span class="text-danger"><?php echo form_error('descripcion');?></span>
			</div>
		</div>
		<div class="form-group">
			<label for="categoria" class="col-md-2 control-label">Categorias</label>
			<div class="col-md-8">
				<?php
        		    foreach ($categorias as $unaCat) {
            		    $cats[$unaCat["nombre"]]=$unaCat["nombre"];
            		}
        		    echo form_dropdown('categoria', $cats, $tenercategoria['nombreCategoria'], "class=form-control");
            	?>
			</div>
		</div>
		<div class="form-group col-md-12">
			<div class="col-sm-offset-2 col-sm-8">
				<button type="submit" class="btn btn-success">Actualizar</button>
			</div>
		</div>
		<br/>
		<?php 
			if(isset($mensaje)){
				echo $mensaje;
			}
			 echo form_close();
		?>
	</div>
</div>
