<?php
	
    if ($this->session->iniciada) {
?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container-fluid">
			<?php echo form_open('usuario/eliminarCuenta',array("class"=>"form")); ?>
			<div class="alert alert-danger" id="eliminar">
				<h2><b> Eliminar Cuenta</b></h2>
				<h4>Esta seguro que desea eliminar su cuenta</h4></br>
				<div id="boton">
					<a href="<?php echo base_url()?>usuario/eliminarCuenta/<?php echo $_SESSION["nombreUsuario"];?>">
						<button type="button" name="si" id="si" class="btn btn-success">Si</button>
					</a>
					<a href="<?php echo base_url()?>inicio">
						<button type="button" name="no" id="no" class="btn btn-danger">No</button>
					</a>
				</div> <!-- Cierre del clase id boton -->
			</div> <!-- Cierre del alert -->
			<?php echo form_close(); ?>
		</div> <!-- Cierre del container-fluid -->
	</div> <!-- Cierre de la clases col-md-6 -->
</div> <!-- Cierre del container final -->
<?php
	}
?>
