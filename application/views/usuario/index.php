<div class="pull-right">
	<a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-light " id="tabla">
<thead>
    <tr>
		<th>NombreUsuario</th>
		<th>Clave</th>
		<th>Dni</th>
		<th>Apellido</th>
		<th>Nombre</th>
		<th>Domicilio</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($usuario as $u){ ?>
    <tr>
		<td><?php echo $u['nombreUsuario']; ?></td>
		<td><?php echo $u['clave']; ?></td>
		<td><?php echo $u['dni']; ?></td>
		<td><?php echo $u['apellido']; ?></td>
		<td><?php echo $u['nombre']; ?></td>
		<td><?php echo $u['domicilio']; ?></td>
		<td><?php echo $u['email']; ?></td>
		<td>
            <a href="<?php echo site_url('usuario/edit/'.$u['nombreUsuario']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('usuario/remove/'.$u['nombreUsuario']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php }  ?></tbody>
</table>
