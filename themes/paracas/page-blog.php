<?php /* Template Name: Página Negocios y Ambientes Plantilla */ ?>

<!-- Header -->
<?php get_header(); $options = get_option('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Seccion General -->
<section class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row">

			<!-- Articulo Principal -->
			<main class="col-xs-12 col-md-8">

				<?php 

					/* Extraer todas las categorías padre */  
					$categorias = get_categories( array(
						'orderby' => 'name' , 'parent' => 0,
					) );

					/* Extraer la primera categoría */
					$first_cat = !empty($categorias[0]) ? $categorias[0] : $categorias[1];

					/* Vamos a obtener todos los paquetes de tour y seleccionaremos el primero*/
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'publish',
						'post_type'      => 'post',
						'posts_per_page' => -1,
						'category_name'  => $first_cat->slug,
					);
					$articulos = get_posts( $args );
					if( !empty( $articulos ) ) : 
				?>

				<article class="pageWrapper__article">

					<!-- Titulo --> <h2 class="titleDescriptionSection"><?php _e( "Artículos de Interés" , LANG ); ?></h2>

					<!-- Items de Artículos -->
					<div class="row">
						<?php $i = 0; foreach( $articulos as $articulo ) : ?>

							<article class="item-preview-post col-xs-6">

								<!-- Imagen Destacada --> <figure> 
								<?php if( has_post_thumbnail( $articulo->ID ) ) : 
									echo get_the_post_thumbnail( $articulo->ID , 'full' , array('class' => 'img-fluid imgNotBlur' ) );
									endif;
								?>
								</figure> <!-- /.fin imagen -->

								<!-- Titulo --> <h2 class="text-capitalize"><?php _e( $articulo->post_title , LANG ); ?></h2>
								<!-- Extracto --> <div class="text-justify"> <?= apply_filters('the_content' , wp_trim_words( $articulo->post_content , 30 , '...' ) ); ?></div>

								<!-- Seccion compartir y botón -->
								<div class="">
									<!-- Botón  --> <a href="<?= get_permalink( $articulo->ID ); ?>" class="btnCommon__show-more btnCommon__show-more--rojo text-uppercase pull-right"> <?php _e( 'ver más' , LANG  );  ?> </a>
								</div> <!-- /. -->

								<!-- Limpiar floats --> <div class="clearfix"></div>

								<!-- Enviar Permalink -->
								<?php $the_link_share = get_permalink( $articulo->ID ); ?>

								<!-- Sección Compartir en Redes Sociales -->
								<?php include( locate_template("partials/section-share-type-post.php") ); ?>

							</article> <!-- /.item-preview-post -->

							<!-- Linea Separadora -->
							<?php if( $i % 2 != 0 ) : ?>
								<!-- Limpiar floats --> <div class="clearfix"></div>
								<div id="separator-line"></div>
							<?php endif; ?>

						<?php $i++; endforeach; ?>
					</div> <!-- /.row -->	

				</article> <!-- /. -->

				<?php endif; ?>
			</main> <!-- /.col-xs-12 -->

			<!-- Sidebar  Ocultar en mobile -->
			<aside class="col-md-4 hidden-xs-down">
				
				<!-- Sección de Categorías -->
				<section class="sectionLinks__sidebar">
					<!-- Titulo --> <h2 class="text-capitalize"><?php _e( "Categorías" , LANG ); ?></h2>

					<?php foreach( $categorias as $categoria ) : ?>
						<a href="<?= get_term_link( $categoria ); ?>" class="link-to-item <?= $first_cat->term_id == $categoria->term_id ? 'active' : '' ?>"><?php _e( $categoria->name , LANG  ); ?></a>
					<?php endforeach; ?>

				</section> <!-- /.sectionLinks__sidebar -->
				
				<!-- Sidebar Activo -->
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

				<!-- Separador --> <p></p>			

			</aside> <!-- /.col-md-4 hidden-xs-down -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->

</section> <!-- /.pageRooms -->

<!-- Footer -->
<?php get_footer(); ?>