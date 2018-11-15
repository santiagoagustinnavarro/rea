<div class="container-fluid">
	<div class="container py-3">
		<div class="offset-md-3 col-md-6" id="transparencia">
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
			<form id="contacto" action="subirrecurso" method="post">
				<div class="form-group">
					<label class="label" for="nombre"><i class="fa fa-file-text-o"></i> Nombre del Recurso</label>
					<input type="text" class="form-control" id="nombre" placeholder="Ingrese el Nombre" name="nombre" minlength="4" maxlength="30">
				</div>
				<div class="form-group">
					<label class="label" for="archivo"><i class="fa fa-upload"></i> Seleccione Archivo/s</label>
					<input type="file" id="archivo[]" name="archivo[]" multiple="">
				</div>
				<div class="form-group">
					<label class="label" for="textarea"><i class="fa fa-pencil-square-o"></i> Descripcion</label>
					<div class="bg-light">
						<textarea class="form-control" name="textarea" id="textarea" rows="5" maxsize="10"></textarea>
					</div>
				</div>
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
