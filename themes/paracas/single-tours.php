<?php /* Archivo Single De cada Paquete */ ?>

<!-- Header -->
<?php get_header(); $options = get_option('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - Single Tour - Paquete
	$page   = get_page_by_title("tour");
	$banner = $page;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Seccion General -->
<section class="pageWrapper">
	
	<div class="container">
		<div class="row">

			<!-- Articulo Principal -->
			<main class="col-xs-12 col-md-8">

				<?php  
					/* Vamos a obtener todos los paquetes de tour y seleccionaremos el primero*/
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'tours',
						'posts_per_page' => -1,
					);
					$tours = get_posts( $args );
				?>

				<article class="pageWrapper__article">

					<!-- Titulo --> <h2 class="titleDescriptionSection"><?php _e( $post->post_title , LANG ); ?></h2>

					<!-- Galería de Primer Elemento -->
					<div class="relative">
						<?php  
							/*
							*  Wrapper o Contenedor
							*  Attributos disponible 
							* data-items , data-items-responsive , data-margins , data-dots
							*/
						?>
						<div id="carousel-tour" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="false" >
							<!-- Obtener todas los tours -->
							<?php  
								$input_ids_img  = get_post_meta( $post->ID , 'imageurls_'.$post->ID , true);
								//convertir en arreglo
								$input_ids_img  = explode(',', $input_ids_img ); 

								//remover todos los numeros negativos
								$eliminar_array = array("-1");

								//obtener nuevo array filtrado
								$input_ids_img = array_diff( $input_ids_img , $eliminar_array );

								//Hacer loop por cada item de arreglo
								foreach ( $input_ids_img as $item_img ) : 
									//Si es diferente de null o tiene elementos
									if( !empty($item_img) ) : 
									//Conseguir todos los datos de este item
									$item = get_post( $item_img  ); 
							?> <!-- Artículo -->
								<article class="item-tour relative">
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
							?> <a href="#" class="gallery_indicator js-carousel-indicator" data-slider="carousel-tour" data-to="<?= $k ?>">
								<img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
							</a>
							<?php $k++; endif; endforeach; ?>
						</section> <!-- /.gallery_indicators -->

					</div> <!-- /.relative -->	

					<!-- Contenido de Primer Elemento - Texto -->
					<div class="text-justify">
						<?php if( !empty( $post->post_content ) ) : 
							echo apply_filters('the_content', __( $post->post_content , LANG ) );
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

				<!-- Sección de Paquetes e Items -->
				<section class="sectionLinks__sidebar">
					<!-- Titulo --> <h2 class="text-capitalize"><?php _e( "Paquetes" , LANG ); ?></h2>
					<!-- Extraemos todos los paquetes -->
					<?php foreach( $tours as $tour ) : 	
					?>
						<a href="<?= get_permalink( $tour->ID ); ?>" class="link-to-item <?= $post->ID == $tour->ID ? 'active' : '' ?>"><?php _e( $tour->post_title , LANG  ); ?></a>
					<?php endforeach; ?>
				</section> <!-- /.sectionLinks__sidebar -->

				<?php if ( is_active_sidebar( 'sidebar-publicidad-hotel' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-publicidad-hotel' ); ?>
				<?php else: __("Actualizando contenido" , LANG ) ; endif; ?>

				<!-- Sección Facebook -->
				<?php
					if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) :
					include( locate_template("partials/section-facebook.php") );
					else: ?>
					<p class="text-xs-center">Opcion no habilitada temporalmente</p>
				<?php endif; ?>	

				<!-- Separador -->
				<p></p>			

			</aside> <!-- /.col-md-4 hidden-xs-down -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->

</section> <!-- /.pageRooms -->

<!-- Footer -->
<?php get_footer(); ?>