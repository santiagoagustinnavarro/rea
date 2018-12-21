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
<br/>
<div class="box box-primary" id="listarRecurso">
	<div class="table-responsive">
		<table class="table table-striped table-bordered text-center" id="tabla">
			<thead>
				<tr><th class="titulo" colspan="7"><h1>Lista de Recursos</h1></th></tr>
				<tr><th colspan="2" id="filtro">
        	        <input type="text" class="form-control" id="busqueda" placeholder="Buscar por ..." />
				</th></tr>
				<tr>
					<th scope="col">Titulo</th>
					<th scope="col">Nombre del Usuario</th>
					<th scope="col">Nombre de la Categoria</th>
					<th scope="col">Nombre del Tema</th>
					<th scope="col">Estado</th>
					<th scope="col">Validar</th>
					<th scope="col">Actualizar/Ver Recurso</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($recurso as $r) {
            	?>
				<tr>
					<td>
						<?php echo $r['titulo']; ?>
					</td>
					<td>
						<?php echo $r['nombreUsuario']; ?>
					</td>
					<td>
						<?php echo $r['nombreCategoria']; ?>
					</td>
					<td>
						<?php echo $r['nombreTema']; ?>
					</td>
					<td>
						<?php if(strtolower($r['nombreEstadoRecurso'])!="alta"){
								echo form_open('recurso/edit/'.$r['idRecurso'],array("method"=>'post'),array("estados"=>"Alta",'email'=>$r["email"]));
								echo form_submit("envio","Dar alta",array("class"=>"btn btn-success"));
								echo form_close();
							}else{
								echo ucwords($r['nombreEstadoRecurso']);
							}
						?>
					</td>
					<td>
						<?php if(($r['validado'])==0){
								echo form_open('recurso/edit/'.$r['idRecurso'],array("method"=>'post'),array("validado"=>1,'email'=>$r["email"]));
								echo form_submit("envio","Validar",array("class"=>"btn btn-success"));
								echo form_close();
							}else{
						?>
						<i class="fa fa-check"></i>
						<?php
							}
						?>
					</td>
					<td>
            			<a href="<?php echo site_url('recurso/edit/'.$r['idRecurso']); ?>" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a> 
        	    		<a href="<?php echo site_url('recurso/view/'.$r['idRecurso']); ?>" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-eye-open"></span></a>
        			</td>
				</tr>
				<?php
    	    		}
     			?>
			</tbody>
		</table>
	</div>
		<br/>
	<div class="pull-right">
    	<?php echo $this->pagination->create_links(); ?>    
	</div>
</div>
