<div class="container-fluid">
	<div class="container py-3">
		<div class="offset-md-2 col-md-8" id="transparencia">
			<h1>Subir Recurso</h1></br>
			<?php
			if(isset($mensaje)){
				echo $mensaje;
			} ?>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicEdit.js"></script> <script type="text/javascript">
				//<![CDATA[
        		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  				//]]>
			</script>
			<form id="contacto" action="subirrecurso" method="post" enctype="multipart/form-data">
				<div class="form-group offset-md-1 col-md-10">
					<label class="label" for="nombre"><i class="fa fa-file-text-o"></i> Nombre del Recurso</label>
					<input type="text" class="form-control" id="nombre" placeholder="Ingrese el Nombre" name="nombre" minlength="4" maxlength="30">
				</div>
				<div class="form-group offset-md-1 col-md-10">
					<label class="label" for="categoria"><i class="fa fa-caret-down"></i> Seleccione una Categoria</label>
					<select class="form-control text-center" id="tema" name="tema">
						<option value="" selected>Elija una opcion</option>
							<?php 
								foreach ($categoria as $unCat) {
    						?>
							<option value="<?php echo $unCat["nombre"]; ?>"><?php echo $unCat["nombre"];
							}?>
						</option>
					</select>
					<?php
						
					?>
				</div>
				<div class="form-group">
					<label class="label" for="archivo"><i class="fa fa-upload"></i> Seleccione Archivo/s</label></br>
					<input type="file" id="archivo[]" name="archivo[]" multiple="">
				</div>
				<div class="form-group">
					<label class="label" for="check"><i class="fa fa-check-square-o"></i> Seleccione el año de Enseñanza</label>
					<div class="col-md-8">
						<ul class="list-unstyled mb-0">
						<?php
                    		foreach ($niveles as $unNivel) {
                		?>
						<li><input type="checkbox" id="<?php echo $unNivel["nombre"]; ?>"
							value="<?php echo $unNivel["nombre"]; ?>"><span>
							<?php echo $unNivel["nombre"]; ?></span></li>
							<?php
								}
							?>
						</ul>
					</div> <!-- cierra el col-md-6 -->
				</div>
				<div class="form-group offset-md-1 col-md-10">
					<label class="label" for="textarea"><i class="fa fa-pencil-square-o"></i> Descripcion</label>
					<div class="bg-light">
						<textarea class="form-control" name="textarea" id="textarea" rows="8" value="Este recurso me parecio muy interesante, muchas gracias por compartirlo"></textarea>
					</div>
				</div>
				<div class="form-group" id="boton">
					<button type="submit" name="form" id="form" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
