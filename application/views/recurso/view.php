<?php
if (isset($unRecurso[0])) {
    $recurso=$unRecurso[0];
?>
<style>
#actions{float:right}
.no-close .ui-dialog-titlebar-close {
  display: none;
}
#actions > form{
	float:right;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
<?php 
if($usuario!=$recurso["nombreUsuario"]){
	
    ?>	$(".estrellas").starrr();
	var i=1;
	$(".estrellas > a").each(function(){
		$(this).attr("id","star-"+i);
		i++;
	});
	
	$(".estrellas > a").click(function(){
		var valor=$(this).attr("id").substring((($(this).attr("id").indexOf("-"))+1))
		$.ajax({
			url:<?php echo "\"".base_url()."recurso/\""; ?>+"valorizar/"+<?php echo $recurso["idRecurso"]; ?>+"/"+valor+"/"+<?php echo "\"".$usuario."\""; ?>,
			success:function(response){
				alert(response);
			},
			method:"get",
		})
	})
	<?php }?>
	$("#envio").click(function(){
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
	 title:"Eliminación",
	 dialogClass: "no-close",
      buttons: {
        "Si":  {text: 'Si', click: function(){ $(this).dialog("close");$("#edicion").submit() }, "class": "btn btn-info" },
		"No":  {text: 'No', click: function(){ $(this).dialog("close");}, "class": "btn btn-danger" },
      }
	});
});
})
</script>
<div id="dialog-confirm" hidden>¿Esta seguro de eliminar el recurso?</div>
<div class="container">
	<br/>
	<div class="box box-primary col-md-10">
	<br/>
	<?php
		if($this->session->rol == 'administrador de recursos'){
			echo'<div class="col-md-1">
				 <div class="btn btn-success logeo"><a href='.base_url().'recurso><i class="fa fa-reply"></i></a></div>
				</div>';
		}else{
			echo'<div class="col-md-1">
			<div class="btn btn-success logeo"><a href='.base_url().'recurso/listar><i class="fa fa-reply"></i></a></div>
			</div>';
		}
	?>
	<?php if($edicion){?> <div id="actions"><a href="<?php echo base_url()."recurso/editar_recurso/".$recurso["idRecurso"];?>"><button class="fa fa-pencil btn btn-primary"></button></a><?php echo form_open("recurso/view/".$recurso["idRecurso"],array("id"=>"edicion"));?><input type="hidden" name="eliminar" value="1"><button type="button"  id="envio" class="fa fa-remove  btn btn-danger"></button><?php echo form_close()?></div><?php }?>
		<br/>
		<h1 class="titulo"><?php echo $recurso["titulo"];?></h1>
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
					<a download href= "<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"];?>" class="btn btn-success"><i class="fa fa-download"></i> Descargar </a>
				</div>
			</div>
			<?php 
			}
			?>	
		</div>
		<div class="espacio"></div>
			<a download href= <?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"];?> class="btn btn-success"><i class="fa fa-download"></i> Descargar Recurso</a>
			<?php if($iniciada){
            ?><div class="estrellas"></div>
			<?php
				}
			?>
		<div class="espacio"></div>
		<?php
			echo form_open("comentario/generarComentario/".$idRecurso,["method"=>"post"]);
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
       	    	    <input class="form-control" name="descripcion" id="descripcion" placeholder="Enviar mensaje...">
            		<div class="input-group-btn">
            			<button type="submit" class="btn btn-success">Enviar</button>
            		</div>
        		</div>
			</div> 
		</div>
		<?php
			echo form_close();
		?>
	</div> 
	</div>
</div>
	<?php 
	}else{
		echo "No existe el recurso";
	} 
	?>
