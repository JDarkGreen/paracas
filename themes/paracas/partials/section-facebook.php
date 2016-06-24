<?php /* Incluir seccion de facebook */ ?>
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

	<div class="fb-page" data-href="<?= $options['red_social_fb']; ?>" data-tabs="timeline" data-small-header="false" data-width="350" data-adapt-container-width="true" data-height="500" data-hide-cover="false" data-show-facepile="true">
	</div> <!-- /. fb-page-->
</section> <!-- /.container__facebook -->