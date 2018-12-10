<?php if(strtolower($this->session->rol)=="administrador de usuarios"){?>
<br/>
<div class="box box-info" id="listarUsuario">
	<h1>Lista de Usuarios</h1><br/>
<table class="table table-striped table-bordered text-center">
    <tr>
		<th>Nombre de Usuario</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Terciario/Universidad</th>
		<th>Email</th>
		<th>Estado</th>
		<th>Actualizar/Eliminar</th>
    </tr>
	<?php foreach($usuario as $u){if(strtolower($u['nombreRol'])=="profesor"){ ?>
    <tr>
		<td><?php echo $u['nombreUsuario']; ?></td>
		<td><?php echo $u['nombre']; ?></td>
		<td><?php echo $u['apellido']; ?></td>
		<td><?php echo $u['estudio']; ?></td>	
		<td><?php echo $u['email']; ?></td>
		<td><?php 
		if(strtolower($u['nombreEstadoUsuario'])=="pendiente"){
			echo form_open('usuario/edit/'.$u['nombreUsuario'],array("method"=>'post'),array("estados"=>"Alta","roles"=>$u['nombreRol'],'email'=>$u["email"]));
			echo form_submit("envio","Dar alta",array("class"=>"btn btn-success"));
			echo form_close();
		}else{
			echo $u['nombreEstadoUsuario'];
		}
		?>
		</td>
		<td>
            <a href="<?php echo site_url('usuario/edit/'.$u['nombreUsuario']); ?>" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a> 
            <a href="<?php echo site_url('usuario/remove/'.$u['nombreUsuario']); ?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
	<?php } } ?>
</table>
<br/>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
	<?php 
	}else{
		echo "No tiene permisos";
	}
	?>
</div>
