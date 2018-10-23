<div class="pull-right">
	<a href="<?php echo site_url('tienerol/add'); ?>" class="btn btn-success">Agregar</a> 
</div>
<table class="table table-striped table-bordered">
    <tr id="tabla">
		<th>Nombre Usuario</th>
		<th>Nombre Rol</th>
		<th>Fecha Inicio</th>
		<th>Fecha Fin</th>
		<th>Actualizar</th>
    </tr>
	<?php foreach($tienerol as $t){ ?>
    <tr>
		<td><?php echo $t['nombreUsuario']; ?></td>
		<td><?php echo $t['nombreRol']; ?></td>
		<td><?php echo $t['fechaInicio']; ?></td>
		<td><?php echo $t['fechaFin']; ?></td>
		<td>
            <a href="<?php echo site_url('tienerol/edit/'.$t['nombreUsuario']); ?>" class="btn btn-info btn-xs">Actualizar</a> 
        </td>
    </tr>
	<?php } ?>
</table>
