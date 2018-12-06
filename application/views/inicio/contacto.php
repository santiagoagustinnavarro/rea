<div class="col-md-8">
	<div class="box box-info" id="contacto">
		<div class="box">
		<h1><b></b>Contacto</h1><br/>
        <div class="box-header">
            <i class="fa fa-envelope"></i>
        	<h3 class="box-title">Envienos un Email</h3>
    	</div>
        <div class="register-box-body">
			<form action="contacto" method="post" onsubmit="return validarContacto();">
            	<div class="form-group">
					<input type="email" class="form-control" id="email" placeholder="Correo Electronico (*)" name="email" minlength="10" maxlength="30" required>
            	</div>
            	<div class="form-group">
        			<input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
            	</div>
            	<div>
            		<textarea class="textarea" name="mensaje" id="mensaje" placeholder="Ingrese el motivo por el cual desea contactarse ..."
            			style="width: 100%; height: 125px;">
					</textarea>
				</div>
				<div class="box-footer">
      				<input type="submit" class="btn btn-success" value="Enviar">
        		</div>
            </form>
		</div>
		</div>
	</div>
</div>
