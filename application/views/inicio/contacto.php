<!--VISTA DE CONTACTO -->
<div class="container">
	<div class="col-md-offset-2 col-md-8">
		<div class="box box-info" id="contacto">
			<h1><b></b>Contacto</h1><br/>
    	    <div class="box-header">
        	    <i class="fa fa-envelope"></i>
        		<h3 class="box-title">Envienos un Email</h3>
    		</div> <!-- cierre del box-header -->
        	<div class="register-box-body">
				<form action="contacto" method="post" onsubmit="return validarContacto();">
            		<div class="form-group">
						<input type="email" class="form-control" id="email" placeholder="Correo Electronico (*)" name="email" minlength="10" maxlength="30" required>
    	        	</div> <!-- cierre del form-group de email -->
        	    	<div class="form-group">
        				<input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
            		</div> <!-- cierre del form-group de asunto -->
            		<div>
            			<textarea class="textarea" name="mensaje" id="mensaje" placeholder="Ingrese el motivo por el cual desea contactarse ..."
            				style="width: 100%; height: 125px;">
						</textarea>
					</div> <!-- cierre del form-group de textarea -->
					<div class="box-footer">
      					<input type="submit" class="btn btn-success" value="Enviar">
        			</div> <!-- cierre del div box-footer -->
        	    </form> <!-- cierre del form -->
			</div> <!-- cierre de la clase register-box-body -->
		</div> <!-- cierre del id contacto -->
	</div>
</div>
