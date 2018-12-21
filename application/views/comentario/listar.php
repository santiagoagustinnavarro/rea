
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
        <?php echo $unComentario["descripcion"];?>
        
    </p>
    </div>
    
<?php $i++;}




?>
 

