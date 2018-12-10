<div class="pull-right">
	<a href="<?php echo site_url('recurso/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		
		<th>Titulo</th>
		<th>Descripcion</th>
		<th>NombreUsuario</th>
		<th>NombreTema</th>
		<th>Estado</th>
		<th>Actions</th>
    </tr>
	<?php foreach($recurso as $r){ ?>
    <tr>
		
		<td><?php echo $r['titulo']; ?></td>
		<td><?php echo $r['descripcion']; ?></td>
		<td><?php echo $r['nombreUsuario']; ?></td>
		<td><?php echo $r['nombreTema']; ?></td>
		<td><?php echo $r['nombreEstadoRecurso']; ?></td>
		<td>
            <a href="<?php echo site_url('recurso/edit/'.$r['idRecurso']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('recurso/remove/'.$r['idRecurso']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
