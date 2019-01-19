<script>
$(document).ready(function(){
    $(".btn.btn-success.edicion").click(function(){
              var idComentario=$(this).attr("id").charAt($(this).attr("id").length-1);
            $("#comentario"+idComentario).replaceWith("<input class=\"form-control\" value="+"\""+$("#comentario"+idComentario).html()+"\" type=text id="+ $("#comentario"+idComentario)+"><button class=\"btn btn-info guardar\" id=\"guardar"+idComentario+"\">Guardar</button>");
            $(".btn.btn-info.guardar").click(function(){
                alert("prueba de guardado")
            })
    })
   
})

</script>
<?php 
$i=0;

foreach($comentarios as $unComentario){
    ?>
    <div class="item">
    <img src=" <?php echo base_url()?>assets/upload/fotoPerfil/<?php if($usuarios[$i]["foto"]!=""){
        echo $unComentario["nombreUsuario"]; ?>/<?php  echo $usuarios[$i]["foto"] ;
    }else{?>user-default.png<?php }?>" alt="user image">
    <br/>
    <p class="message">
        <a href="#" class="name">
       
            <small class="text-muted pull-right"><i class="fa fa-calendar"></i>&nbsp;<?php echo date("d/m/Y", strtotime($unComentario["fecha"]));?>&nbsp;<i class="fa fa-clock-o"></i> <?php echo $unComentario["hora"];?><?php if($this->session->nombreUsuario==$unComentario["nombreUsuario"]){
            ?> 
                <?php
            }
            ?></small>
            <?php echo $unComentario["nombreUsuario"];?>
            
        </a>
        <span class="comentario" id="comentario<?php echo $unComentario["idComentario"];?>"><?php echo $unComentario["descripcion"]." ";?></span><?php if($unComentario["nombreUsuario"]==$usuario){?><button  id="editar<?php echo $unComentario["idComentario"]; ?>" class="btn btn-success edicion"><i class="fa fa-pencil"></i></button><button id="eliminar<?php echo $unComentario["idComentario"]; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button><?php }?>
        
    </p>
    </div>
    
<?php $i++;}




?>
 

