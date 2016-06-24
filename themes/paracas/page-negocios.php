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
<section class="pageNegocios">
	
	<div class="container">
		<div class="row">

			<!-- Articulo Principal -->
			<main class="col-xs-12 col-md-8">
				<article class="pageNegocios__article">

					<!-- Titulo --> <h2 class="titleDescriptionSection"><?php _e( $post->post_title , LANG ); ?></h2>

					<!-- Imagen Destacada -->
					<figure>
						<?php if( has_post_thumbnail( $post->ID ) ) : ?>
							<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid') ); ?>	
						<?php endif; ?>	
					</figure>

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
				<?php if ( is_active_sidebar( 'sidebar-publicidad-hotel' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-publicidad-hotel' ); ?>
				<?php else: __("Actualizando contenido" , LANG ) ; endif; ?>

				<!-- Sección Facebook -->
				<?php
					if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) :
				?>
					<section class="container__facebook">
						
						<!-- Titulo -->
						<h2 class="titleWidget text-uppercase"><?php _e( "Facebook", LANG ); ?></h2>			
			
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

			</aside> <!-- /.col-md-4 hidden-xs-down -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->

</section> <!-- /.pageRooms -->

<!-- Footer -->
<?php get_footer(); ?>