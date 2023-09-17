<style>
.no-close .ui-dialog-titlebar-close {
  display: none;
}
.eliminarEditar div{
	position:relative;
	margin-left:40%;
}
.eliminarEditar a,form{
	float:left;
}
</style>
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
	$("button[name=envio]").click(function(){
		var val=$(this).val();
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
	 title:"Eliminación",
	 dialogClass: "no-close",
      buttons: {
        "Si":  {text: 'Si', click: function(){ $(this).dialog("close");$("#edicion"+val).submit(); }, "class": "btn btn-info" },
		"No":  {text: 'No', click: function(){ $(this).dialog("close");}, "class": "btn btn-danger" },
      }
	});
});
});


</script>

<br/>
<div class="box box-primary" id="listarRecurso">
	<div class="table-responsive">
		<table class="table table-striped table-bordered text-center" id="tabla">
			<thead>
				<tr><th class="titulo" colspan="4"><h1>Mis Recursos</h1></th></tr>
				<tr><th colspan="2" id="filtro">
				<div class="col-md-8">
        	        <input type="text" class="form-control" id="busqueda" placeholder="Buscar por ..." />
                </div>
				</th></tr>
				<tr>
					<th scope="col">Titulo</th>
					<th scope="col">Nombre de la Categoria</th>
					<th scope="col">Nombre del Tema</th>
					<th scope="col">Actualizar/Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($recursos as $r) {
                        if (strtolower($r["nombreEstadoRecurso"])=="alta") {
                ?>
				<tr>
					<td>
						<?php echo $r['titulo']; ?>
					</td>
					<td>
						<?php echo $r['nombreCategoria']; ?>
					</td>
					<td>
						<?php echo $r['nombreTema']; ?>
					</td>
					<td class="eliminarEditar">
						<div>
						<a href="<?php echo site_url('recurso/editar_recurso/'.$r['idRecurso']); ?>" class="btn btn-success btn-md estilo"><span class="glyphicon glyphicon-edit"></span></a> 
						<?php echo form_open("recurso/misRecursos/".$r["idRecurso"], array("id"=>"edicion".$r["idRecurso"])); ?> <input type="hidden" id="eliminar" name="eliminar" value="<?php echo $r["idRecurso"]; ?>"><button class="btn btn-danger btn-md" type="button" name="envio" value="<?php echo $r["idRecurso"]; ?>"><span class="glyphicon glyphicon-trash"></span></button><?php echo form_close()?></div>
						<?php
							}
							?>
							
							<?php
						}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
		<br/>
	<div class="pull-right">
    	<?php echo $this->pagination->create_links(); ?>    
	</div>
</div>
<div id="dialog-confirm" hidden>¿Seguro que desea eliminar el recurso?</div>
