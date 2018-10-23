<div class="pull-right">
	<a href="<?php echo site_url('rol/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($rol as $r){ ?>
    <tr>
		<td><?php echo $r['nombre']; ?></td>
		<td><?php echo $r['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('rol/edit/'.$r['nombre']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('rol/remove/'.$r['nombre']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
