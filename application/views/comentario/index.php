<div class="pull-right">
	<a href="<?php echo site_url('comentario/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdComentario</th>
		<th>IdRecurso</th>
		<th>NombreUsuario</th>
		<th>Descripcion</th>
		<th>Fecha</th>
		<th>Hora</th>
		<th>Actions</th>
    </tr>
	<?php foreach($comentario as $c){ ?>
    <tr>
		<td><?php echo $c['idComentario']; ?></td>
		<td><?php echo $c['idRecurso']; ?></td>
		<td><?php echo $c['nombreUsuario']; ?></td>
		<td><?php echo $c['descripcion']; ?></td>
		<td><?php echo $c['fecha']; ?></td>
		<td><?php echo $c['hora']; ?></td>
		<td>
            <a href="<?php echo site_url('comentario/edit/'.$c['idComentario']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('comentario/remove/'.$c['idComentario']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
