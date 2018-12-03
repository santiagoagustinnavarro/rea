<!-- Container fluid -->
<h2>Recurso</h2>
	<div class="row">
		<div class="col-md-3">
				<!-- Aca comienza las busquedas -->
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
				<div class="card my-4">
					<h5 class="card-header text-center">Categoria</h5>
					<div class="card-body">
						<div class="row">
							<select class="form-control text-center" id="categoria" name="categoria">
								<option value="" selected>Elija una opcion</option>
									<?php 
										foreach ($categoria as $unCat) {
    								?>
								<option value="<?php echo $unCat["nombre"]; ?>"><?php echo $unCat["nombre"];?>
								</option>
									<?php
										}
									?>
							</select>
						</div> <!-- cierra la clase row -->
					</div> <!-- cierra el card-body -->
				</div> <!-- cierra el card my-4 -->
				<div class="card my-4">
					<h5 class="card-header text-center">Tema</h5>
					<div class="card-body">
						<div class="row">
							<select class="form-control text-center" id="tema" name="tema" onchange="actualizarTema();">
								<option value="" selected>Elija una opcion</option>
									<?php 
										foreach ($temas as $unTema) {
    								?>
								<option value="<?php echo $unTema["nombre"]; ?>"><?php echo $unTema["nombre"];
									}?>
								</option>
							</select>
						</div> <!-- cierra la clase row -->
					</div> <!-- cierra la clase card-body -->
				</div> <!-- cierra la clase card my-4 -->
				<div class="card my-4">
					<h5 class="card-header text-center">Año de Enseñanza</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<ul class="list-unstyled mb-0 text-center">
									<?php
                                 		foreach ($niveles as $unNivel) {
                                    ?>
									<li><input type="checkbox" id="<?php echo $unNivel["nombre"]; ?>"
										value="<?php echo $unNivel["nombre"]; ?>"><span>
										<?php echo $unNivel["nombre"]; ?></span>
									</li>
									<?php
									}
									?>
								</ul>
							</div> <!-- cierra el col-md-6 -->
						</div> <!-- cierra el row -->
					</div> <!-- cierra el card body -->
				</div> <!-- cierra el card my-4 -->
			</div> <!-- Cierra card md-3 -->
		</div> <!-- cierra el col-md-3 -->
	</div> <!-- cierra el row -->
	<div class="col-md-9">
		<?php
         if (count($results)>0) {
             generarFilas($results, $links, 3);
         }
         ?>
		<?php
        	/**
         	* Esta funcion genera las filas de los recursos donde $porFila sera la cantidad a mostrar por filas
         	* $results es el array de recursos
        	 */
 			function generarFilas($results, $links, $porFila){
     	?>
		<section class="blog-area section">
			<div class="container">
				<?php $i=1;
     				foreach ($results as $data) {
        				if (count($results)==1) {//Solo tiene un elemento ?>
				<div class="row">
					<div class="col-md-<?php echo 9/$porFila?> area">
						<div class="card h-100">
							<div class="single-post post-style-1">
								<div class="blog-image"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/marion-michele-330691.jpg" alt="Blog Image">
								</div>
								<a class="avatar" href="#"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/icons8-team-355979.jpg" alt="Profile Image"></a>
								<div class="blog-info">
									<h4 class="title"><a href="#"><b><?php echo $data->titulo; ?></b></a></h4>
									<ul class="post-footer">
										<li class="estrellas"></li><li><a href="#"><i class="ion-chatbubble"></i>6</a></li>	
									</ul>
								</div><!-- blog-info -->
							</div><!-- single-post -->
						</div><!-- card -->
					</div> <!-- cierrala clase area -->
				</div>
				<?php
         			} else {
            		if ($i%$porFila==0 && $i!=1 && $i!=count($results)) {//Ultimo elemento de la fila?>
					<div class="col-md-<?php echo 9/$porFila?> area">
						<div class="card h-100">
							<div class="single-post post-style-1">
								<div class="blog-image"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/marion-michele-330691.jpg" alt="Blog Image">
								</div>
								<a class="avatar" href="#"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/icons8-team-355979.jpg" alt="Profile Image"></a>
								<div class="blog-info">
									<h4 class="title"><a href="#"><b><?php echo $data->titulo; ?></b></a></h4>
									<ul class="post-footer">
										<li class="estrellas"></li><li><a href="#"><i class="ion-chatbubble"></i>6</a></li>	
									</ul>
								</div><!-- blog-info -->
							</div><!-- single-post -->
						</div><!-- card -->
					</div> <!-- cierrala clase area -->
				</div>
				<div class="row">
					<?php
            			} elseif ($i==1) {//Primer elemento
        			?>
				<div class="row">
					<div class="col-md-<?php echo 9/$porFila?> area">
						<div class="card h-100">
							<div class="single-post post-style-1">
								<div class="blog-image"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/marion-michele-330691.jpg" alt="Blog Image">
								</div>
								<a class="avatar" href="#"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/icons8-team-355979.jpg" alt="Profile Image"></a>
								<div class="blog-info">
									<h4 class="title"><a href="#"><b><?php echo $data->titulo; ?></b></a></h4>
									<ul class="post-footer">
										<li class="estrellas"></li><li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									</ul>
								</div><!-- blog-info -->
							</div><!-- single-post -->
						</div><!-- card -->
					</div> <!-- cierra la clase area -->
				</div> <!-- cierra la clase area -->
						<?php
            			 	} elseif ($i==count($results)) {//Ultimo elemento
            			?>
						<div class="col-md-<?php echo 9/$porFila?> area">
							<div class="card h-100">
								<div class="single-post post-style-1">
									<div class="blog-image"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/marion-michele-330691.jpg" alt="Blog Image">
									</div>
									<a class="avatar" href="#"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/icons8-team-355979.jpg" alt="Profile Image"></a>
									<div class="blog-info">
										<h4 class="title"><a href="#"><b><?php echo $data->titulo; ?></b></a></h4>
										<ul class="post-footer">
											<li class="estrellas"></li><li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
										</ul>
									</div><!-- blog-info -->
								</div><!-- single-post -->
							</div><!-- card -->
						</div> <!-- cierrala clase area -->
				<?php
             		} else {
                ?>
				<div class="col-md-<?php echo 9/$porFila?> area">
					<div class="card h-100">
						<div class="single-post post-style-1">
							<div class="blog-image"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/marion-michele-330691.jpg" alt="Blog Image"></div>
								<a class="avatar" href="#"><img src="<?php echo base_url()."assets/"; ?>estilo/imagenes/icons8-team-355979.jpg" alt="Profile Image"></a>
								<div class="blog-info">
									<h4 class="title"><a href="#"><b><?php echo $data->titulo; ?></b></a></h4>
									<ul class="post-footer">
										<li class="estrellas"></li><li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									</ul>
								</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div> <!-- cierrala clase area --> 
			</section>
			<?php
            }
        	$i++;
		}//Fin else
	}//Fin foreach
	?>
			<div class="row">
				<div class="offset-md-5"><?php echo $links; ?>
	 			</div>
 			</div>
		</div>
	<?php
 		}//Fin funcion
 	?>
	<!-- cierra col-md-9 -->
	<!-- Pagination -->
</div>
<!-- cierra el row -->
<!-- container fluid cierra los recursos -->
<br/>
<br/>
