<br/>
<div class="box box-primary" id="listarRecurso">
	<h1>Lista de Recursos</h1><br/>
<table class="table table-striped table-bordered text-center">
    <tr>
		<th>Titulo</th>
		<th>Nombre del Usuario</th>
		<th>Nombre del Tema</th>
		<th>Estado</th>
		<th>Validar</th>
		<th>Actualizar/Ver Recurso</th>
    </tr>
	<?php foreach($recurso as $r){ ?>
    <tr>
		<td><?php echo $r['titulo']; ?></td>
		<td><?php echo $r['nombreUsuario']; ?></td>
		<td><?php echo $r['nombreTema']; ?></td>
		<td><?php if(strtolower($r['nombreEstadoRecurso'])!="alta"){
			echo form_open('recurso/edit/'.$r['idRecurso'],array("method"=>'post'),array("estados"=>"Alta",'email'=>$r["email"]));
			echo form_submit("envio","Dar alta",array("class"=>"btn btn-success"));
			echo form_close();
		}else{
			echo ucwords($r['nombreEstadoRecurso']);
		}?></td>
		<td><?php if(($r['validado'])==0){
			echo form_open('recurso/edit/'.$r['idRecurso'],array("method"=>'post'),array("validado"=>1,'email'=>$r["email"]));
			echo form_submit("envio","Validar",array("class"=>"btn btn-success"));
			echo form_close();
		}else{
			?><i class="fa fa-check"></i><?php
		}?></td>
		<td>
            <a href="<?php echo site_url('recurso/edit/'.$r['idRecurso']); ?>" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a> 
            <a href="<?php echo site_url('recurso/view/'.$r['idRecurso']); ?>" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-eye-open"></span></a>
        </td>
    </tr>
	<?php } ?>
</table>
<br/>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
</div>
