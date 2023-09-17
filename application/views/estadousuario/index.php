<div class="pull-right">
	<a href="<?php echo site_url('estadousuario/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($estadousuario as $e){ ?>
    <tr>
		<td><?php echo $e['nombre']; ?></td>
		<td><?php echo $e['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('estadousuario/edit/'.$e['nombre']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('estadousuario/remove/'.$e['nombre']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
