<?php 
  if (strtolower($this->session->rol)=="administrador de recursos") {


echo form_open('recurso/edit/'.$recurso['idRecurso'], array("class"=>"form-horizontal","method"=>"post"),array("nombreUsuario"=>$recurso["nombreUsuario"],"email"=>$recurso["email"])); 

?>
<div class="container">
<div class="col-md-12">
	<div class="col-md-offset-2 col-md-8">
		<br/>
		<div class="box box-primary" id="editRec">
			<br/>
			<div class="col-md-1">
				<div class="btn btn-success"><a href="<?php echo base_url();?>recurso"><i class="fa fa-reply boton"></i></a></div>
			</div>
			<h1>Editar Recurso</h1>
			<br/>
			<div class="form-group">
					<label for="recurso" class="col-md-4 control-label">Recurso</label>
				<div class="col-md-6">
					<strong name="recurso" id="recurso" class="form-control">
						<?php
	   						echo $recurso["titulo"];
    					?>
					</strong>
				</div>
			</div>
			<div class="form-group">
					<label for="recurso" class="col-md-4 control-label">Usuario</label>
				<div class="col-md-6">
					<strong name="recurso" id="recurso" class="form-control">
						<?php
	   						echo $recurso["nombreUsuario"]; 
    					?>
					</strong>
				</div>
			</div>
			<div class="form-group">
					<label for="estados" class="col-md-4 control-label">Elija un estado</label>
				<div class="col-md-6">
					<?php
            			$estados=$this->Estadorecurso_model->get_all_estadorecurso();
            			foreach ($estados as $unEstado) {
                			$arrEstado[ucwords($unEstado["nombre"])]= ucwords($unEstado["nombre"]);
            			}
            			echo form_dropdown('estados', $arrEstado, array(ucwords($recurso['nombreEstadoRecurso'])),"class=form-control");
        			?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="validado">Validar</label>
				<div class="col-md-3">
				<?php 
				$validado=$recurso["validado"];
				if($validado){
					echo "Si\n";
					echo form_radio("validado","1",true,["class"=>"form-check-input"]);
					echo "No\n";
					echo form_radio("validado","0",false,["class"=>"form-check-input"]);
				}else{
					echo "Si\n";
					echo form_radio("validado","1",false,["class"=>"form-check-input"]);
					echo "No\n";
					echo form_radio("validado","0",true,["class"=>"form-check-input"]);
				}
				?>
			</div>
			<br/><br/>
			<div class="form-group">
				<?php
					echo form_submit("enviar","Actualizar",["class"=>"btn btn-success"]);
					echo form_close();
				?>
			</div>
			<br/>
		</div>
	</div>
</div>
<?php 
} elseif($recurso["nombreUsuario"]==$this->session->nombreUsuario) {
?>
<div class="container">
	<div class="col-md-offset-2 col-md-8">
		<br/>
		<div class="box box-primary" id="editRec">
			<h1>Editar Recurso</h1><br/>	
			<div class="form-group">
					<label for="recurso" class="col-md-4 control-label">Recurso</label>
				<div class="col-md-6">
					<strong name="recurso" id="recurso" class="form-control">
						<?php
	   						echo $recurso["titulo"];
    					?>
					</strong>
				</div>
			</div>
			<div class="form-group">
					<label for="recurso" class="col-md-4 control-label">Usuario</label>
				<div class="col-md-6">
					<strong name="recurso" id="recurso" class="form-control">
						<?php
	   						echo $recurso["nombreUsuario"]; 
    					?>
					</strong>
				</div>
			</div>
			<div class="form-group">
					<label for="estados" class="col-md-4 control-label">Elija un estado</label>
				<div class="col-md-6">
					<?php
            			$estados=$this->Estadorecurso_model->get_all_estadorecurso();
            			foreach ($estados as $unEstado) {
                			$arrEstado[ucwords($unEstado["nombre"])]= ucwords($unEstado["nombre"]);
            			}
            			echo form_dropdown('estados', $arrEstado, array(ucwords($recurso['nombreEstadoRecurso'])),"class=form-control");
        			?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="validado">Validar</label>
				<div class="col-md-3">
				<?php 
				$validado=$recurso["validado"];
				if($validado){
					echo "Si\n";
					echo form_radio("validado","1",true,["class"=>"form-check-input"]);
					echo "No\n";
					echo form_radio("validado","0",false,["class"=>"form-check-input"]);
				}else{
					echo "Si\n";
					echo form_radio("validado","1",false,["class"=>"form-check-input"]);
					echo "No\n";
					echo form_radio("validado","0",true,["class"=>"form-check-input"]);
				}
				?>
			</div>
			<br/><br/>
			<div class="form-group">
				<?php
					echo form_submit("enviar","Actualizar",["class"=>"btn btn-success"]);
					echo form_close();
				?>
			</div>
			<br/>
		</div>
	</div>
</div>
soy el autor washu
<?php
}


?>
