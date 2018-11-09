<?php
	include_once "application/controllers/usuario.php";
	$sesion=new Login();
    if ($_SESSION["iniciada"]) {
?>
<div class="col-md-6 mx-auto">
<div class="container-fluid">
	<div class="container py-5">
		<div class="alert alert-danger" id="eliminar">
			<h2 class="titulo"><b> Eliminar Cuenta</b></h2>
			<h4 class="titulo">Esta seguro que desea eliminar su cuenta</h4></br>
			<div class="form-group" id="boton">
				<button type="submit" name="si" id="si" class="btn btn-success">SI</button>
				<button type="submit" name="no" id="no" class="btn btn-danger">NO</button>
			</div>
		</div>
	</div>
</div>
</div>
<?php
	}
?>
