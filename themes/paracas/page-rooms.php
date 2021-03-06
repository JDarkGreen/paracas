<?php /* Template Name: Página Habitaciones Plantilla */ ?>

<!-- Header -->
<?php get_header(); $options = get_option('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Seccion General -->
<section class="pageRooms">
	
	<div class="container">
		<div class="row">

			<!-- Articulo Principal -->
			<main class="col-xs-12 col-md-8">
				<article class="mainRooms__article">

					<!-- Botoneras -->
					<section class="mainRooms__buttons text-xs-center text-md-left">
						<?php //Obtener los nombres y enlaces de las habitaciones  
							$args = array(
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
								'post_status'    => 'publish',
								'post_type'      => 'habitacion',
								'posts_per_page' => -1,
							);
							$rooms = get_posts( $args );
							//Obtener el Primer Elemento 
							$first_room = $rooms[0]; #var_dump($first_room);
							//variable de control 
							$i = 0; 
							if( !empty($rooms) ) : foreach( $rooms as $room ) :
						?> <!-- Botones -->
						<a href="<?= get_permalink($room->ID); ?>" class="<?= $i == 0 ? 'active' : '' ?>"><?php _e( $room->post_title , LANG ); ?></a>
						<?php $i++; endforeach; endif; ?>
					</section><!-- /. -->

					<!-- Titúlo Principal  --> <h2 class="titleDescriptionSection"><?php _e( $first_room->post_title , LANG ); ?></h2>

					<!-- Galería de Primer Elemento -->
					<div class="relative">
						<?php  
							/*
							*  Wrapper o Contenedor
							*  Attributos disponible 
							* data-items , data-items-responsive , data-margins , data-dots
							*/
						?>
						<div id="carousel-single-room" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="true" >
							<!-- Obtener todas las habitaciones -->
							<?php  
								$input_ids_img  = get_post_meta($first_room->ID, 'imageurls_'.$first_room->ID , true);
								//convertir en arreglo
								$input_ids_img  = explode(',', $input_ids_img ); 

								//Hacer loop por cada item de arreglo
								foreach ( $input_ids_img as $item_img ) : 
									//Si es diferente de null o tiene elementos
									if( !empty($item_img) ) : 
									//Conseguir todos los datos de este item
									$item = get_post( $item_img  ); 
							?> <!-- Artículo -->
								<article class="item-room relative">
									<!-- Imagen -->
									<figure><img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
								</article> <!-- /.item-tour -->

							<?php endif; endforeach; ?>
						</div> <!-- /.section__rooms_gallery -->

						<!-- Flechas  -->
						
						<!-- Indicadores -->
						<section class="gallery_indicators">
							<?php 
								//variable de control 
								$k = 0;
								foreach ( $input_ids_img as $item_img ) : 
								//Si es diferente de null o tiene elementos
								if( !empty($item_img) ) : 
								//Conseguir todos los datos de este item
								$item = get_post( $item_img  ); 
							?> <a href="#" class="gallery_indicator js-carousel-indicator" data-slider="carousel-single-room" data-to="<?= $k ?>">
								<img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
							</a>
							<?php $k++; endif; endforeach; ?>
						</section> <!-- /.gallery_indicators -->

					</div> <!-- /.relative -->	

					<!-- Contenido de Primer Elemento - Texto -->
					<div class="text-justify">
						<?php if( !empty( $first_room->post_content ) ) : 
							echo apply_filters('the_content', __( $first_room->post_content , LANG ) );
							else : 
						?>
						<p><?php _e( "Estamos actualizando este contenido gracias por su preferencia." , LANG ); ?></p>
						<?php endif; ?>
					</div> <!-- /.text-justify -->	

					<!-- Sección Beneficios -->
					<section class="pageInicio__benefits">
						<div class="container">
							<!-- Titulo de Sección --> <h2 class="titleDescriptionSection text-uppercase text-xs-center">
							<span><?php _e('beneficios del hotel' , LANG ); ?></span></h2>

							<!-- Incluir Sección Beneficios de Hotel -->
							<?php include(locate_template("partials/section-hotel-benefits.php") ); ?>

						</div> <!-- /.container -->	
					</section> <!-- /.pageInicio__benefits -->				

				</article> <!-- /. -->
			</main> <!-- /.col-xs-12 -->

			<!-- Sidebar  Ocultar en mobile -->
			<aside class="col-md-4 hidden-xs-down">

				<!-- Primera publicidad barra lateral  -->
				<?php if ( is_active_sidebar( 'sidebar-publicidad-hotel' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-publicidad-hotel' ); ?>
				<?php else: __("Actualizando contenido" , LANG ) ; endif; ?>				

				<!-- Segunda publicidad barra lateral  -->
				<?php if ( is_active_sidebar( 'sidebar-publicidad2-hotel' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-publicidad2-hotel' ); ?>
				<?php else: __("Actualizando contenido" , LANG ) ; endif; ?>

				<!-- Sección Facebook -->
				<?php
					if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) :
					include( locate_template("partials/section-facebook.php") );
					else: ?>
					<p class="text-xs-center">Opcion no habilitada temporalmente</p>
				<?php endif; ?>	

				<!-- Salto de Linea --> 
				<p></p>				

			</aside> <!-- /.col-md-4 hidden-xs-down -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->

</section> <!-- /.pageRooms -->

<!-- Footer -->
<?php get_footer(); ?>