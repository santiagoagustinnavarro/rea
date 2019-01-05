<?php
if (isset($unRecurso[0])) {
    $recurso=$unRecurso[0]; ?>
<style>
	.actions {float:right}

.no-close .ui-dialog-titlebar-close {
  display: none;
}
.actions > form{
	float:right;
}
.estrellas{
	font-size: x-large;
}

</style>

<script type="text/javascript">
	$(document).ready(function() {
		$("#actionsComentario").children('a').click(function() {
			alert(hola)
		})
		<?php if ($iniciada) {
        ?>
		$("#comentar").click(function() {
			if ($("input[name=descripcion]").val() != "") {
				$.ajax({
					url: <?php echo "\"".base_url()."\""?>
						+"comentario/add",
					data: {
						idRecurso: <?php echo $recurso["idRecurso"]; ?> ,
						nombreUsuario: <?php echo "\"".$usuario."\""; ?> ,
						fecha: <?php echo "\"".date("Y-m-d")."\""; ?> ,
						hora: <?php echo "\"".date("H:i:s")."\""; ?> ,
						descripcion: $("#descripcion").val()
					},
					method: "POST"
				})
				location.reload();
			} else {

			}
		})

		<?php
    } ?>
		$.ajax({
			url: <?php echo "\"".base_url()."\""?>
				+"comentario/listar/" + <?php echo $recurso["idRecurso"]?> ,
			success: function(response) {
				$('#comentarios').html(response); //Probando pero qyue¡¡¡¡¡¡¡¡
			}
		})
		<?php
        if ($iniciada && $usuario!=$recurso["nombreUsuario"]) {
            ?>

		actual = $.ajax({
			method: "get",
			url: <?php echo "\"".base_url()."recurso/\""; ?>
				+"obtenerValor/" + <?php echo $recurso["idRecurso"]; ?>
				+"/" + <?php echo "\"".$usuario."\""; ?> ,
			success: function(response) {
				actual = parseInt(response);

				$(".estrellas").starrr({

					rating: actual,
					change: function(e, valor) {
						$.ajax({
							method: "get",
							dataType: 'json',
							url: <?php echo "\"".base_url()."recurso/\""; ?>
								+"valorizar/" + <?php echo $recurso["idRecurso"]; ?>
								+"/" + valor + "/" + <?php echo "\"".$usuario."\""; ?> ,
							success: function(response) {
								if (response.estado) {
									alert("Recurso valorizado con exito")
								} else {
									alert("ah ocurrido un problema");
								}
							},
							error: function() {
								alert('error');
							},

						})
					}
				});


			},
			error: function() {
				alert('error');
			},
		});

		<?php
        } ?>
		$("#envio").click(function() {
			$("#dialog-confirm").dialog({
				resizable: false,
				height: "auto",
				width: 400,
				modal: true,
				title: "Eliminación",
				dialogClass: "no-close",
				buttons: {
					"Si": {
						text: 'Si',
						click: function() {
							$(this).dialog("close");
							$("#edicion").submit()
						},
						"class": "btn btn-info"
					},
					"No": {
						text: 'No',
						click: function() {
							$(this).dialog("close");
						},
						"class": "btn btn-danger"
					},
				}
			});
		});
	})
</script>
<div id="dialog-confirm" hidden>¿Esta seguro de eliminar el recurso?</div>
<div class="container">
	<br />
	<div class="box box-primary col-md-10">
		<br />
		<?php
        if ($this->session->rol == 'administrador de recursos') {
            echo'<div class="col-md-1">
				 <div class="btn btn-success logeo"><a href='.base_url().'recurso><i class="fa fa-reply"></i></a></div>
				</div>';
        } else {
            echo'<div class="col-md-1">
			<div class="btn btn-success logeo"><a href='.base_url().'recurso/listar><i class="fa fa-reply"></i></a></div>
			</div>';
        } ?>
		<?php if ($edicion) {
            ?>
		<div class="actions"><a href="<?php echo base_url()."recurso/editar_recurso/".$recurso["idRecurso"]; ?>"><button
				 class="fa fa-pencil btn btn-primary"></button></a><?php echo form_open("recurso/view/".$recurso["idRecurso"], array("id"=>"edicion")); ?><input
			 type="hidden" name="eliminar" value="1"><button type="button" id="envio" class="fa fa-remove  btn btn-danger"></button><?php echo form_close()?>
		</div><?php
        } ?>
		<br />
		<h1 class="titulo"><?php echo $recurso["titulo"]; ?>
		</h1>
		<div class="descripcion">
			<h3>Descripcion</h3>
			<p> <?php echo $recurso["descripcion"]; ?>
			</p>
		</div>
		<br />
		<div class="row">
			<?php
            foreach ($recurso["archivos"] as $unArchivo) {
                ?>
			<div class="col-md-3">
				<div class="card-footer text-center">
					<img src="<?php echo base_url(); ?>assets/estilo/imagenes/iconext.png"
					 alt="Icono" id="icono"><br />
					<?php echo $unArchivo["nombre"]; ?><br />
					<a download href="<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"]; ?>"
					 class="btn btn-success"><i class="fa fa-download"></i> Descargar </a>
				</div>
			</div>
			<?php
            } ?>
		</div>
		<div class="espacio"></div>
		<a download href="<?php echo base_url()."assets/upload/".$recurso["nombreUsuario"]."/".$recurso["idRecurso"]."/".$unArchivo["nombre"]; ?>"
		 class="btn btn-success"><i class="fa fa-download"></i> Descargar Recurso</a>
		<br /><br />
		<?php if ($iniciada) {
                ?>
		<div class="estrellas"></div>
		<?php
            } ?>
		<div class="espacio"></div>


		<!-- <div class="form-group">
				<label for="descripcion">Comentarios</label>
				<textarea type="textarea" class="form-control offset-lg-4 col-lg-5" name="descripcion" id="descripcion"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
			</div> -->
		<div class="container col-md-offset-2 col-md-8">
			<div class="box box-success">
				<div class="box-header">
					<i class="fa fa-comments-o"></i>
					<h3 class="box-title"> <b>Comentarios</b></h3>
				</div>
				<div class="box-body chat" id="chat-box">
					<div class="row">
						<div id="comentarios"></div>
					</div>

					<?php if ($iniciada) {
                ?>
					<div class="box-footer">
						<div class="input-group">
							<input class="form-control" name="descripcion" id="descripcion" placeholder="Enviar mensaje...">
							<div class="input-group-btn">
								<button type="button" id="comentar" class="btn btn-success">Enviar</button>
							</div>
						</div>
					</div>
					<?php
            } ?>
				</div>
			</div>
		</div>
	</div>

	<?php
} else {
                echo "No existe el recurso";
            }
