<?php  /* Archivo que permite el cambio de idioma gracias al plugin qtranslate */

$locale = qtrans_getLanguage();

//var_dump(THEMEROOT); exit;

//Cambiar el Idioma a Ingles
if ($locale == "en" )
{
	#var_dump(realpath( dirname(__FILE__) . "../../" ) . "/languages/en_US.mo" ) ; exit;
	load_textdomain( LANG , realpath( dirname(__FILE__) . "../../" ) . "/languages/en_US.mo"  );
}

?>