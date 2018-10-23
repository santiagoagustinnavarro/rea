<div class="pull-right">
	<a href="<?php echo site_url('tienerol/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>NombreUsuario</th>
		<th>NombreRol</th>
		<th>FechaInicio</th>
		<th>FechaFin</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tienerol as $t){ ?>
    <tr>
		<td><?php echo $t['nombreUsuario']; ?></td>
		<td><?php echo $t['nombreRol']; ?></td>
		<td><?php echo $t['fechaInicio']; ?></td>
		<td><?php echo $t['fechaFin']; ?></td>
		<td>
            <a href="<?php echo site_url('tienerol/edit/'.$t['nombreUsuario']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('tienerol/remove/'.$t['nombreUsuario']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
