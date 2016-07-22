
<!-- Extraer opciones  -->
<?php $options = get_option('theme_custom_settings'); ?>
	
	<!-- Footer -->
	<footer class="mainFooter">
		<div class="container">
			<div class="row">
				<!-- Item Footer -->
				<div class="col-xs-12 col-md-3">
					<div class="mainFooter__item">
						<!-- Logo -->
						<h1 class="">
							<a href="<?= site_url() ?>">
								<img src="<?= IMAGES ?>/logo_blanco__paracas_sunset_lima.png" alt="logo_blanco__paracas_sunset_lima" class="img-fluid center-block" />
							</a>
						</h1> <!-- /.lgoo -->
						<!-- Titulo -->
						<h2 class="mainFooter__subtitle text-uppercase text-xs-center">www.paracassunset.com</h2>
					</div> <!-- /.mainFooter__item -->
				</div> <!-- /.col-xs-12 col-md-3 -->

				<!-- Item Footer -->
				<div class="col-xs-12 col-md-3">
					<div class="mainFooter__item">
						<!-- Titulo -->
						<h2 class="mainFooter__subtitle text-uppercase text-xs-center"><?php _e('contacto' , LANG ); ?></h2>

						<!-- Contenido Lista Datos -->
						<ul class="mainFooter__list-data">

							<!-- Ubicación -->
							<?php if( isset($options['contact_address']) && !empty($options['contact_address']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-map-marker" aria-hidden="true"></i>
								<?= $options['contact_address']; ?> 
								</li>
							<?php endif; ?>

							<!-- Telefono -->
							<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-mobile" aria-hidden="true"></i>
								<?php 
									$numeros = $options['contact_tel'];
									$numeros = explode( "," , $numeros );
									foreach( $numeros as $numero => $value ) : 
								?> <p> <?= $value; ?></p>
								<?php endforeach; ?>

								<!-- Segundo Numero de teléfono recepcion -->
								<?php if( isset($options['contact_tel_2']) && !empty($options['contact_tel_2']) ) : ?>
									<p> <?= $options['contact_tel_2']; ?> </p>
								<?php endif; ?>
								</li>
							<?php endif; ?>

							<!-- Email -->
							<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-envelope" aria-hidden="true"></i>
									<?= $options['contact_email']; ?>
								</li>
							<?php endif; ?>

						</ul> <!-- /.mainFooter__list-data -->

					</div> <!-- /.mainFooter__item -->
				</div> <!-- /.col-xs-12 col-md-3 -->

				<!-- Item Footer -->
				<div class="col-xs-12 col-md-3">
					<div class="mainFooter__item text-xs-center">
						<!-- Titulo -->
						<h2 class="mainFooter__subtitle text-uppercase"><?php _e('horario de atención' , LANG ); ?></h2>
						<!-- Horarios de Atencion -->
						<?php 
							if( isset($options['theme_attention']) && !empty($options['theme_attention']) ) : echo apply_filters( 'the_content' ,$options['theme_attention'] );
							endif;
						?>
					</div> <!-- /.mainFooter__item -->
				</div> <!-- /.col-xs-12 col-md-3 -->

				<!-- Item Footer -->
				<div class="col-xs-12 col-md-3">
					<div class="mainFooter__item text-xs-center">
						<!-- Titulo -->
						<h2 class="mainFooter__subtitle text-uppercase"><?php _e('redes sociales' , LANG ); ?></h2>
						
						<!-- Redes Sociales -->
						<ul class="social-links">
							<!-- Facebook -->
							<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : ?>
								<li><a href="<?= $options['red_social_fb']; ?>">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a></li>
							<?php endif; ?>
							<!-- Twitter -->
							<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ): ?>
								<li><a href="<?= $options['red_social_twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<?php endif; ?>
							<!-- Youtube -->
							<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
								<li><a href="<?= $options['red_social_ytube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
							<?php endif; ?>
						</ul> <!-- /.social-links -->
					</div> <!-- /.mainFooter__item -->
				</div> <!-- /.col-xs-12 col-md-3 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
		
		<!-- Seccion Desarrolladora -->
		<div class="sectionDeveloper text-xs-center">
			<?= "&copy; ". date("Y") . " Derechos Reservados Paracas Sunset | Diseño"; ?>
			<a target="_blank" href="http://www.ingenioart.com/"> Ingenioart </a> 
		</div> <!-- /.sectionDeveloper -->

	</footer><!-- /.mainFooter -->

	</div> <!-- /#sb-slidebar -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>
</body>
</html>

