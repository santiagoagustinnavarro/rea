<?php 

	if ($this->session->iniciada && $this->session->rol=="administrador de recursos") {
?>
<script type="text/javascript">
	$(document).ready(function () {
    $("#busqueda").keyup(function () {
        var filtro = $("#busqueda").val();

    });
});

</script>
<table class="table table-light table-responsive-md" id="tabla">
	<thead>
		<tr><th class="titulo" colspan="6"><h3>Lista de Recursos</h3></th></tr>
		<tr><th colspan="4" id="filtro"><div class="container-fluid">
			<form id="buscar" method="post" action="<?php echo base_url()?>/application/controllers/usuario/buscar">
				<div class="col-md-6">
                    <input type="text" class="form-control" id="busqueda"/>
                </div>
			</form>
		</th></tr>
		<tr>
			<th scope="col">Titulo</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Validado</th>
			<th scope="col">Cantidad de archivos</th>
			
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
				<?php echo $r['descripcion']; ?>
			</td>
			<td>
				<?php if($r['validado']==0){?><input type="checkbox" id="validado" name="validado"><?php }  ?>
			</td>
			<td>
				<?php echo count($r['archivos']); ?>
			</td>
			
		</tr>
		<?php
        }
     ?>
	</tbody>
</table>
<?php
} else {
    echo "Tiene prohibido el acceso";
}
?>
