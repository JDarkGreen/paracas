<?php  

/* archivo que contiene los sidebar del tema en cuestion */

/***********************************************************************************************/
/* Agregando nuevos SIDEBARS y secciones para widgets */
/***********************************************************************************************/	

if (function_exists('register_sidebar') ) {
	register_sidebar(
		array(
			'name'          => __('Header Lenguaje Sidebar', LANG ),
			'id'            => 'header-language',
			'description'   => __('Sidebar colocar widgets de lenguaje', LANG ),
			'before_widget' => '<div class="sidebar-widget-header">',
			'after_widget'  => '</div> <!-- end sidebar-widget-header -->',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);	
	//+SIDEBAR DE BENEFICIOS DE HOTEL EN EL HOME
	register_sidebar(
		array(
			'name'          => __('Beneficios Hotel Sidebar', LANG ),
			'id'            => 'sidebar-benefits-hotel',
			'description'   => __('Beneficios Hotel Sidebar: Contiene los befenicios de Hotel', LANG ),
			'before_widget' => '<div class="sidebar-widget-header">',
			'after_widget'  => '</div> <!-- end sidebar-widget-header -->',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);	
}






?>