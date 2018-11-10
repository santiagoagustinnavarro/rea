<div class="container-fluid">
	<div class="container py-3">
		<div class="offset-md-3 col-md-6" id="transparencia">
			<h1 class="titulo">Subir Archivo</h1></br>
			<form id="contacto">
				<div class="form-group">
					<label class="label" for="nombre"><i class="fa fa-file-text-o"></i> Nombre del Recurso</label>
					<input type="text" class="form-control" id="nombre" placeholder="Ingrese el Nombre" name="nombre" minlength="4" maxlength="30">
				</div>
				<div class="form-group">
					<label class="label" for="archivo"><i class="fa fa-upload"></i> Seleccione Archivo/s</label>
					<input type="file" id="archivo" name="archivo">
				</div>
				<div class="form-group">
					<label class="label" for="descripcion"><i class="fa fa-pencil-square-o"></i> Descripcion</label>
					<textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="Una descripcion del recurso ..."></textarea>
				</div>
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
