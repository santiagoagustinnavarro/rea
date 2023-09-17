<?php
	if ($this->session->iniciada) {
?>
<div class="box box-primary">
	<br/>
	<div class="col-md-1">
		<a href="<?php echo base_url()."usuario/eliminarCuenta"?>">
			<button type="button" class="btn btn-danger">Eliminar Cuenta</button>
		</a>
	</div>
	<div class="container">
  		<form id="formulario" method="post" action="editarPerfil" value="<?php echo $_SESSION["nombreUsuario"];?>" enctype="multipart/form-data" onsubmit="return validarPerfil();">
		  	<h1>Editar Perfil</h1>
			<div class="row">
			<div class="col-md-12">
			<?php
				if(isset($mensaje)){
					echo $mensaje;
				}	
			?>
			</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h2>Foto de Perfil</h2>
					<br/>
					<?php  
       					if ($_SESSION["foto"]=="") { ?>
          					<img style="border:2px solid #eaeaea;border-radius:50%;" src="<?php echo base_url()?>assets/upload/fotoPerfil/user-default.png" width="128">
       				<?php
       					}else { 
       				?>
	    				<img style="border:2px solid #eaeaea;border-radius:50%;" src="<?php echo base_url()?>assets/upload/fotoPerfil/<?php echo $this->session->nombreUsuario."/".$_SESSION['foto']; ?>" width="128">
       				<?php
          			}
       				?>
					   <div class="form-group"> <br/>
						<div class="form-control">
							<input type="file" name="foto" id="foto">
						</div>
					</div>
					<h2>Actualizar Contraseña</h2>
					<br/>
					<div class="form-group">
					
  						<input type="password" required class="form-control" id="clave" placeholder="Contraseña Actual" name="clave" minlength="8" maxlength="15">
					</div>
					<div class="form-group">
      					<input type="password" class="form-control" id="clave1" placeholder="Nueva Contraseña" name="clave1" minlength="8" maxlength="15">
					</div>
					<div class="form-group">
    					<input type="password" class="form-control" id="clave2" placeholder="Confirmar Contraseña" name="clave2" minlength="8" maxlength="15">
					</div>
					<br/>
					<div class="col-md-12">
						<div class="row">	
							<div class="form-group offset-md-3 col-md-4">
								<a href="<?php echo base_url()?>inicio">
									<button type="button" name="no" id="no" class="btn btn-danger">Cancelar</button>
								</a>
							</div>
							<div class="form-group col-md-4">
								<button type="submit" class="btn btn-success">Actualizar</button>
							</div>
							<div class="form-group col-md-4">
								<a>
									<button type="reset" class="btn btn-primary">Limpiar</button>
								</a>
							</div>
						</div>	
					</div>
				</div>
				<div class="col-md-6">
					<h2>Datos Personales</h2>
		  			<br/>
			  		<div class="form-group">
  	  	  				<input disabled type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" name="nombreUsuario" minlength="6" maxlength="15" 
						value="<?php echo $_SESSION["nombreUsuario"];?>" required >		
					</div>
    				<div class="form-group">
						<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" minlength="3" maxlength="25"
						value="<?php echo $_SESSION["nombre"];?>" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" minlength="4" maxlength="30"
						value="<?php echo $_SESSION["apellido"];?>" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="estudio" placeholder="Terciario o Universidad" minlength="6" maxlength="35"
						value="<?php echo $_SESSION["estudio"];?>" name="estudio">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" minlength="7" maxlength="12"
						value="<?php echo $_SESSION["dni"];?>" name="dni">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" placeholder="Correo Electronico" name="email" minlength="10" maxlength="40"
						value="<?php echo $_SESSION["email"];?>" required>
					</div>
				</div>		
			</div>	
		</form>
	</div> <!-- Cierre del container -->
</div> <!-- Cierre del container final -->
<?php
}
?>
