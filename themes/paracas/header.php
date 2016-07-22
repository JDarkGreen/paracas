<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php 
		$options = get_option('theme_custom_settings'); 
		global $post;

		//Comprobar si esta desplegada la barra de Navegación
		$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
	?>

<!-- Header -->
<header class="mainHeader sb-slide">

	<!-- Contenedor Version Mobile -->
	<div class="mainHeader__container container-flex align-content hidden-sm-up">

		<!-- Icono Izquierda -->
		<div id="toggle-left-nav" class="icon-header"> 
			<i class="fa fa-bars" aria-hidden="true"></i> 
		</div> <!-- /.icon-header -->	

		<!-- Logo Principal -->
		<h1 class="logo">
			<a href="<?= site_url() ?>">
				<?php if( !empty($options['logo']) ) : ?>
					<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
				<?php else: ?>
					<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
				<?php endif; ?>
			</a>
		</h1> <!-- /.lgoo -->

		<!-- Icono Izquierda -->
		<div id="toggle-right-nav" class="icon-header"> 
			<i class="fa fa-bars" aria-hidden="true"></i> 
		</div> <!-- /.icon-header -->
	
	</div> <!-- /. -->

	<!-- Contenedor Version Desktop -->
	<div class="mainHeader__container hidden-xs-down relative">

		<!-- Barra de Información -->
		<section class="mainHeader__info container-flex align-content relative">

			<!-- Logo  Posicion Absoluta -->
			<h1 class="logo">
				<a href="<?= site_url() ?>">
					<?php if( !empty($options['logo']) ) : ?>
						<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
					<?php else: ?>
						<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
					<?php endif; ?>
				</a>
			</h1> <!-- /.logo -->
			
			<!-- Seccion  Solo de Informacion  -->
			<div class="mainHeader__info__content container-flex align-content">
				<!-- Titulo -->
				<h2 class="text-uppercase"><?php _e('reservas: ', LANG ); ?></h2>
				<!-- Teléfonos -->
				<?php 
					if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) :
					$numeros = $options['contact_tel']; 
					$numeros = explode(",", $numeros );
					/* Obtener el primero numero */
					echo "<p>" . $numeros[0] . "</p>";
					endif;  
				?>
				<!-- Email -->
				<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) :
				?>
				<h3><?= $options['contact_email']; ?></h3>
				<?php endif; ?>			
			</div> <!-- /.mainHeader__info__content -->	

			<!-- Lista de Redes Sociales -->
			<ul class="social-links social-links--gray">
				<!-- Facebook -->
				<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : ?>
					<li><a target="_blank" href="<?= $options['red_social_fb']; ?>">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a></li>
				<?php endif; ?>
				<!-- Twitter -->
				<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ): ?>
					<li><a target="_blank" href="<?= $options['red_social_twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
				<?php endif; ?>
				<!-- Youtube -->
				<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
					<li><a target="_blank" href="<?= $options['red_social_ytube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
				<?php endif; ?>
			</ul> <!-- /.social-links -->

			<!-- Seccion de SIDEBAR DE MULTILENGUAJE  -->
			<section class="">
				<?php if ( is_active_sidebar( 'header-language' ) ) : ?>
					<?php dynamic_sidebar( 'header-language' ); ?>
				<?php endif; ?>
			</section>

		</section> <!-- /.mainHeader__info container-flex -->
		
		<!--Menú de Navegación Principal -->
		<nav class="mainNavigation text-md-right">
			<?php wp_nav_menu(
				array(
					'menu_class'     => 'main-menu text-center',
					'theme_location' => 'main-menu'
				));
			?>			
		</nav> <!-- /.mainNavigation -->

		<!-- Widget de tiempo posición absoluta -->
		<?php if( is_page('inicio') || is_page('home') ) : ?>
			<section class="mainHeader__widget-time relative">
				<!-- Ciudad -->
				<span class="city text-uppercase">Paracas</span>
				<!-- www.TuTiempo.net - Ancho:452px - Alto:89px -->
				<div id="TT_RxjALxthYIA9dFsA7fzkEEEkk6u1TAflLYEd1cCIa1D"><a href="http://www.tutiempo.net">El tiempo por Tutiempo.net</a></div>
				<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_RxjALxthYIA9dFsA7fzkEEEkk6u1TAflLYEd1cCIa1D"></script>		
			</section> <!-- /.mainHeader__widget-time -->
		<?php endif; ?>
	
	</div> <!-- /.mainHeader__container hidden-xs-down -->

</header> <!-- /.mainHeader sb-slide -->

<!-- Contenedor Izquierda Version Mobile -->
<aside class="sb-slidebar sb-left sb-style-push">
	<!-- Navegación Principal -->
	<nav class="mainNavigation">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu text-center',
				'theme_location' => 'main-menu'
			));
		?>						
	</nav> <!-- /.mainNav -->  
</aside> <!-- /.sb-slidebar sb-left sb-style-push -->

<!-- Flecha Indicador hacia arriba -->
<a href="#" id="arrow-up-page"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








