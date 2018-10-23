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
			<?php
			$fecha=(getdate()["year"])."-".(getdate()["mon"])."-".(getdate()["mday"]);
			$hora=(getdate()["hours"]).":".(getdate()["minutes"]).":".(getdate()["seconds"]);
			

			 echo form_open('tenerusuario/add','',array('fecha'=>$fecha,'hora'=>$hora,'nombreUsuario'=>$u['nombreUsuario'],'nombreEstadoUsuario'=>"baja")); ?>
		 <button type="submit" class="btn btn-danger">Delete</button>
		 <?php echo form_close(); ?>
        </td>
    </tr>
	<?php }?>
	</tbody>
</table>
