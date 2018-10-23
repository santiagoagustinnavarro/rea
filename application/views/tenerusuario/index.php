<div class="pull-right">
	<a href="<?php echo site_url('tenerusuario/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-light table-bordered">
    <tr>
		<th>Hora</th>
		<th>Fecha</th>
		<th>NombreUsuario</th>
		<th>NombreEstadoUsuario</th>
		<th>FechaFin</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tenerusuario as $t){ ?>
    <tr>
		<td><?php echo $t['hora']; ?></td>
		<td><?php echo $t['fecha']; ?></td>
		<td><?php echo $t['nombreUsuario']; ?></td>
		<td><?php echo $t['nombreEstadoUsuario']; ?></td>
		<td><?php echo $t['fechaFin']; ?></td>
		<td>
		<?php echo form_open("tenerusuario/add",array("method"=>'get'),array("nombreUsuario"=>$t['nombreUsuario'],"fecha"=>$t['fecha'],"hora"=>$t['hora'])); ?>
            <button type="submit" class="btn btn-info btn-xs">Edit</button> 
			<?php echo form_close();?>
			<button href="<?php echo site_url('tenerusuario/remove/'.$t['hora']); ?>" class="btn btn-danger btn-xs">Delete</a>
			
        </td>
    </tr>
	<?php } ?>
</table>
