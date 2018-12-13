<div class="box box-info">
<h1>Listado de Temas</h1><br/>
<table class="table table-striped table-bordered text-center">
    <tr>
		<th>Nombre del Tema</th>
		<th>Nombre de la Categoria</th>
		<th>Actualizar</th>
    </tr>
	<?php foreach($tenercategoria as $t){ ?>
    <tr>
		<td><?php echo $t['nombreTema']; ?></td>
		<td><?php echo $t['nombreCategoria']; ?></td>
		<td>
            <a href="<?php echo site_url('tema/edit/'.$t['nombreTema'].'/'.$t['nombreCategoria']); ?>" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a>  
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
<br/>
</div>
