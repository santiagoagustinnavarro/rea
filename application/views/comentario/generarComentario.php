<?php


echo form_open("comentario/generarComentario/".$idRecurso,["method"=>"post"]);
?>
<div class="form-group">
<label for="descripcion">Ingrese su comentario</label>
<textarea type="textarea" class="form-control offset-lg-4 col-lg-5" name="descripcion" id="descripcion"></textarea>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
<?php
 echo form_close();
?>