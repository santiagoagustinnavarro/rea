<div class="pull-right">
	<a href="<?php echo site_url('contienepermiso/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>NombreRol</th>
		<th>AliasPermiso</th>
		<th>Actions</th>
    </tr>
	<?php foreach($contienepermiso as $c){ ?>
    <tr>
		<td><?php echo $c['nombreRol']; ?></td>
		<td><?php echo $c['aliasPermiso']; ?></td>
		<td>
            <a href="<?php echo site_url('contienepermiso/edit/'.$c['nombreRol']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('contienepermiso/remove/'.$c['nombreRol']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
