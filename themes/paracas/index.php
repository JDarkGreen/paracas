
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('theme_custom_settings'); 
?>

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/content-banner.php'));
?>

<!-- Sección Habitaciones -->
<section class="pageInicio__rooms">
	<div class="container">
		<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center">
		<span><?php _e('habitaciones' , LANG ); ?></span></h2>

		<!-- Contenedor de Carousel De Habitaciones -->
		<div class="relative">
			<?php  
				/*
				*  Wrapper o Contenedor
				*  Attributos disponible 
				* data-items , data-items-responsive , data-margins , data-dots
				*/
			?>
			<div id="carousel-rooms" class="section__rooms_gallery js-carousel-gallery" data-items="1" data-items-responsive="3" data-margins="40">
				<!-- Obtener todas las habitaciones -->
				<?php  
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'habitacion',
						'posts_per_page' => -1,
					); 
					$rooms = get_posts( $args );
					foreach( $rooms as $room ) : 
				?> <!-- Artículo -->
					<article class="item-room text-xs-center text-uppercase">
						<?php if( has_post_thumbnail( $room->ID) ) : ?>
							<figure>
								<?= get_the_post_thumbnail( $room->ID , 'full', array('class'=>'img-fluid') ); ?>
							</figure>
						<?php endif; ?>
						<!-- titulo --> <h3><?php _e( $room->post_title , LANG ); ?></h3>
						<!-- Botón ver más --> <a href="" class="btnCommon__show-more btnCommon__show-more--turquesa text-uppercase"><?php _e('ver más' , LANG ); ?></a>
					</article> <!-- /.item-room -->
				<?php endforeach; ?>
			</div> <!-- /.section__rooms_gallery -->
			<!-- Flechas  -->

		</div> <!-- /.relative -->

	</div> <!-- /.container -->
</section> <!-- /.pageInicio__rooms -->

<!-- Sección Beneficios -->
<section class="pageInicio__benefits">
	<div class="container">
		<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center">
		<span><?php _e('beneficios del hotel' , LANG ); ?></span></h2>

		<!-- Incluir Sección Beneficios de Hotel -->
		<?php include(locate_template("partials/section-hotel-benefits.php") ); ?>

	</div> <!-- /.container -->	
</section> <!-- /.pageInicio__benefits -->

<!-- Sección Bienvenida -->
<section class="pageInicio__welcome">
	<div class="container">
		<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center">
		<span><?php _e( 'bienvenidos' , LANG ); ?></span></h2>

		<!-- Contenedor o Información -->
		<section class="pageInicio__welcome__content">
			<div class="row">
				<div class="col-xs-12 col-md-5">

					<!-- Imagen  -->
					<?php if( isset($options['image_nosotros']) && !empty($options['image_nosotros']) ) : ?>
						<img src="<?= $options['image_nosotros']; ?>" alt="paracas-sunset-item-peru" class="img-fluid" />
					<?php else:  ?>
						<img src="http://loremflickr.com/640/543" alt="paracas-sunset-item-peru" class="img-fluid" />
					<?php endif; ?>

					<!-- Salto de separacion solo en mobile --> <p class="hidden-sm-up"></p>
					
				</div> <!-- /.col-xs-4 -->
				<div class="col-xs-12 col-md-7">
					<!-- Títulos --> <h3 class="pageInicio__welcome__title"> <?php _e('paracas sunset hotel' , LANG ); ?> <span></span> </h3>

					<!-- Contenido  -->
					<div class="text-justify">
						<?php if( isset($options['widget_nosotros']) && !empty($options['widget_nosotros']) ) : 
							echo apply_filters('the_content' , __($options['widget_nosotros'] , LANG ) );
							else : echo __( 'Actualizando Contenido ' , LANG );
							endif; 
						?>
					</div> <!-- /.text-justify -->

					<!-- Botón Ver Más --> <a href="" class="btnCommon__show-more btnCommon__show-more--rojo text-uppercase pull-xs-left"> <?php _e('ver más' , LANG ) ?></a>

					<!-- Limpiar Floats --> <div class="clearfix"></div>
 
					<!--  -->
				</div> <!-- /.col-xs-8 -->
			</div> <!-- /.row -->
		</section> <!-- /.pageInicio__welcome__content -->

	</div> <!-- /.container -->	
</section> <!-- /.pageInicio__welcome -->

<!-- Sección Tour -->
<section class="pageInicio__tour">
	<div class="container">
		<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center">
		<span><?php _e('tour' , LANG ); ?></span></h2>

		<!-- Contenedor de Carousel De Tour -->
		<div class="relative">
			<?php  
				/*
				*  Wrapper o Contenedor
				*  Attributos disponible 
				* data-items , data-items-responsive , data-margins , data-dots
				*/
			?>
			<div id="carousel-tour" class="section__tour_gallery js-carousel-gallery" data-items="1" data-items-responsive="3" data-margins="20">
				<!-- Obtener todas las habitaciones -->
				<?php  
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'tour',
						'posts_per_page' => -1,
					); 
					$tours = get_posts( $args );
					foreach( $tours as $tour ) : 
				?> <!-- Artículo -->
					<article class="item-tour text-xs-center text-uppercase relative">
						<?php if( has_post_thumbnail( $tour->ID) ) : ?>
							<figure>
								<?= get_the_post_thumbnail( $tour->ID , 'full', array('class'=>'img-fluid imgNotBlur') ); ?>
							</figure>
						<?php endif; ?>

						<!-- Contenedor Texto Posicion Absoluta -->
						<div class="item-tour__content">
							<!-- titulo --> <h3><?php _e( $tour->post_title , LANG ); ?></h3>
							<!-- extracto --> <p> <?php _e( $tour->post_excerpt , LANG ); ?> </p>
							<!-- Botón ver más --> <a href="" class="btnCommon__show-more btnCommon__show-more--turquesa text-uppercase"><?php _e('ver más' , LANG ); ?></a>
						</div> <!-- /.item-tour__content -->

					</article> <!-- /.item-tour -->
				<?php endforeach; ?>
			</div> <!-- /.section__rooms_gallery -->
			<!-- Flechas  -->

		</div> <!-- /.relative -->		
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__tour -->

<!-- Sección Galerías -->
<section class="pageInicio__gallery">
	<div class="container">
		<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center">
		<span><?php _e('galerías' , LANG ); ?></span></h2>

		<div class="row">
			<!-- Obtener 4 fotos de la galería -->
			<?php  
				$args = array(
					'order'          => 'DESC',
					'orderby'        => 'date',
					'post_status'    => 'publish',
					'post_type'      => 'galery-images',
					'posts_per_page' => 4,
				); 
				$fotos = get_posts( $args );
				foreach( $fotos as $foto ) : 
			?> <!-- Artículo -->
				<div class="col-xs-12 col-md-3">
					<article class="item-gallery">
						<?php if( has_post_thumbnail( $foto->ID) ) : 
							/* Obtener url de imagen */
							$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $foto->ID ) );
						?>
							<figure>
								<a href="<?= $feat_img; ?>" class="gallery-fancybox" rel="group" >
									<?= get_the_post_thumbnail( $foto->ID , 'full', array('class'=>'img-fluid imgNotBlur') ); ?>
								</a>
							</figure>
						<?php endif; ?>
					</article> <!-- /.item-tour -->
				</div> <!-- /.col-xs-12 col-md-3 -->
			<?php endforeach;  ?>
		</div> <!-- /.row -->

		<!-- Botón Ver Más -->
		<br />
		<a href="" class="btnCommon__show-more btnCommon__show-more--turquesa text-uppercase">
			<?php _e('ver más' , LANG ) ?> </a>
		
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__gallery -->

<?php  
	/* Incluir Template de Banner de Servicios */
	include( locate_template("partials/banner-services.php") );
?>

<!-- Sección Misceláneo -->
<section class="pageInicio__miscelaneo">
	<div class="container">

		<div class="row">
			
			<!-- Sección de BLOG -->
			<section class="col-xs-12 col-md-8">
				<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center"> <span><?php _e('blog' , LANG ); ?></span></h2>

				<!-- Contenedor de Entradas de Blog -->
				<?php  
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'blog',
						'post_type'      => 'post',
						'posts_per_page' => 3,
					);
					$articulos = get_posts( $args );
					if( !empty($articulos) ) : foreach( $articulos as $articulo ) :
				?> <!-- Articulo -->
					<article class="item-blog">
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<figure>
									<?php if( has_post_thumbnail( $articulo->ID ) ) : 
										echo get_the_post_thumbnail( $articulo->ID , 'full' , array('class'=>'img-fluid imgNotBlur') );
									?>
									<?php endif; ?>
								</figure>
							</div> <!-- /.col-xs-4 -->
							<div class="col-xs-12 col-md-8">
								<!-- Titulo de Post --> <h3 class="text-capitalize"><?php _e( $articulo->post_title , LANG ); ?></h3>	
								<!-- Extracto de Post --> <div class="text-justify"> 
									<?= apply_filters('the_content' , wp_trim_words( $articulo->post_content , 40 , '' ) ); ?>
								</div>
								<!-- Botón Ver Más -->  <a href="<?= get_permalink( $articulo->ID ); ?>" class="pull-md-right btnCommon__show-more btnCommon__show-more--rojo text-uppercase"><?php _e( "ver más" , LANG ); ?></a>

								<!-- Limpiar Floats  --> <div class="clearfix"></div>
							</div> <!-- /.col-xs-8 -->
						</div> <!-- /.row -->
					</article> <!-- /.item-blog -->

				<?php endforeach; endif; ?>

			</section> <!-- /.col-xs-12 col-md-4 -->

			<!-- Sección FACEBOOK -->
			<section class="col-xs-12 col-md-4">
				<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center"> <span><?php _e('facebook' , LANG ); ?></span></h2>

				<!-- Facebook -->
				<?php
					if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) :
				?>
					<section class="container__facebook">
						<!-- Contebn -->
						<div id="fb-root" class=""></div>

						<!-- Script -->
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-page" data-href="<?= $options['red_social_fb']; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-height="500" data-hide-cover="false" data-show-facepile="true">
						</div> <!-- /. fb-page-->
					</section> <!-- /.container__facebook -->
				<?php else: ?>
					<p class="text-xs-center">Opcion no habilitada temporalmente</p>
				<?php endif; ?>

			</section> <!-- /.col-xs-12 col-md-4 -->

		</div> <!-- /.row -->
		
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__miscelaneo -->



<!-- Footer -->
<?php get_footer(); ?>