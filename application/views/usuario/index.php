<?php 

if ($this->session->iniciada && $this->session->rol=="administrador de usuarios") {
    ?>
<table class="table table-light table-responsive-md" id="tabla">
	<thead>
		<tr><th class="titulo" colspan="6"><h3>Lista de Usuarios</h3></th></tr>
		<tr><th colspan="4" id="filtro"><div class="container-fluid">
            	<div class="row">
                	<div class="col-md-5">
                    	<input type="text" class="form-control" id="busqueda" placeholder="Ingresa el usuario">
                	</div>
                	<div class="col-md-5" id="listaEstados">
                	</div>
            	</div>
            	<div class="row">
                	<div  class="col-md-offset-2 col-md-1" id="recomendacion"></div>
            	</div>
        	</div>
		</th></tr>
		<tr>
			<th scope="col">Nombre Usuario</th>
			<th scope="col">Nombre</th>
			<th scope="col">Apellido</th>
			<th scope="col">E-mail</th>
			<th scope="col">Estado</th>
			<th scope="col">Actualizar</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($usuario as $u) {
        $rol=$this->Tienerol_model->get_tienerol($u['nombreUsuario']);
        if (strtolower($rol["nombreRol"])=="profesor") {
            ?>
		<tr>
			<td>
				<?php echo $u['nombreUsuario']; ?>
			</td>
			<td>
				<?php echo $u['nombre']; ?>
			</td>
			<td>
				<?php echo $u['apellido']; ?>
			</td>
			<td>
				<?php echo $u['email']; ?>
			</td>
			<td>
				<?php $estado=$this->TenerEstadoUsuario_model->get_tenerestadousuario($u['nombreUsuario']);
            	if(strtolower($estado["nombreEstadoUsuario"])=="pendiente"){
				echo form_open("usuario/edit/".$u['nombreUsuario'],array("method"=>'post'),array("estadoActual"=>"Pendiente","nuevoEstado"=>"Alta"));?>	<button type="submit" class="btn btn-success"> Dar alta</button> <?php echo form_close();
				}else{
					echo $estado["nombreEstadoUsuario"];
				}?>
                
			</td>
			<td>
				<a href="<?php echo site_url('usuario/edit/' . $u['nombreUsuario']); ?>"
				 class="btn btn-info btn-xs">Editar</a>
			</td>
		</tr>
		<?php
        }
    } ?>
	</tbody>
</table>
<?php
} else {
    echo "Tiene prohibido el acceso";
}
