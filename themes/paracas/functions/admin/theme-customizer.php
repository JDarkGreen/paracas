<?php
global $wpdb;

/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Paracas Sunset Opciones', 'Paracas Sunset Opciones', 'edit_theme_options', 'customize.php');
}


/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'theme_customize_register');
function theme_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('theme_logo', array(
		'title' => __('Logo', LANG),
		'description' => __('Permite subir tu logo personalizado.', LANG),
		'priority' => 35
	));
	
	$wp_customize->add_setting('theme_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', LANG),
		'section' => 'theme_logo',
		'settings' => 'theme_custom_settings[logo]'
	)));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> MISION Y VISIÓN >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('theme_mision_vision', array(
		'title' => __('Historia Misión y Visión Empresa', LANG),
		'description' => __('Sección Misión y Visión Empresa', LANG),
		'priority' => 41
	));	
	/* HISTORIA */
	$wp_customize->add_setting('theme_custom_settings[text_historia]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[text_historia]', array(
		'label'    => __('Escribe el texto HISTORIA', LANG),
		'section'  => 'theme_mision_vision',
		'settings' => 'theme_custom_settings[text_historia]',
		'type'     => 'textarea'
	));	
	/* MISION */
	$wp_customize->add_setting('theme_custom_settings[text_mision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[text_mision]', array(
		'label'    => __('Escribe el texto MISIÓN', LANG),
		'section'  => 'theme_mision_vision',
		'settings' => 'theme_custom_settings[text_mision]',
		'type'     => 'textarea'
	));	
	/* VISION */
	$wp_customize->add_setting('theme_custom_settings[text_vision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[text_vision]', array(
		'label'    => __('Escribe el texto VISIÓN', LANG),
		'section'  => 'theme_mision_vision',
		'settings' => 'theme_custom_settings[text_vision]',
		'type'     => 'textarea'
	));	
	/* VALORES */
	$wp_customize->add_setting('theme_custom_settings[text_valores]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[text_valores]', array(
		'label'    => __('Escribe el texto VALORES', LANG),
		'section'  => 'theme_mision_vision',
		'settings' => 'theme_custom_settings[text_valores]',
		'type'     => 'textarea'
	));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('theme_redes_sociales', array(
		'title' => __('Redes Sociales', LANG),
		'description' => __('Sección Redes Sociales', LANG),
		'priority' => 41
	));	
	//facebook
	$wp_customize->add_setting('theme_custom_settings[red_social_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[red_social_fb]', array(
		'label'    => __('Coloca el link de facebook de la empresa', LANG),
		'section'  => 'theme_redes_sociales',
		'settings' => 'theme_custom_settings[red_social_fb]',
		'type'     => 'text'
	));
	//youtube
	$wp_customize->add_setting('theme_custom_settings[red_social_ytube]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[red_social_ytube]', array(
		'label'    => __('Coloca el link de youtube de la empresa', LANG),
		'section'  => 'theme_redes_sociales',
		'settings' => 'theme_custom_settings[red_social_ytube]',
		'type'     => 'text'
	));
	//twitter
	$wp_customize->add_setting('theme_custom_settings[red_social_twitter]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[red_social_twitter]', array(
		'label'    => __('Coloca el link de twitter de la empresa', LANG),
		'section'  => 'theme_redes_sociales',
		'settings' => 'theme_custom_settings[red_social_twitter]',
		'type'     => 'text'
	));
	//gmail
	$wp_customize->add_setting('theme_custom_settings[red_social_gmail]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('theme_custom_settings[red_social_gmail]', array(
		'label'    => __('Coloca el link de gmail de la empresa', LANG),
		'section'  => 'theme_redes_sociales',
		'settings' => 'theme_custom_settings[red_social_gmail]',
		'type'     => 'text'
	));

	
	// Contact Email
	$wp_customize->add_section('theme_contact_email', array(
		'title'       => __('Seccion Correos', LANG),
		'description' => __('Escribe el Correo Contacto Correspondiente', LANG),
		'priority'    => 37
	));
	
	//Email Principal
	$wp_customize->add_setting('theme_custom_settings[contact_email]', array(
		'default' => '',
		'type'    => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_email]', array(
		'label'    => __('Email Contacto', LANG),
		'section'  => 'theme_contact_email',
		'settings' => 'theme_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Email Gerente Comercial
	/*$wp_customize->add_setting('theme_custom_settings[contact_email_gerente]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_email_gerente]', array(
		'label'    => __('Email Gerente Comercial:', LANG),
		'section'  => 'theme_contact_email',
		'settings' => 'theme_custom_settings[contact_email_gerente]',
		'type'     => 'text'
	));

	//Email Administración documentaria
	$wp_customize->add_setting('theme_custom_settings[contact_email_admin_doc]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_email_admin_doc]', array(
		'label'    => __('Email Admnistración Documentaria:', LANG),
		'section'  => 'theme_contact_email',
		'settings' => 'theme_custom_settings[contact_email_admin_doc]',
		'type'     => 'text'
	)); */

	//Customizar celular
	$wp_customize->add_section('theme_contact_cel', array(
		'title' => __('Celulares de Contacto', LANG),
		'description' => __('Escribir números correspondientes', LANG),
		'priority' => 39
	));
	
	//CEL
	$wp_customize->add_setting('theme_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_cel]', array(
		'label'    => __('Celular: ', LANG),
		'section'  => 'theme_contact_cel',
		'settings' => 'theme_custom_settings[contact_cel]',
		'type'     => 'text'
	));	


	//Customizar telefono
	$wp_customize->add_section('theme_contact_tel', array(
		'title' => __('Telefono de Contacto', LANG),
		'description' => __('Telefono de Contacto', LANG),
		'priority' => 39
	));
	
	//Telefono 1 
	$wp_customize->add_setting('theme_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el o los números de teléfono [ NOTA: SEPARADOS POR COMAS ]', LANG),
		'section'  => 'theme_contact_tel',
		'settings' => 'theme_custom_settings[contact_tel]',
		'type'     => 'text'
	));	

	//Telefono 2 
	$wp_customize->add_setting('theme_custom_settings[contact_tel_2]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_tel_2]', array(
		'label'    => __('Escribe el o los números de teléfono [ RECEPCIÓN ]', LANG),
		'section'  => 'theme_contact_tel',
		'settings' => 'theme_custom_settings[contact_tel_2]',
		'type'     => 'text'
	));	


	//Customizar Direccion
	$wp_customize->add_section('theme_contact_address', array(
		'title' => __('Direccion de Contacto', LANG),
		'description' => __('Direccion de Contacto', LANG),
		'priority' => 40
	));
	
	/* Direccion */
	$wp_customize->add_setting('theme_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_address]', array(
		'label'    => __('Escribe la dirección del Contacto', LANG),
		'section'  => 'theme_contact_address',
		'settings' => 'theme_custom_settings[contact_address]',
		'type'     => 'textarea'
	));	

	//Customizar MAPA
	$wp_customize->add_section('theme_contact_mapa', array(
		'title' => __('Mapa de Contacto', LANG),
		'description' => __('Mapa de Contacto', LANG),
		'priority' => 41
	));
	
	//Ubicación
	$wp_customize->add_setting('theme_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa separados por coma', LANG),
		'section'  => 'theme_contact_mapa',
		'settings' => 'theme_custom_settings[contact_mapa]',
		'type'     => 'text'
	));	

	//Customizar Zoom de google maps
	$wp_customize->add_setting('theme_custom_settings[contact_mapa_zoom]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[contact_mapa_zoom]', array(
		'label'    => __('Establece el zoom de mapa por defecto 16', LANG),
		'section'  => 'theme_contact_mapa',
		'settings' => 'theme_custom_settings[contact_mapa_zoom]',
		'type'     => 'text'
	));		

	//Customizar WIDGET NOSOTROS
	$wp_customize->add_section('theme_widget_nosotros', array(
		'title' => __('Sección Nosotros', LANG),
		'description' => __('Sección Nosotros', LANG),
		'priority' => 40
	));
	
	//textarea
	$wp_customize->add_setting('theme_custom_settings[widget_nosotros]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[widget_nosotros]', array(
		'label'    => __('Texto en Sección Bienvenidos en el Home [ Nota SI ESTA ACTIVADO EL PLUGIN QTRANSLATE ] agregar [:es] antes de texto en español y para traducir este texto añade [:etiqueta_idioma] antes del texto por ejemplo [:en] para Inglés: ', LANG),
		'section'  => 'theme_widget_nosotros',
		'settings' => 'theme_custom_settings[widget_nosotros]',
		'type'     => 'textarea'
	));

	//imagen
	$wp_customize->add_setting('theme_custom_settings[image_nosotros]',array(
		'default' => '',
		'type'    => 'option'
	));
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_nosotros',array(
		'label'    => __('Imagen Nosotros', LANG),
		'section'  => 'theme_widget_nosotros',
		'settings' => 'theme_custom_settings[image_nosotros]',
	)));		

	/* SECCION BIENVENIDOS */
	$wp_customize->add_setting('theme_custom_settings[widget_welcome]', array(
		'default' =>  __('Bievenidos' , LANG ),
		'type'    => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[widget_welcome]', array(
		'label'    => __('Título Bievenida: ', LANG),
		'section'  => 'theme_widget_nosotros',
		'settings' => 'theme_custom_settings[widget_welcome]',
		'type'     => 'text'
	));

	//imagen
	$wp_customize->add_setting('theme_custom_settings[image_welcome]',array(
		'default' => '',
		'type'    => 'option'
	));
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_welcome',array(
		'label'    => __('Imagen Bievenida 1920x643:', LANG),
		'section'  => 'theme_widget_nosotros',
		'settings' => 'theme_custom_settings[image_welcome]',
	)));	


	//Customizar Horario de Atención
	$wp_customize->add_section('theme_attention', array(
		'title' => __('Horarios de Atención', LANG),
		'description' => __('Sección de Horarios de Atención', LANG),
		'priority' => 42
	));
	
	//Interbank
	$wp_customize->add_setting('theme_custom_settings[theme_attention]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('theme_custom_settings[theme_attention]', array(
		'label'    => __('Escribe el o los horarios de atención al cliente:', LANG),
		'section'  => 'theme_attention',
		'settings' => 'theme_custom_settings[theme_attention]',
		'type'     => 'textarea'
	));	


}	
?>