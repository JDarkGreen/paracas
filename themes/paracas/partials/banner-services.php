<?php /*Obtener página de Servicios*/ 
	$page_servicios = get_page_by_title('Servicios');
?>

<!-- Sección Común banner Servicios -->
<section class="sectionCommon__banner__services text-xs-center">
	<div class="container">
		<div class="container-flex align-content">
			<!-- figure --> <figure class="hidden-xs-down"><img src="<?= IMAGES ?>/icon/mariposa.png" alt="" class="img-fluid" /></figure>
			<!-- Titulo -->
			<h2 class=""><?php _e('Consulta más sobre nuestros servicios' , LANG ); ?></h2>
			<!-- Botón -->
			<a href="<?= get_permalink( $page_servicios->ID ); ?>" class="btnCommon__show-more btnCommon__show-more--small"><?php _e('click aquí' , LANG ); ?></a>
			<!-- figure --> <figure  class="hidden-xs-down"><img src="<?= IMAGES ?>/icon/mariposa.png" alt="" class="img-fluid" /></figure>
		</div> <!-- /.container-flex align-content -->
	</div> <!-- /.container -->
</section> <!-- /.sectionCommon__banner__services -->