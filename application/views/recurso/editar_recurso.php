<br/>
<div class="container box box-info">
	<br/>
	<div class="col-md-1">
		<a class="logeo" href="<?php echo base_url();?>recurso/listar"><div class="btn btn-success logeo"><i class="fa fa-reply"></i></div></a>
	</div>
	<br/>
	<div class="col-md-10">
		<h1>Edicion del recurso</h1>
		<div class="col-md-offset-3 col-md-6">
		<?php
		if(isset($mensaje)){
			echo $mensaje;
		} 
		?>
		</div>
		<script type="text/javascript">
 var base_url = '<?php echo  base_url();?>'
</script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/estilo/js/nicEdit.js"></script> <script type="text/javascript">
				//<![CDATA[
        		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  				//]]>
			</script>
		<?php echo form_open("recurso/editar_recurso/".$recurso["idRecurso"],array("id"=>"formActualizacion","method"=>"post","onsubmit"=>"return subirrecurso($(this));","enctype"=>"multipart/form-data")); ?>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-file-text-o"></i> Nombre del Recurso</h4>
					<input type="text" class="form-control" id="nombre" placeholder="Ingrese el Nombre" name="nombre" minlength="2" maxlength="50" value="<?php echo $recurso["titulo"]; ?>">
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-caret-down"></i> Seleccione una Categoria</h4>
					<select required class="form-control text-center" id="categoria" name="categoria">
					<option value="" selected>Elija una categoria</option>
						<?php 
							foreach ($categoria as $unCat) {
						?>
						<option value="<?php echo $unCat["nombre"]; ?>" <?php if($recurso["nombreCategoria"]==$unCat["nombre"]){echo "selected";}?>><?php echo $unCat["nombre"];
						}?>
						</option>
					</select>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-caret-down"></i> Seleccione un Tema</h4>
					<select required class="form-control text-center" id="tema" name="tema">
						<option value="" selected>Elija un tema</option>
						<?php 
							foreach ($tema as $unTema) {
						?>
						<option value="<?php echo $unTema["nombre"]; ?>" <?php if($recurso["nombreTema"]==$unTema["nombre"]){echo "selected";}?>><?php echo $unTema["nombre"];?>
						</option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-upload"></i> Seleccione Archivo/s</h4><br/>
					<div class="form-control">
						<input  type="file" id="archivo[]" name="archivo[]" multiple="">
					</div>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-check-square-o"></i> Seleccione el año de Enseñanza</h4>
					<ul class="list-unstyled mb-0 text-center">
						<?php        
						 
                            foreach ($niveles as $unNivel) {
                        ?>
						<li><input type="checkbox" name="niveles[]" id="niveles[]"
							value="<?php echo $unNivel["nombre"]; ?>" <?php foreach($nivelesSelect as $nivelSelect){
                                if (in_array($unNivel["nombre"], $nivelSelect)) {
                                    echo " checked ";
                                }
                            }?> ><span>
							<?php echo $unNivel["nombre"]; ?></span>
						</li>
						<?php
						}
						?>
					</ul>
				</div>
				<div class="form-group col-md-offset-2 col-md-8">
					<h4><i class="fa fa-pencil-square-o"></i> Descripcion</h4>
					<div>
						<textarea class="form-control" name="descripcion" id="descripcion" rows="8"><?php echo $recurso["descripcion"];?></textarea>
					</div>
				</div>
				<br/>
		
				<?php $i=1;
     			foreach ($archivos as $unArchivo) {
        			if (count($archivos)==1) {//Solo tiene un elemento ?>
				<div class="row">
				<div class="col-md-3">
				<div class="card-footer text-center" name="<?php echo $unArchivo["idArchivo"];?>"  id="<?php echo $unArchivo["idArchivo"];?>" >
				<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
				 alt="Icono" id="icono"><br/>
					<?php echo $unArchivo["nombre"];?><br/>
				
				</div>
			</div>
				</div>
				<?php
        		} else {
					if ($i%4==0 && $i!=1 && $i!=count($archivos)) {//Ultimo elemento de la fila
				?>
					<div class="col-md-3">
				<div class="card-footer text-center" name="<?php echo $unArchivo["idArchivo"];?>"  id="<?php echo $unArchivo["idArchivo"];?>" >
				<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
				 alt="Icono" id="icono"><br/>
					<?php echo $unArchivo["nombre"];?><br/>
				
				</div>
			</div>
				</div>
				<div class="row">
				<?php
        	    	} elseif ($i==1) {//Primer elemento
        		?>
				<div class="row">
					<div class="col-md-3">
				<div class="card-footer text-center" name="<?php echo $unArchivo["idArchivo"];?>"  id="<?php echo $unArchivo["idArchivo"];?>" >
				<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
				 alt="Icono" id="icono"><br/>
					<?php echo $unArchivo["nombre"];?><br/>
				
				</div>
			</div>
						<?php
            				} elseif ($i==count($archivos)) {//Ultimo elemento
            			?>
							<div class="col-md-3">
				<div class="card-footer text-center" name="<?php echo $unArchivo["idArchivo"];?>"  id="<?php echo $unArchivo["idArchivo"];?>" >
				<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
				 alt="Icono" id="icono"><br/>
					<?php echo $unArchivo["nombre"];?><br/>
				
				</div>
			</div>
						</div>
							<?php
            					} else {
            				?>
							<div class="col-md-3">
				<div class="card-footer text-center" name="<?php echo $unArchivo["idArchivo"];?>"  id="<?php echo $unArchivo["idArchivo"];?>" >
				<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
				 alt="Icono" id="icono"><br/>
					<?php echo $unArchivo["nombre"];?><br/>
				
				</div>
			</div>
							<?php
             					}
             					$i++;
         						}//Fin else
	 						}//Fin foreach
	 						?>
						<br>
						<br>
						<br>
						<div class="row">
<div id="droppable" hidden class="col-md-12">
<i class="fa fa-trash fa-5x"></i>
<a  id="restaurar" class="btn btn-info">Click aqui para restaurar los elementos</a>
</div>	 
</div><br><br>
	<div class="form-group col-md-offset-2 col-md-8 ">
		<button type="submit" name="form" id="form" class="btn btn-success">Actualizar</button>
	</div>
		<?php echo form_close();?>	
	</div> <!-- Cierre de la clase col -->

</div> <!-- Cierre de la clase container -->


  





