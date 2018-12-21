
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
                <div class="actions">
                <button id="habilitarEdicion" class="btn btn-success fa fa-pencil"></button>
                <button id="habilitarEliminacion" class="btn btn-danger fa fa-remove"></button>
                </div>
                <?php echo form_open('',array("id"=>"EdicionComentario"));?>
                <label hidden for="editarComentario">Comentario:</label>
                <input hidden type="text" id="editarComentario">
                <?php echo form_close(); ?>
                <?php echo form_open("",array("id"=>"EliminacionComentario"));?>
               <input type="hidden" name="eliminarComentario" value="<?php echo $unComentario["idComentario"]?>">
                <?php echo form_close();?><?php
            }
            ?></small>
            <?php echo $unComentario["nombreUsuario"];?>
            
        </a>
        <?php echo $unComentario["descripcion"];?>
        
    </p>
    </div>
    
<?php $i++;}




?>
 

