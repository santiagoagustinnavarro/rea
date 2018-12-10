<div class="container">
	<div class="col-md-offset-1 col-md-10">
		<div class="box box-info" id="subirRecurso">
			<h1>Subir Recurso</h1><br/>
			<?php
			if(isset($mensaje)){
				echo $mensaje;
			} 
			?>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicEdit.js"></script> <script type="text/javascript">
				//<![CDATA[
        		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  				//]]>
			</script>
			<form id="contacto" action="subirrecurso" onsubmit="return subirrecurso($(this));" method="post" enctype="multipart/form-data">
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-file-text-o"></i> Nombre del Recurso</h4>
					<input type="text" class="form-control" id="nombre" placeholder="Ingrese el Nombre" name="nombre" minlength="4" maxlength="30">
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-caret-down"></i> Seleccione una Categoria</h4>
					<select class="form-control text-center" id="categoria" name="categoria">
					<option value="" selected>Elija una categoria</option>
						<?php 
							foreach ($categoria as $unCat) {
						?>
						<option value="<?php echo $unCat["nombre"]; ?>"><?php echo $unCat["nombre"];
						}?>
						</option>
					</select>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-caret-down"></i> Seleccione un Tema</h4>
					<select class="form-control text-center" id="tema" name="tema">
						<option value="" selected>Elija un tema</option>
						<?php 
							foreach ($tema as $unTema) {
						?>
						<option value="<?php echo $unTema["nombre"]; ?>"><?php echo $unTema["nombre"];?>
						</option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-upload"></i> Seleccione Archivo/s</h4><br/>
					<div class="form-control">
						<input type="file" id="archivo[]" name="archivo[]" multiple="">
					</div>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-check-square-o"></i> Seleccione el año de Enseñanza</h4>
					<ul class="list-unstyled mb-0 text-center">
						<?php             
                            foreach ($niveles as $unNivel) {
                        ?>
						<li><input type="checkbox" name="niveles[]" id="niveles[]"
							value="<?php echo $unNivel["nombre"]; ?>"><span>
							<?php echo $unNivel["nombre"]; ?></span>
						</li>
						<?php
						}
						?>
					</ul>
				</div>
				<div class="form-group col-md-offset-1 col-md-10">
					<h4><i class="fa fa-pencil-square-o"></i> Descripcion</h4>
					<div>
						<textarea class="form-control" name="textarea" id="textarea" rows="8"></textarea>
					</div>
				</div>
				<br/>
				<div class="form-group pull-right">
					<button type="submit" name="form" id="form" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div> <!-- Cierre de la clase box box-info -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre de la clase container -->
