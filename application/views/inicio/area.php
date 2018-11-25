<!-- Container fluid -->
<div class="container-fluid">
	</br>
	<h1 class="titulo text-secondary">Contenido</h1>
	<div class="row">
		<div class="col-md-3">
			<!-- Aca comienza las busquedas -->
			<div class="col-my-3">
				<!-- Search Widget -->
				<div class="card md-3">
					<h5 class="card-header text-center">Buscar</h5>
					<div class="card-body">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar por ...">
							<span class="input-group-btn">
								<button class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div> <!-- Cierra input-group -->
					</div> <!-- Cierra card-body -->
					<!-- Categories Widget -->
					<div class="card my-4">
						<h5 class="card-header text-center">Categorias</h5>
						<div class="card-body">
							<div class="row">
								<select class="form-control text-center" id="tema">
									<option value="a">Tema1</option>
									<option value="b">Tema2</option>
									<option value="c">Tema3</option>
									<option value="d">Tema4</option>
								</select>
							</div> <!-- cierra la clase row -->
						</div> <!-- cierra el card-body -->
					</div> <!-- cierra el card my-4 -->
					<!-- Side Widget -->
					<div class="card my-4">
						<h5 class="card-header text-center">Año de Enseñanza</h5>
						<div class="card-body">
							<div class="row">

								<div class="col-md-6">
									<ul class="list-unstyled mb-0 text-center">
										<li><input type="checkbox" id="uno" value="primero"><a> 1° Año</a></li>
										<li><input type="checkbox" id="dos" value="segundo"><a> 2° Año</a></li>
										<li><input type="checkbox" id="tres" value="tercero"><a> 3° Año</a></li>
									</ul>
								</div> <!-- cierra el col -->

								<div class="col-md-6">
									<ul class="list-unstyled mb-0 text-center">
										<li><input type="checkbox" id="cuatro" value="cuarto"><a> 4° Año</a></li>
										<li><input type="checkbox" id="cinco" value="quinto"><a> 5° Año</a></li>
										<li><input type="checkbox" id="seis" value="sexto"><a> 6° Año</a></li>
									</ul>
								</div> <!-- cierra el col -->
							</div> <!-- cierra el row -->
						</div> <!-- cierra el card body -->
					</div> <!-- cierra el card my-4 -->
					<div class="card-body">
						<div class="col-md-5 mx-auto">
							<button type="button" class="btn btn-success" id="envio">Enviar</button>
						</div>
					</div>
				</div> <!-- Cierra card md-3 -->
			</div> <!-- cierra el col-my-3 -->
		</div> <!-- cierra el col-md-3 -->

		<!-- Aca comienza los recursos -->
		<div class="col-md-9">
			<!-- recurso 1 -->
			<?php $i=0; foreach ($results as $data) {
    if ($i%3==0) {//Inicia el nuevo row
       if($i!=0){
		?></div>

	   <?php } ?>
			<div class="row"><?php
    } ?>
				<div class="col-md-4 area">
					<div class="card h-100">
						<!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
						<div class="card-body">
							<h4 class="card-title">
								<a href="#"><?php echo $data->titulo; ?></a>
							</h4>
							<p class="card-text"><?php echo $data->descripcion; ?>
							</p>
						</div> <!-- cierra el card body-->
						<div class="card-footer recurso">
							<a href="<?php echo base_url()."area/recurso"; ?>"
							 class="btn btn-success">Ver Recurso</a>
						</div> <!-- cierrala clase recurso -->
					</div> <!-- cierrala clase card h-100 -->
				</div> <!-- cierrala clase area -->




			


			<?php
        $i++;
}?>
			<div class="row">
				<div class="offset-md-7"><?php echo $links;?>
				</div>
			</div>
		</div>
		<!-- cierra col-md-9 -->







		<!-- Pagination -->
	</div> <!-- cierra el row -->
</div> <!-- container fluid cierra los recursos -->