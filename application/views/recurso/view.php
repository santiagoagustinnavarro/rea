<?php
if (isset($unRecurso[0])) {
    $recurso=$unRecurso[0];

?>
<div class="container py-4">
	<div class="box box-info">
		<div>
			<h1 class="titulo"><?php echo $recurso["titulo"];?></h1><br/>
			<div class="descripcion">
			<h3>Descripcion</h3>
				<p>	<?php echo $recurso["descripcion"];?></p>
			</div>
			<div class="col-md-12">
				<?php foreach($recurso["archivos"] as $unArchivo){?>
				<div class="row">
					<div class="card-footer text-center">
						<a download href=<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"];?> class="btn btn-success"><i class="fa fa-download"></i> Descargar </a><?php echo $unArchivo["nombre"];?>
					</div>
				</div>
				<?php }?>	
			</div>
		</div>
	</div>
</div>
<?php }else{echo "No existe el recurso";} ?>