<?php  

/* archivo muestra o contiene lois menus del tema en cuestion */

function register_my_menus(){
	register_nav_menus(
		array(
			'main-menu-left'  => __('Main Menu Left', LANG ),
			'main-menu-right' => __('Main Menu Right', LANG ),
		)
	);
}
add_action('init', 'register_my_menus');


?>