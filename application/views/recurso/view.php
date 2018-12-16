<?php
if (isset($unRecurso[0])) {
    $recurso=$unRecurso[0];
?>
<div class="container">
	<br/>
	<div class="box box-primary col-md-10">
		<h1 class="titulo"><?php echo $recurso["titulo"];?></h1><br/>
		<div class="descripcion">
			<h3>Descripcion</h3>
			<p>	<?php echo $recurso["descripcion"];?></p>
		</div>
		<br/>
		<div class="row">
			<?php 
			foreach($recurso["archivos"] as $unArchivo){
			?>
			<div class="col-md-3">
				<div class="card-footer text-center">
				<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
				 alt="Icono" id="icono"><br/>
					<?php echo $unArchivo["nombre"];?><br/>
					<a download href=<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"];?> class="btn btn-success"><i class="fa fa-download"></i> Descargar </a>
				</div>
			</div>
			<?php 
			}
			?>	
		</div>
		<div class="espacio"></div>
			<a download href=<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"];?> class="btn btn-success"><i class="fa fa-download"></i> Descargar Recurso</a>
		<div class="espacio"></div>
		<?php
			//echo form_open("comentario/generarComentario/".$idRecurso,["method"=>"post"]);
		?> 
			<!-- <div class="form-group">
				<label for="descripcion">Comentarios</label>
				<textarea type="textarea" class="form-control offset-lg-4 col-lg-5" name="descripcion" id="descripcion"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
			</div> -->
			<div class="container col-md-offset-2 col-md-8">
			<div class="box box-success">
			<div class="box-header">
    			<i class="fa fa-comments-o"></i>
    		    <h3 class="box-title"> <b>Comentarios</b></h3>
			</div>
			<br/>
			<div class="box-body chat" id="chat-box">
        		<div class="item">
        		    <img src=" <?php echo base_url()?>assets/estilo/dist/img/user4-128x128.jpg" alt="user image">
					<br/>
					<p class="message">
        				<a href="#" class="name">
            				<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
        				    Mike Doe
            		    </a>
            			I would like to meet you to discuss the latest news about
            			the arrival of the new theme. They say it is going to be one the
        	    		best themes on the market
        	    	</p>
       		 	</div>
    			<div class="item">
        			<img src="<?php echo base_url()?>assets/estilo/dist/img/user3-128x128.jpg" alt="user image">
					<br/>
					<p class="message">
            			<a href="#" class="name">
            			    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
        	    			Alexander Pierce
          				</a>
              			I would like to meet you to discuss the latest news about
              			the arrival of the new theme. They say it is going to be one the
            			best themes on the market
        	    	</p>
    			</div>
    	    	<div class="item">
        			<img src="<?php echo base_url()?>assets/estilo/dist/img/user2-160x160.jpg" alt="user image">
					<br/>
					<p class="message">
            			<a href="#" class="name">
                			<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
        	            	Susan Doe
            	    	</a>
              			I would like to meet you to discuss the latest news about
              			the arrival of the new theme. They say it is going to be one the
              			best themes on the market
            		</p>
        		</div>
    		</div>
    		<div class="box-footer">
        		<div class="input-group">
       	    	    <input class="form-control" placeholder="Enviar mensaje...">
            		<div class="input-group-btn">
            			<button type="button" class="btn btn-success">Enviar</button>
            		</div>
        		</div>
			</div> 
		</div>
		<?php
			//echo form_close();
		?>
	</div> 
	</div>
</div>
	<?php 
	}else{
		echo "No existe el recurso";
	} 
	?>
