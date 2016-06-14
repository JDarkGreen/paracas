<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
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
	<div class="mainHeader__container container-flex align-content">

		<!-- Icono Izquierda -->
		<div class="icon-header"> 
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
		<div class="icon-header"> 
			<i class="fa fa-bars" aria-hidden="true"></i> 
		</div> <!-- /.icon-header -->
	
	</div> <!-- /. -->
	

</header> <!-- /.mainHeader sb-slide -->


<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








