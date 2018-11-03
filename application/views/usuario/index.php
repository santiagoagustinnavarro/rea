<?php include_once "application/controllers/login.php";
$sesion=new Login();
if ($_SESSION["iniciada"] && $_SESSION["rol"]=="adminuser") {
    ?>
<table class="table table-light table-responsive" id="tabla">
	<thead>
		<tr id="table">
			<th scope="col">Nombre Usuario</th>
			<th scope="col">Estado</th>
			<th scope="col">Apellido</th>
			<th scope="col">Nombre</th>
			<th scope="col">Domicilio</th>
			<th scope="col">E-mail</th>
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
				<?php
                
                echo $u['nombreUsuario']; ?>
			</td>
			<td>
				<?php $estado=$this->Tenerusuario_model->get_tenerusuario($u['nombreUsuario']);
            echo $estado["nombreEstadoUsuario"]
                ?>
			</td>
			<td>
				<?php echo $u['apellido']; ?>
			</td>
			<td>
				<?php echo $u['nombre']; ?>
			</td>
			<td>
				<?php echo $u['domicilio']; ?>
			</td>
			<td>
				<?php echo $u['email']; ?>
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
