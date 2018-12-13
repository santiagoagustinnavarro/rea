<div class="pull-right">
	<a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($categoria as $c){ ?>
    <tr>
		<td><?php echo $c['nombre']; ?></td>
		<td><?php echo $c['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('categoria/edit/'.$c['nombre']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('categoria/remove/'.$c['nombre']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
