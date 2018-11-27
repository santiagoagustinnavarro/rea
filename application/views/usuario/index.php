<?php 
	if ($this->session->iniciada && $this->session->rol=="administrador de usuarios") {
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
<table class="table table-light table-responsive-md" id="tabla">
	<thead>
		<tr><th class="titulo" colspan="6"><h3>Lista de Usuarios</h3></th></tr>
		<tr><th colspan="4" id="filtro">
			<form id="buscar" method="post" action="<?php echo base_url()?>/application/controllers/usuario/buscar">
				<div class="col-md-6">
                    <input type="text" class="form-control" id="busqueda"/>
                </div>
			</form>
		</th></tr>
		<tr>
			<th scope="col">Nombre Usuario</th>
			<th scope="col">Nombre</th>
			<th scope="col">Apellido</th>
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
				<?php echo $u['email']; ?>
			</td>
			<td>
				<?php $estado=$this->TenerEstadoUsuario_model->get_tenerestadousuario($u['nombreUsuario']);
            	if(strtolower($estado["nombreEstadoUsuario"])=="pendiente"){
				echo form_open("usuario/edit/".$u['nombreUsuario'],array("method"=>'post'),array("estadoActual"=>"Pendiente","nuevoEstado"=>"Alta"));?>	<button type="submit" class="btn btn-success"> Dar alta</button> <?php echo form_close();
				}else{
					echo $estado["nombreEstadoUsuario"];
				}?>
                
			</td>
			<td>
				<a href="<?php echo site_url('usuario/edit/' . $u['nombreUsuario']); ?>"
				 class="btn btn-info btn-xs">Editar</a>
			</td>
		</tr>
		<?php
        }
    } ?>
	</tbody>
</table>
<?php
} else {
    echo "Tiene prohibido el acceso";
}
?>
