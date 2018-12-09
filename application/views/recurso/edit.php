<?php  echo form_open('recurso/edit/'.$recurso['idRecurso'], array("class"=>"form-horizontal","method"=>"post"),array("nombreUsuario"=>$recurso["nombreUsuario"],"email"=>$recurso["email"])); ?>


<div class="form-group">
	<label for="recurso" class="col-md-4 control-label">recurso</label>
	<div class="col-md-4">
<strong name="recurso" id="recurso" class="form-control">
	<?php
	   echo $recurso["titulo"];
	  
	   
    ?>
	</strong>
	</div>
</div>
<div class="form-group">
	<label for="recurso" class="col-md-4 control-label">Usuario</label>
	<div class="col-md-4">
<strong name="recurso" id="recurso" class="form-control">
	<?php
	   echo $recurso["nombreUsuario"];
	  
	   
    ?>
	</strong>
	</div>
</div>
<div class="form-group">
	<label for="estados" class="col-md-4 control-label">Elija un estado</label>
	<div class="col-md-4">

		<?php
            $estados=$this->Estadorecurso_model->get_all_estadorecurso();
            
            foreach ($estados as $unEstado) {
                $arrEstado[$unEstado["nombre"]]= $unEstado["nombre"];
            }
          
            
            echo form_dropdown('estados', $arrEstado, array($recurso['nombreEstadoRecurso']), "class=form-control");

        ?>



	</div>
</div>


<?php
echo form_submit("enviar","Actualizar",["class"=>"btn btn-success"]);
 echo form_close();

?>
