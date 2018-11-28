<?php 

	if ($this->session->iniciada && $this->session->rol=="administrador de recursos") {
?>
<script type="text/javascript">
	$(document).ready(function () {
    $("#busqueda").keyup(function () {
		var filtro = $("#busqueda").val();
		if( jQuery(this).val() != ""){
        jQuery("#tabla tbody>tr").hide();
        jQuery("#tabla td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
    }
    else{
        jQuery("#tabla tbody>tr").show();
    }
});
 
jQuery.extend(jQuery.expr[":"], 
{
    "contiene-palabra": function(elem, i, match, array) {
        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }

    });
});

</script>
<?php echo form_open(base_url()."recurso/edit/",array("method"=>"get","id"=>"buscar"));?>
<table class="table table-light table-responsive-md" id="tabla">
	<thead>
		<tr><th class="titulo" colspan="6"><h3>Lista de Recursos</h3></th></tr>
		<tr><th colspan="2" id="filtro">
			
				<div class="col-md-6">
                    <input type="text" class="form-control" id="busqueda"/>
                </div>
		
		</th></tr>
		<tr>
			<th scope="col">Titulo</th>
			<th scope="col">Validado</th>
			<th scope="col">Cantidad de archivos</th>
			<th scope="col"></th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach ($recursos as $r) {
            ?>
		<tr>
			
			<td>
				<?php echo $r['titulo']; ?>
			</td>
			
			<td>
				<?php if($r['validado']==0){?><input type="checkbox" id="validado" name="validado"><?php }else{  ?><input type="checkbox" id="validado" name="validado" checked><?php }?>
			</td>
			<td>
				<?php echo count($r['archivos']); ?>
			</td>
			<td><a href="<?php echo base_url()."recurso/view/".$r['idRecurso']; ?>" class="btn btn-info">Ver recurso</a></td>
			
		</tr>
		
		<?php
        }
     ?>
	<tr><td></td>
	<td><button class="btn btn-success" type="submit">Actualizar</button></td>
	<td></td>
	
	<td></td></tr>
	</tbody>
	
</table>
<?php echo form_close();?>


<?php
} else {
    echo "Tiene prohibido el acceso";
}
?>
