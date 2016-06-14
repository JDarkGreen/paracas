<?php  

//Archivo que contiene todos los nuevos tipos creados en el tema

function create_post_type(){

	/*|>>>>>>>>>>>>>>>>>>>> BANNERS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels = array(
		'name'               => __('Banners'),
		'singular_name'      => __('Banner'),
		'add_new'            => __('Nuevo Banner'),
		'add_new_item'       => __('Agregar nuevo Banner'),
		'edit_item'          => __('Editar Banner'),
		'view_item'          => __('Ver Banner'),
		'search_items'       => __('Buscar Banners'),
		'not_found'          => __('Banner no encontrado'),
		'not_found_in_trash' => __('Banner no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => true,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-nametag',
	);

	/*|>>>>>>>>>>>>>>>>>>>> SERVICIOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels2 = array(
		'name'               => __('Servicios'),
		'singular_name'      => __('Servicio'),
		'add_new'            => __('Nuevo Servicio'),
		'add_new_item'       => __('Agregar nuevo Servicio'),
		'edit_item'          => __('Editar Servicio'),
		'view_item'          => __('Ver Servicio'),
		'search_items'       => __('Buscar Servicios'),
		'not_found'          => __('Servicio no encontrado'),
		'not_found_in_trash' => __('Servicio no encontrado en la papelera'),
	);

	$args2 = array(
		'labels'      => $labels2,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'taxonomies'  => array( 'servicio_category' , 'post_tag' ),
		'menu_icon'   => 'dashicons-exerpt-view',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> CLIENTES  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels3 = array(
		'name'               => __('Clientes'),
		'singular_name'      => __('Cliente'),
		'add_new'            => __('Nuevo Cliente'),
		'add_new_item'       => __('Agregar nuevo Cliente'),
		'edit_item'          => __('Editar Cliente'),
		'view_item'          => __('Ver Cliente'),
		'search_items'       => __('Buscar Clientes'),
		'not_found'          => __('Cliente no encontrado'),
		'not_found_in_trash' => __('Cliente no encontrado en la papelera'),
	);

	$args3 = array(
		'labels'      => $labels3,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-money',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> PROMOCIONES  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels6 = array(
		'name'               => __('Promociones'),
		'singular_name'      => __('Promoción'),
		'add_new'            => __('Nueva Promoción'),
		'add_new_item'       => __('Agregar nueva Promoción'),
		'edit_item'          => __('Editar Promoción'),
		'view_item'          => __('Ver Promoción'),
		'search_items'       => __('Buscar Promoción'),
		'not_found'          => __('Promoción no encontrada'),
		'not_found_in_trash' => __('Promoción no encontrada en la papelera'),
	);

	$args6 = array(
		'labels'      => $labels6,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-portfolio',
	);	
	
	/*|>>>>>>>>>>>>>>>>>>>> GALERÍA IMAGENES  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels8 = array(
		'name'               => __('Gal. Imágenes'),
		'singular_name'      => __('Imagen'),
		'add_new'            => __('Nueva Imagen'),
		'add_new_item'       => __('Agregar nueva Imagen'),
		'edit_item'          => __('Editar Imagen'),
		'view_item'          => __('Ver Imagen'),
		'search_items'       => __('Buscar Imagen'),
		'not_found'          => __('Imagen no encontrada'),
		'not_found_in_trash' => __('Imagen no encontrada en la papelera'),
	);

	$args8 = array(
		'labels'      => $labels8,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-images-alt2',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> GALERÍA VIDEOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels9 = array(
		'name'               => __('Gal. Videos'),
		'singular_name'      => __('Video'),
		'add_new'            => __('Nuevo Video'),
		'add_new_item'       => __('Agregar nuevo Video'),
		'edit_item'          => __('Editar Video'),
		'view_item'          => __('Ver Video'),
		'search_items'       => __('Buscar Video'),
		'not_found'          => __('Video no encontrado'),
		'not_found_in_trash' => __('Video no encontrado en la papelera'),
	);

	$args9 = array(
		'labels'      => $labels9,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-video-alt',
	);

	/*|>>>>>>>>>>>>>>>>>>>> HABITACIONES  <<<<<<<<<<<<<<<<<<<<<<<<<<<<|*/
	
	$labels10 = array(
		'name'               => __('Habitaciones'),
		'singular_name'      => __('Habitación'),
		'add_new'            => __('Nueva Habitación'),
		'add_new_item'       => __('Agregar nueva Habitación'),
		'edit_item'          => __('Editar Habitación'),
		'view_item'          => __('Ver Habitación'),
		'search_items'       => __('Buscar Habitación'),
		'not_found'          => __('Habitación no encontrada'),
		'not_found_in_trash' => __('Habitación no encontrada en la papelera'),
	);

	$args10 = array(
		'labels'      => $labels10,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-portfolio',
	);


	/*|>>>>>>>>>>>>>>>>>>>> REGISTRAR  <<<<<<<<<<<<<<<<<<<<|*/
	register_post_type( 'banner'   , $args  );
	register_post_type( 'servicio' , $args2 );
	register_post_type( 'cliente' , $args3 );
	register_post_type( 'promocion' , $args6 );
	register_post_type( 'galery-images' , $args8 );
	register_post_type( 'galery-videos' , $args9 );
	register_post_type( 'habitacion' , $args10 );

	flush_rewrite_rules();
}

add_action( 'init', 'create_post_type' );



?>