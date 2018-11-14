<?php include_once "application/controllers/login.php";
$sesion=new Login();
if ($_SESSION["iniciada"] && $_SESSION["rol"]=="administrador de usuarios") {
    ?>
<table class="table table-light table-responsive-md" id="tabla">
	<thead>
		<tr><th class="titulo" colspan="6"><h3>Lista de Usuarios</h3></th></tr>
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
				?>	<button class="btn btn-success"> Dar alta</button> <?php 
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
