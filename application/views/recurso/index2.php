<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Recurso Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('recurso/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdRecurso</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th>NombreUsuario</th>
						<th>NombreTema</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($recurso as $r){ ?>
                    <tr>
						<td><?php echo $r['idRecurso']; ?></td>
						<td><?php echo $r['titulo']; ?></td>
						<td><?php echo $r['descripcion']; ?></td>
						<td><?php echo $r['nombreUsuario']; ?></td>
						<td><?php echo $r['nombreTema']; ?></td>
						<td>
                            <a href="<?php echo site_url('recurso/edit/'.$r['idRecurso']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('recurso/remove/'.$r['idRecurso']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
