<?php if($this->session->iniciada){ redirect("inicio");} ?> 
<div class="login-box">
	<div id="registro">
		<label><h4>Si no esta registrado ingrese aqui</h4></label><br/>
		<a href="<?php echo base_url(); ?>registro">
			<button class="btn btn-primary">Registrarse</button>
		</a>
	</div> <!-- Cierre del  id registro-->
	<br/>
    <div class="login-box-body">
		<h1><b>Log In</b></h1>
		<?php 
			echo form_open("login/", array('id'=>'formulario',"onsubmit"=>"return validarIngreso();",'method'=>'post'));
		?> 
		<?php
			if(isset($mensaje)){
				echo $mensaje;
			}
		?>
      	<div class="form-group has-feedback">
		  	<input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre Usuario" minlength="6" maxlength="15">
        	<span class="glyphicon glyphicon-user form-control-feedback"></span>
      	</div>
      	<div class="form-group has-feedback">
		    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" minlength="8" maxlength="15">
        	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="form-group">
			<a href="<?php echo base_url();?>recuperarcuenta">¿Olvido su contraseña?</a>
		</div>
      	<div class="row">
		  	<div class="box-footer">
          		<input type="submit" class="btn btn-primary" value="Ingresar">
        	</div> <!-- /.box-footer -->
		</div> <!-- /.row -->
		<?php	
			echo form_close();
		?> 	
  	</div><!-- /.login-box-body -->
</div>
