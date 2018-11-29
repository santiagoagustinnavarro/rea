<div class="container-fluid">
	<div class="container py-3">
		<div class="offset-md-3 col-md-6" id="transparencia">
			<h1 class="titulo">Contacto</h1></br>
			<form id="contacto" action="contacto" method="post" onsubmit="return validarContacto();">
				<div class="form-group">
					<label class="label" for="email"><i class="fa fa-envelope"></i> Correo Electronico</label>
					<input type="email" class="form-control" id="email" placeholder="Correo@ejemplo.com" name="email" minlength="10" maxlength="40" required>
				</div>
				<div class="form-group">
					<label class="label" for="mensaje"><i class="fa fa-pencil-square-o"></i> Escribir Mensaje</label>
					<textarea class="form-control" name="mensaje" id="mensaje" rows="5" maxsize="10" placeholder="Ingrese el motivo por el cual desea contactarse ..."></textarea>
				</div>
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
