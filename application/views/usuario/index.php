<?php if(strtolower($this->session->rol)=="administrador de usuarios"){?>
<table class="table table-striped table-bordered">
    <tr>
		<th>NombreUsuario</th>
	
		<th>Dni</th>
		<th>Apellido</th>
		<th>Nombre</th>
		<th>Estudio</th>
		<th>Email</th>
		<th>Estado</th>
		<th>Actions</th>
    </tr>
	<?php foreach($usuario as $u){if(strtolower($u['nombreRol'])=="profesor"){ ?>
    <tr>
		<td><?php echo $u['nombreUsuario']; ?></td>
		<td><?php echo $u['dni']; ?></td>
		<td><?php echo $u['apellido']; ?></td>
		<td><?php echo $u['nombre']; ?></td>
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
		
            <a href="<?php echo site_url('usuario/edit/'.$u['nombreUsuario']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('usuario/remove/'.$u['nombreUsuario']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
	</div><?php }else{echo "no tiene permisos";}?>
