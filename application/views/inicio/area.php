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
			<div class="col-md-6 area">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Project One</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
      					<a href="<?php echo base_url()."area/recurso";?>" class="btn btn-success">Ver Recurso</a>
    				</div> <!-- cierrala clase recurso -->
				</div> <!-- cierrala clase card h-100 -->
			</div> <!-- cierrala clase area -->
				<!-- recurso 2 -->
			<div class="col-md-6 area">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Project Two</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit aliquam aperiam nulla perferendis dolor nobis numquam, rem expedita, aliquid optio, alias illum eaque. Non magni, voluptates quae, necessitatibus unde temporibus.</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
      					<a href="#" class="btn btn-success">Ver Recurso</a>
      				</div> <!-- cierra la clase recurso -->
				</div> <!-- cierra la clase card h-100 -->
			</div> <!-- cierra la clase area -->
				<!-- recurso 3 -->
			<div class="col-md-6 area">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Project Three</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso"> 
  	    				<a href="#" class="btn btn-success">Ver Recurso</a>
					</div> <!-- cierra la clase recurso-->
				</div> <!-- cierra la clase card h-100 -->
			</div> <!-- cierra la clase area -->
				<!-- recurso 4 -->
			<div class="col-md-6 area">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Project Four</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit aliquam aperiam nulla perferendis dolor nobis numquam, rem expedita, aliquid optio, alias illum eaque. Non magni, voluptates quae, necessitatibus unde temporibus.</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
    	  				<a href="#" class="btn btn-success">Ver Recurso</a>
      				</div> <!-- cierra la clase recurso -->
				</div> <!-- cierra la clase card h-100 -->
			</div> <!-- cierra la clase area -->
				<!-- recurso 5 -->
			<div class="col-md-6 area">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Project Five</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso"> 
  	    				<a href="#" class="btn btn-success">Ver Recurso</a>
					</div> <!-- cierra la clase recurso-->
				</div> <!-- cierra la clase card h-100 -->
			</div> <!-- cierra la clase area -->
				<!-- recurso 6 -->
			<div class="col-md-6 area">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Project Six</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit aliquam aperiam nulla perferendis dolor nobis numquam, rem expedita, aliquid optio, alias illum eaque. Non magni, voluptates quae, necessitatibus unde temporibus.</p>
					</div> <!-- cierra el card body-->
					<div class="card-footer recurso">
    	  				<a href="#" class="btn btn-success">Ver Recurso</a>
      				</div> <!-- cierra la clase recurso -->
				</div> <!-- cierra la clase card h-100 -->
			</div> <!-- cierra la clase area -->
		</div> <!-- cierra col-md-9 -->
	</div> <!-- cierra el row -->
		<!-- Pagination -->
	<div class="offset-0">
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Anterior">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Anterior</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">1</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">2</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">3</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Siguiente">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Siguiente</span>
				</a>
			</li>
		</ul>
	</div> <!-- cierra la paginacion -->
</div> <!-- container fluid cierra los recursos -->
