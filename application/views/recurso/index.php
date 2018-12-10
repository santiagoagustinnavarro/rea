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
		<th>Validado</th>
		<th>Actions</th>
    </tr>
	<?php foreach($recurso as $r){ ?>
    <tr>
		
		<td><?php echo $r['titulo']; ?></td>
		<td><?php echo $r['descripcion']; ?></td>
		<td><?php echo $r['nombreUsuario']; ?></td>
		<td><?php echo $r['nombreTema']; ?></td>
		<td><?php if(strtolower($r['nombreEstadoRecurso'])!="alta"){
			
			echo form_open('recurso/edit/'.$r['idRecurso'],array("method"=>'post'),array("estados"=>"Alta",'email'=>$r["email"]));
			echo form_submit("envio","Dar alta",array("class"=>"btn btn-success"));
			echo form_close();
			
		}else{
			echo $r['nombreEstadoRecurso'];
		}?></td>
		<td><?php if(($r['validado'])==0){
		
		
			echo form_open('recurso/edit/'.$r['idRecurso'],array("method"=>'post'),array("validado"=>1,'email'=>$r["email"]));
			echo form_submit("envio","Validar",array("class"=>"btn btn-success"));
			echo form_close();
		
		}else{
			?><i class="fa fa-check"></i><?php
		}?></td>
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
