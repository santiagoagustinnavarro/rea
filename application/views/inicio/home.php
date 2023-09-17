<?php if(!$this->session->iniciada || strtolower($this->session->rol=="profesor")){?>
    <!-- /.box-header -->
  	<div class="box box-body">
  		<br/>
		<div class="row">
			<div class="col-md-9">
				<div class="carousel slide" data-ride="carousel" id="carousel">
					<div class="carousel-inner" id="carousel">
							<!-- El carrusel de imagenes -->
  						<ol class="carousel-indicators">
  							<li data-target="#carousel" data-slide-to="0" class="active"></li>
				    		<li data-target="#carousel" data-slide-to="1"></li>
							<li data-target="#carousel" data-slide-to="2"></li>
							<li data-target="#carousel" data-slide-to="3"></li>
							<li data-target="#carousel" data-slide-to="4"></li>
							<li data-target="#carousel" data-slide-to="5"></li>
	  					</ol>
						<div class="item active">
							<img class="d-block w-100" src="<?php echo base_url(); ?>assets/estilo/imagenes/1.png" alt="Recursos Educativos Abiertos">
						</div> <!-- cierra la imagen 1 de carousel -->
						<div class="item">
							<img class="d-block w-100" src="<?php echo base_url(); ?>assets/estilo/imagenes/2.png" alt="Es una plataforma educativa">
						</div> <!-- cierra la imagen 2 de carousel -->
						<div class="item">
							<img class="d-block w-100" src="<?php echo base_url(); ?>assets/estilo/imagenes/3.png" alt="Para integrar en las escuelas secundarias">
						</div> <!-- cierra la imagen 3 de carousel -->
						<div class="item">
							<img class="d-block w-100" src="<?php echo base_url(); ?>assets/estilo/imagenes/4.png" alt="Brindar herramientas a los adolescentes">
  						</div> <!-- cierra la imagen 4 de carousel -->
						<div class="item">
  	  						<img class="d-block w-100" src="<?php echo base_url(); ?>assets/estilo/imagenes/5.png" alt="En esta pagina es de ambito colaborativo">
  						</div> <!-- cierra la imagen 5 de carousel -->
						<div class="item">
    						<img class="d-block w-100" src="<?php echo base_url(); ?>assets/estilo/imagenes/6.png" alt="Se puede descargar, comentar, valorar y intercambiar informacion">
    					</div> <!-- cierra la imagen 6 de carousel -->
					</div> <!-- cierra las imagenes de carousel -->
						<!-- anterior -->
					<a class="left carousel-control" href="#carousel" data-slide="prev">
						<span class="fa fa-angle-left"></span>
					</a>
						<!-- siguiente -->
					<a class="right carousel-control" href="#carousel" data-slide="next">
						<span class="fa fa-angle-right"></span>
    				</a> <!-- cierra de carousel-slide -->
				</div>
			</div> <!-- /.col-md-8 -->
			<br/>
			<div class="col-md-3">
		 		<!-- PRODUCT LIST -->
		 		<div class="box box-primary">
            		<div class="box-header with-border">
            			<h3 class="box-title">Recursos mejor valorados</h3>
            			<div class="box-tools pull-right">
                			<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                			</button> -->
    	          		</div>
        	    	</div><!-- /.box-header -->
            		<div class="box-body">
            			<ul class="products-list product-list-in-box">
						   <?php 
                           foreach ($ranking as $unElemento) {
                               ?> 
						   <li class="item">
                  				<div class="product-info">
                    				<a href="recurso/view/<?php echo $unElemento["idRecurso"];?>" class="product-title"> <?php echo $unElemento["titulo"];?></a>
                	    			<span class="product-description">
										  <?php echo substr($unElemento["descripcion"],0,50)."<a href='recurso/view/".$unElemento["idRecurso"]."'><br/>Leer mas...</a>"; 
										  ?>
                        			</span>
                  				</div>
            	    		</li> <!-- /.item -->
							<?php
                           }
							?>
              			</ul>
            		</div> <!-- /.box-body -->
            		<div class="box-footer text-center">
              			<a href="<?php echo base_url()?>recurso/listar" class="uppercase">Todos los Recursos</a>
            		</div> <!-- /.box-footer -->
        	  	</div> <!-- /.box -->
        	</div> <!-- /.col-md-4 -->
    	</div> <!-- /.row -->
		<br/>
  	</div> <!-- /.box-body -->
<?php 
}elseif(strtolower($this->session->rol=="administrador de usuarios")){
	redirect("usuario");
}elseif(strtolower($this->session->rol=="administrador de recursos")){
	redirect("recurso");
}elseif(strtolower($this->session->rol=="super administrador")){
	redirect("usuario/listaAdmin");}
?>
