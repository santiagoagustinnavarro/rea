<?php
if (isset($unRecurso[0])) {
    $recurso=$unRecurso[0];
?>
<div class="container">
	<br/>
	<div class="box box-info col-md-10">
		<h1 class="titulo"><?php echo $recurso["titulo"];?></h1><br/>
		<div class="descripcion">
			<h3>Descripcion</h3>
			<p>	<?php echo $recurso["descripcion"];?></p>
		</div>
		<br/>
		<div class="row">
			<?php 
			foreach($recurso["archivos"] as $unArchivo){
			?>
			<div class="col-md-3">
				<div class="card-footer text-center">
					<a download href=<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"];?> class="btn btn-success"><i class="fa fa-download"></i> Descargar </a><?php echo $unArchivo["nombre"];?>
				</div>
			</div>
			<?php 
			}
			?>	
		</div>
		<br/>
	</div>
</div>
<?php 
}else{
	echo "No existe el recurso";
} 
?>
