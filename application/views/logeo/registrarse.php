<div class="col-md-12">
    <div class="register-box-body" id="registro">
		<h1><b>Registro Usuario</b></h1><br/>
  		<form id="formulario" method="post" action="registro" onsubmit="return validarRegistro();">
			<?php 
			if(isset($mensaje)){
				echo $mensaje;
			}
			?> 
			<div class="row">
				<div class="col-md-6">
  					<div class="form-group has-feedback">
						<input type="text" class="form-control" id="nombre" placeholder="Nombre/s (*)" name="nombre" minlength="3" maxlength="25" >
    		    		<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" id="apellido" placeholder="Apellido/s (*)" name="apellido" minlength="4" maxlength="30" >
    		    		<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
  					<div class="form-group has-feedback">
						<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" minlength="7" maxlength="12" name="dni">
    					<span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" id="estudio" minlength="4" maxlength="40" placeholder="Terciario o Universidad (*)" name="estudio">
    		    		<span class="glyphicon glyphicon-book form-control-feedback"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
  					<div class="form-group has-feedback">
					  	<input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario (*)" name="nombreUsuario" minlength="6" maxlength="15" >
    		    		<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group has-feedback">
						<input type="email" class="form-control" id="email" placeholder="Correo Electronico (*)" name="email" minlength="10" maxlength="40" >
    	    			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group has-feedback">
						<input type="password" class="form-control" id="clave" placeholder="Ingrese Contraseña (*)" name="clave" minlength="8" maxlength="15" >
        				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
     				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group has-feedback">
						<input type="password" class="form-control" id="clave2" placeholder="Reingrese Contraseña (*)" name="clave2" minlength="8" maxlength="15" >
        				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      				</div>
				</div>
			</div>
     		<div class="row">
    			<div class="box-footer">
					<input type="submit" class="btn btn-success" value="Enviar">
        		</div> <!-- /.box-footer -->
        	</div> <!-- /.row -->
    	</form>
	</div> <!-- /.form-box -->
</div><!-- /.register-box -->
