<div class="pull-right">
	<a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>NombreTema</th>
		<th>NombreCategoria</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tenercategoria as $t){ ?>
    <tr>
		<td><?php echo $t['nombreTema']; ?></td>
		<td><?php echo $t['nombreCategoria']; ?></td>
		<td>
            <a href="<?php echo site_url('tema/edit/'.$t['nombreTema'].'/'.$t['nombreCategoria']); ?>" class="btn btn-info btn-xs">Edit</a> 
           
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
