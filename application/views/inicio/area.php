<!-- Container fluid -->
<div class="container-fluid">
	<br />
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
									<option value="" selected>Elija una opcion</option>
									<?php foreach ($temas as $unTema) {
    ?>
									<option value="<?php echo $unTema["nombre"]; ?>"><?php echo $unTema["nombre"];
}?>
									</option>

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
										<?php
                                     
                                     foreach ($niveles as $unNivel) {
                                         ?>
										<li><input type="checkbox" id="<?php echo $unNivel["nombre"]; ?>"
											 value="<?php echo $unNivel["nombre"]; ?>"><span>
												<?php echo $unNivel["nombre"]; ?></span></li>


										<?php
                                     }?>
									</ul>
								</div> <!-- cierra el col -->


							</div> <!-- cierra el row -->
						</div> <!-- cierra el card body -->
					</div> <!-- cierra el card my-4 -->

				</div> <!-- Cierra card md-3 -->
			</div> <!-- cierra el col-my-3 -->
		</div> <!-- cierra el col-md-3 -->
	
	<div class="col-md-9">
		<?php
         if (count($results)>0) {
             generarFilas($results, $links, 2);
         }
         ?>



		<?php
        /**
         * Esta funcion genera las filas de los recursos donde $porFila sera la cantidad a mostrar por filas
         * $results es el array de recursos
         */
 function generarFilas($results, $links, $porFila)
 {
     ?>

		<?php $i=1;
		
     foreach ($results as $data) {
         if (count($results)==1) {//Solo tiene un elemento ?>
		<div class="row">
			<div class="col-md-<?php echo 12/$porFila?> area">
				<div class="card h-100">
					<!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
					<div class="card-body">
						<h4 class="card-title">
							<a href="#"><?php echo $data->titulo; ?></a>
						</h4>
						<p class="card-text"><?php echo $data->recursoDesc; ?>
						</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
						<a href="<?php echo base_url()."area/recurso"; ?>"
						 class="btn btn-success">Ver Recurso</a>
					</div> <!-- cierrala clase recurso -->
				</div> <!-- cierrala clase card h-100 -->
			</div> <!-- cierrala clase area -->
		</div>
		<?php
         } else {
             if ($i%$porFila==0 && $i!=1 && $i!=count($results)) {//Ultimo elemento de la fila?>
		<div class="col-md-<?php echo 12/$porFila?> area">
			<div class="card h-100">
				<!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
				<div class="card-body">
					<h4 class="card-title">
						<a href="#"><?php echo $data->titulo; ?></a>
					</h4>
					<p class="card-text"><?php echo $data->recursoDesc; ?>
					</p>
				</div> <!-- cierra el card body-->
				<div class="card-footer recurso">
					<a href="<?php echo base_url()."area/recurso"; ?>"
					 class="btn btn-success">Ver Recurso</a>
				</div> <!-- cierrala clase recurso -->
			</div> <!-- cierrala clase card h-100 -->
		</div> <!-- cierrala clase area -->
	</div>
	<div class="row">
		<?php
             } elseif ($i==1) {//Primer elemento
            ?>
		<div class="row">
			<div class="col-md-<?php echo 12/$porFila?> area">
				<div class="card h-100">
					<!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
					<div class="card-body">
						<h4 class="card-title">
							<a href="#"><?php echo $data->titulo; ?></a>
						</h4>
						<p class="card-text"><?php echo $data->recursoDesc; ?>
						</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
						<a href="<?php echo base_url()."area/recurso"; ?>"
						 class="btn btn-success">Ver Recurso</a>
					</div> <!-- cierrala clase recurso -->
				</div> <!-- cierrala clase card h-100 -->
			</div> <!-- cierrala clase area --><?php
             } elseif ($i==count($results)) {//Ultimo elemento
            ?>

			<div class="col-md-<?php echo 12/$porFila?> area">
				<div class="card h-100">
					<!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
					<div class="card-body">
						<h4 class="card-title">
							<a href="#"><?php echo $data->titulo; ?></a>
						</h4>
						<p class="card-text"><?php echo $data->recursoDesc; ?>
						</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
						<a href="<?php echo base_url()."area/recurso"; ?>"
						 class="btn btn-success">Ver Recurso</a>
					</div> <!-- cierrala clase recurso -->
				</div> <!-- cierrala clase card h-100 -->
			</div> <!-- cierrala clase area -->
		</div>
		<?php
             } else {
                 ?>
		<div class="col-md-<?php echo 12/$porFila?> area">
			<div class="card h-100">
				<!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
				<div class="card-body">
					<h4 class="card-title">
						<a href="#"><?php echo $data->titulo; ?></a>
					</h4>
					<p class="card-text"><?php echo $data->recursoDesc; ?>
					</p>
				</div> <!-- cierra el card body-->
				<div class="card-footer recurso">
					<a href="<?php echo base_url()."area/recurso"; ?>"
					 class="btn btn-success">Ver Recurso</a>
				</div> <!-- cierrala clase recurso -->
			</div> <!-- cierrala clase card h-100 -->
		</div> <!-- cierrala clase area --> <?php
             }
             $i++;
         }//Fin else
	 }//Fin foreach
	 ?><div class="row">
	 <div class="offset-md-5"><?php echo $links; ?>
	 </div>
 </div> <?php
	 if(count($results)!=1){
		?> </div><?php	 
	}?>

	 
	
	
	</div>
	<?php
 }//Fin funcion
 ?>

	<!-- cierra col-md-9 -->
	<!-- Pagination -->

</div>

<!-- cierra el row -->
<!-- container fluid cierra los recursos -->
<br />
<br />