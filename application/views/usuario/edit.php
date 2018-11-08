<?php 
include_once "application/controllers/login.php";
$sesion=new Login();
if ($_SESSION["iniciada"]) {
 $estActual=$this->TenerEstadoUsuario_model->get_tenerEstadoUsuario($usuario["nombreUsuario"]);
 $rolActual=$this->Tienerol_model->get_tienerol($usuario["nombreUsuario"]);
 if(isset($mensaje)){
	 echo $mensaje;
 }
echo form_open('usuario/edit/'.$usuario['nombreUsuario'], array("class"=>"form-horizontal"),array("rolActual"=>$rolActual["nombreRol"],"estadoActual"=>$estActual["nombreEstadoUsuario"])); ?>
<!-- Esta funcion se encarga de editar los estados de los usuario y el rol que tienen o van a tener -->
<div class="container py-3">
	<div class="col-md-6 mx-auto" id="transparencia">
		<div class="container">
 			<h1 class="titulo">Cambiar Estado</h1></br>
			<div class="texto">
				<label for="nombreUsuario">Nombre del Usuario</label>
				<input disabled type="text" name="nombreUsuario" class="form-control" id="nombreUsuario" 
				value="<?php echo($this->input->post('nombreUsuario')? $this->input->post('nombreUsuario') : $usuario['nombreUsuario']);?>">
			</div>
			<div class="texto">
				<label for="email">E-mail</label>
				<input disabled type="text" name="email" class="form-control" id="email" value="
				<?php echo($this->input->post('email') ? $this->input->post('email') : $usuario['email']); ?>">
			</div>
			<div class="texto">
				<label for="nuevoEstado">Estado Actual</label>
				<select name="nuevoEstado" class="form-control" id="nuevoEstado">
					<?php
                 $estados=$this->Estadousuario_model->get_all_estadousuario();
                 foreach ($estados as $estado) {
                     ?>
					<option value="<?php
                         echo $estado["nombre"]; ?>"
						<?php if ($estActual["nombreEstadoUsuario"]==$estado["nombre"]) {
                             echo "selected";
						 } ?>>
						<?php
						echo $estado["nombre"];
						?>
					</option>
					<?php
                 }
                    ?>
				</select>
			</div>
			<div class="texto">
				<label for="nuevoRol">Rol</label>
				<select name="nuevoRol" class="form-control" id="nuevoRol">
					<?php
                 	$roles=$this->Rol_model->get_all_rol();
                 	foreach ($roles as $rol) {
                     ?>
					<option value="<?php
                        echo $rol["nombre"];?>"
						<?php if ($rolActual["nombreRol"]==$rol["nombre"]) {
                            echo "selected";
                        } ?>>
						<?php
                        echo $rol["nombre"];?>
					</option>
					<?php
                 }
                    ?>
				</select>
			</div>
			<div class="form-group" id="boton">
				<button type="submit" class="btn btn-success">Guardar</button>
			</div>
		</div>
	</div>
</div>
<?php echo form_close();}else{
	echo "Acceso prohibido";
} ?>
