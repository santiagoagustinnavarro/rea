<?php 
	if(strtolower($this->session->rol)=="administrador de usuarios"){
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
<br/>
<div class="box box-primary" id="listarUsuario">
	<div class="table-responsive">
		<table class="table table-bordered text-center" id="tabla">
			<thead>
				<tr><th class="titulo" colspan="7"><h1>Lista de Usuarios</h1></th></tr>
				<tr><th colspan="2" id="filtro">
				<form id="buscar" method="post" action="<?php echo base_url()?>/application/controllers/usuario/buscar">
                    <input type="text" class="form-control" id="busqueda" placeholder="Buscar por ..." />
				</form>
				</th></tr>
				<tr>
					<th scope="col">Nombre Usuario</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Terciario/Universidad</th>
					<th scope="col">E-mail</th>
					<th scope="col">Estado</th>
					<th scope="col">Actualizar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuario as $u) {
    			    $rol=$this->Tienerol_model->get_tienerol($u['nombreUsuario']);
        			if (strtolower($rol["nombreRol"])=="profesor") {
        	    ?>
				<tr>
					<td>
						<?php echo $u['nombreUsuario']; ?>
					</td>
					<td>
						<?php echo $u['nombre']; ?>
					</td>
					<td>
						<?php echo $u['apellido']; ?>
					</td>
					<td>
						<?php echo $u['estudio']; ?>
					</td>	
					<td>
						<?php echo $u['email']; ?>
					</td>
					<td>
						<?php if(strtolower($u['nombreEstadoUsuario'])=="pendiente"){
								echo form_open('usuario/edit/'.$u['nombreUsuario'],array("method"=>'post'),array("estados"=>"Alta","roles"=>$u['nombreRol'],'email'=>$u["email"]));
								echo form_submit("envio","Dar alta",array("class"=>"btn btn-success"));
								echo form_close();
							}else{
								echo $u['nombreEstadoUsuario'];
							}
						?>
					</td>
					<td>
						<a href="<?php echo site_url('usuario/edit/' . $u['nombreUsuario']); ?>"
						class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a> 
					</td>
				</tr>
				<?php
    			    }
				} 
				?>
			</tbody>
		</table>
			<br/>
		<div class="pull-right">
	    	<?php echo $this->pagination->create_links(); ?>    
		</div>
		<?php
			} else {
			    echo "Tiene prohibido el acceso";
			}
		?>
	</div>
</div>
