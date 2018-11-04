<?php 
include_once "application/controllers/login.php";
$sesion=new Login();
if ($_SESSION["iniciada"]) {
 $estActual=$this->Tenerusuario_model->get_tenerusuario($usuario["nombreUsuario"]);
 $rolActual=$this->Tienerol_model->get_tienerol($usuario["nombreUsuario"]);
 if(isset($mensaje)){
	 echo $mensaje;
 }
echo form_open('usuario/edit/'.$usuario['nombreUsuario'], array("class"=>"form-horizontal"),array("rolActual"=>$rolActual["nombreRol"],"estadoActual"=>$estActual["nombreEstadoUsuario"])); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">
			<div class="form-group">
				<label for="nombreUsuario">nombreUsuario</label>
				<input disabled type="text" name="nombreUsuario" class="form-control" id="nombreUsuario" value="
					<?php echo($this->input->post('nombreUsuario') ? $this->input->post('nombreUsuario') : $usuario['nombreUsuario']); ?>">
			</div>
			<div class="form-group">
				<label for="email" class="col-md-4 control-label">Email</label>
				<input disabled type="text" name="email" class="form-control" id="email" value="
					<?php echo($this->input->post('email') ? $this->input->post('email') : $usuario['email']); ?>">
			</div>
			<div class="form-group">
				<label for="nuevoEstado" class="col-md-4 control-label">Estado</label>
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
                         echo $estado["nombre"]; ?>
					</option>
					<?php
                 }

                    ?>
				</select>
			</div>
			<div class="form-group">
				<label for="nuevoRol" class="col-md-4 control-label">Roles</label>
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

			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close();}else{
	echo "Acceso prohibido";
} ?>
