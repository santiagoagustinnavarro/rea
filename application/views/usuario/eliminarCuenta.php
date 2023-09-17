<?php
	
    if ($this->session->iniciada) {
?>
<div class="container">
	<br/><br/>
	<div class="col-md-offset-3 col-md-6">
		<?php echo form_open('usuario/eliminarCuenta',array("class"=>"form")); ?>
		<div class="box box-danger" id="eliminar">
			<h2><b> Eliminar Cuenta</b></h2>
			<h4>Esta seguro que desea eliminar su cuenta</h4><br/>
			<div>
				<a href="<?php echo base_url()?>usuario/eliminarCuenta/<?php echo $_SESSION["nombreUsuario"];?>">
					<button type="button" name="si" id="si" class="btn btn-success">Si</button>
				</a>
				<a href="<?php echo base_url()?>usuario/editarPerfil">
					<button type="button" name="no" id="no" class="btn btn-danger">No</button>
				</a>
			</div> <!-- Cierre del clase id boton -->
			<br/>
		</div> <!-- Cierre del box -->
			<?php echo form_close(); ?>
	</div> <!-- Cierre del col -->
</div> <!-- Cierre del container final -->
<?php
	}
?>
