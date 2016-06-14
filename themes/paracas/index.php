
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
			<div id="carousel-rooms" class="section__rooms_gallery js-carousel-gallery" data-items="1">
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

	</div> <!-- /.container -->	
</section> <!-- /.pageInicio__benefits -->

<!-- Sección Bienvenida -->
<section class="pageInicio__welcome">
	<div class="container">
		<!-- Titulo de Sección --> <h2 class="titleSectionCommon text-uppercase text-xs-center">
		<span><?php _e('bienvenidos' , LANG ); ?></span></h2>

		<!-- Contenedor o Información -->
		<section class="pageInicio__welcome__content">
			<div class="row">
				<div class="col-xs-12">
					
				</div> <!-- /.col-xs-4 -->
				<div class="col-xs-12">
					<!-- Títulos --> <h3 class="pageInicio__welcome__title"> <?php _e('paracas sunset hotel' , LANG ); ?> <span></span> </h3>

					<!--  -->
				</div> <!-- /.col-xs-8 -->
			</div> <!-- /.row -->
		</section> <!-- /.pageInicio__welcome__content -->

	</div> <!-- /.container -->	
</section> <!-- /.pageInicio__welcome -->

<!-- Footer -->
<?php get_footer(); ?>