<?php if(!$this->session->iniciada ||strtolower($this->session->rol=="profesor")){?>
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
            			    <li class="item">
                	  			<div class="product-img">
                    				<img src="dist/img/default-50x50.gif" alt="Product Image">
                  				</div>
								<br/>
                  				<div class="product-info">
                    				<a href="javascript:void(0)" class="product-title">Samsung TV</a>
                	    			<span class="product-description">
                    	      			Samsung 32" 1080p 60Hz LED Smart HDTV.
                        			</span>
                  				</div>
            	    		</li> <!-- /.item -->
                			<li class="item">
                  				<div class="product-img">
                    				<img src="dist/img/default-50x50.gif" alt="Product Image">
                  				</div>
								  <br/>
                  				<div class="product-info">
                    				<a href="javascript:void(0)" class="product-title">Bicycle</a>
                   	 				<span class="product-description">
                    	      			26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    	    		</span>
                  				</div>
                			</li> <!-- /.item -->
    	            		<li class="item">
        	          			<div class="product-img">
            	        			<img src="dist/img/default-50x50.gif" alt="Product Image">
            	      			</div>
								  <br/>
            	      			<div class="product-info">
                	    			<a href="javascript:void(0)" class="product-title">Xbox One</a>
                    				<span class="product-description">
                          				Xbox One Console Bundle with Halo Master Chief Collection.
                        			</span>
                  				</div>
                			</li> <!-- /.item -->
                			<li class="item">
                  				<div class="product-img">
            	        			<img src="dist/img/default-50x50.gif" alt="Product Image">
                	  			</div>
								  <br/>
                  				<div class="product-info">
                   					<a href="javascript:void(0)" class="product-title">PlayStation 4</a>
                    				<span class="product-description">
                          				PlayStation 4 500GB Console (PS4)
                        			</span>
                  				</div>
                			</li> <!-- /.item -->
              			</ul>
            		</div> <!-- /.box-body -->
            		<div class="box-footer text-center">
              			<a href="javascript:void(0)" class="uppercase">View All Products</a>
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
	redirect("recurso");}
