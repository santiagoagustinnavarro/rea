<div class="box box-info">
<h1>Listado de Categorias</h1><br/>
<table class="table table-striped table-bordered text-center">
    <tr>
		<th>Nombre de la Categoria</th>
		<th>Descripcion</th>
		<th>Actualizar</th>
    </tr>
	<?php foreach($categoria as $c){ ?>
    <tr>
		<td><?php echo $c['nombre']; ?></td>
		<td><?php echo $c['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('categoria/edit/'.$c['nombre']); ?>" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a>         
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
<br/>
</div>
</div>
