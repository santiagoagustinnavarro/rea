<br/>
<div class="col-md-offset-1 col-md-10">
	<div class="container box box-info">
		<h1>Agregar Secciones</h1>
		<h3>Seleccione una Categoria</h3>
		<div class="form-group col-md-offset-2 col-md-8">
			<select class="form-control text-center" id="categoria" name="categoria">
				<option value="" selected>Agregar Categoria</option>
				<?php 
					foreach ($categorias as $cat) {
				?>
				<option value="<?php echo $cat["nombre"]; ?>"><?php echo $cat["nombre"];
				}?>
				</option>
			</select>
			<br/>
			<h3>Seleccione un Tema</h3>
			<select class="form-control text-center" id="tema" name="tema">
				<option value="" selected>Agregar Tema</option>
				<?php 
					foreach ($temas as $tema) {
				?>
				<option value="<?php echo $tema["nombre"]; ?>"><?php echo $tema["nombre"];?>
				</option>
				<?php
				}
				?>
			</select>
			<br/>
		</div>
	</div>
</div>
