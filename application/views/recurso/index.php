<div class="box box-info" id="listarRecurso">
	<h1>Lista de Recursos</h1><br/>
<table class="table table-striped table-bordered text-center">
    <tr>
		<th>Titulo</th>
		<th>Descripcion</th>
		<th>Nombre del Usuario</th>
		<th>Nombre del Tema</th>
		<th>Estado</th>
		<th>Actualizar/Eliminar</th>
    </tr>
	<?php foreach($recurso as $r){ ?>
    <tr>
		<td><?php echo $r['titulo']; ?></td>
		<td><?php echo $r['descripcion']; ?></td>
		<td><?php echo $r['nombreUsuario']; ?></td>
		<td><?php echo $r['nombreTema']; ?></td>
		<td><?php echo $r['nombreEstadoRecurso']; ?></td>
		<td>
            <a href="<?php echo site_url('recurso/edit/'.$r['idRecurso']); ?>" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a> 
            <a href="<?php echo site_url('recurso/remove/'.$r['idRecurso']); ?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
	<?php } ?>
</table>
<br/>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
</div>
