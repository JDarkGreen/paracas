'use strict';

var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

	j(document).on('ready',function(){

		/* Flecha Navegar Hacia arriba de la página */
		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			j("#arrow-up-page").on('click',function(e){
				e.preventDefault(); /* Detener evento por defecto */
				j('html,body').animate({
					scrollTop: 0
				}, 900 );
			});	
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  SLIDEBAR VERSION MOBILE  -----|*/
		/*|----------------------------------------------------------------------|*/

		var mySlidebars = new j.slidebars({
			disableOver       : 568, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false, // true or false
			siteClose         : true, // true or false
		});

		//Eventos

		//Abrir contenedor izquierda
		j("#toggle-left-nav").on('click',function(){
			mySlidebars.slidebars.toggle('left');
		});

		//Abrir contenedor derecha
		j("#toggle-right-nav").on('click',function(){
			mySlidebars.slidebars.toggle('right');
		});
		

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME LIBRERIA  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carouselHome = j("#carousel-home").carousel({ interval: 5000 , pause : "" });

		//Flechas de carousel Home
		j(".js-btn-carousel-home").on("click", function(e){ e.preventDefault(); });
		//Flecha Izquierda
		j("#arrowSliderHome--prev").on("click",function(){
			carouselHome.carousel('prev');
		});
		//Flecha Derecha
		j("#arrowSliderHome--next").on("click",function(){
			carouselHome.carousel('next');
		});

		//Eventos - al comenzar carousel
		carouselHome.on('slide.bs.carousel', function ( e ) {

			var currentItem = j(this).find('.active');
			// texto titulo
			var title = currentItem.find('h3');
			title.addClass('contract'); 			
			// texto parrafo
			var paragraph = currentItem.find('p');
			paragraph.addClass('flipInY').css('opacity',0);

		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  EVENTOS FLECHAS CAROUSEL COMUNES  -----|*/
		/*|----------------------------------------------------------------------|*/		
		j(".arrow__common-slider").on('click',function(e){ e.preventDefault(); });

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL ITEMS OWN CAROUSEL - SETEAR PARAMETROS   -----|*/
		/*|----------------------------------------------------------------------|*/		

		if( j(".js-carousel-gallery").length )
		{
			j(".js-carousel-gallery").each(function(){

				/* Carousel */
				var current = j(this);

				/* Valor de Items */
				var Items  = current.attr('data-items') !== null && typeof(current.attr('data-items') ) !== "undefined" ? current.attr('data-items') : 3;

				/* Valor de Items Responsive */
				var Itemsresponsive  = current.attr('data-items-responsive') !== "" && typeof(current.attr('data-items-responsive') ) !== "undefined" ? current.attr('data-items-responsive') : Items;

				/* Valor de Márgenes */
				var Margins = current.attr('data-margins') !== null && typeof(current.attr('data-margins') ) !== "undefined"  ? current.attr('data-margins') : 10;	

				/* Habilitar dots */
				var Dot = current.attr('data-dots') !== null && typeof(current.attr('data-dots') ) !== "undefined" ? current.attr('data-dots') : null;

				/* Generar el carousel */
				current.owlCarousel({
					autoplay       : true,
					autoplayTimeout: 2500,
					center         : true,
					dots           : Boolean( Dot ),
					fluidSpeed     : 2000,
					items          : parseInt(Items),
					lazyLoad       : false,
					loop           : true,
					margin         : parseInt( Margins ),
					mouseDrag      : false,
					nav            : false,
					responsiveClass: true,
					smartSpeed     : 2000,
					responsive:{
				      	640:{
				            items: parseInt(Itemsresponsive)
				        },
			    	}	
				});
			
			/* end each */
			});
		/* end conditional */
		}

		/*|°°------------- Flechas del carousel ---------------°°|*/
		//prev carousel
		j(".js-carousel-prev").on('click',function(e){ 
			var slider = j(this).attr('data-slider');	
			j("#"+slider).trigger('prev.owl.carousel' , [900] );
		});
		//next carousel
		j(".js-carousel-next").on('click',function(e){ 
			var slider = j(this).attr('data-slider');	
			j("#"+slider).trigger('next.owl.carousel' , [900] );
		});

		/*|°°------------- Indicadores  del carousel ---------------°°|*/
		j(".js-carousel-indicator").on("click",function(e){
			e.preventDefault();
			var slider  = j(this).attr('data-slider');
			var slideto = j(this).attr('data-to');
			j("#"+slider).trigger( 'to.owl.carousel' , [ slideto , 900 ] );
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  ISOTOPE DE IMAGENES  -----|*/
		/*|----------------------------------------------------------------------|*/

		/*var container_imagenes = j("#galeria-imagenes");
		if( container_imagenes.length ){

			//Isotope
			container_imagenes.isotope({
				// options
				itemSelector: '.item-imagen',
				layoutMode  : 'fitRows',
			});

			container_imagenes.isotope( 'layout' );

			//Filtros
			j('.filter-button-group').on( 'click', 'button', function() {
			 	var filterValue = j(this).attr('data-filter');
				container_imagenes.isotope({ filter: filterValue });
				//activar elemento actual
				j('.filter-button-group button').removeClass('active');
				j(this).addClass('active');

				//Si no encuentra contenido
				if ( !container_imagenes.data('isotope').filteredItems.length ) {
				    j('#message-isotope').fadeIn('slow');
				} else { j('#message-isotope').fadeOut('fast'); }
				
			});
		}*/

		/*|----------------------------------------------------------------------|*/
		/*|-----  FANCYBOX GALERIAS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j("a.gallery-fancybox").fancybox({
			'overlayShow': false,
			'openEffect' : 'elastic',
			'closeEffect': 'elastic',
			'openSpeed'  : 300,
			'closeSpeed' : 300,
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  TABS SECCION BLOG ARTICULOS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j(".group-buttons-tabs a").on('click',function(e){
			e.preventDefault();

			/* Activar elemento activo */
			j(".group-buttons-tabs a").removeClass('active');
			j(this).addClass('active');

			/* Mostrar contenedor respectivo */
			var container = j(this).attr('href');
			if( container.length ){
				/* Ocultar los otros contenedores */
				j(".articles-features__item").slideUp( 'fast' );
				j(container).delay(300).fadeIn(900);
			}
		});

		/*|-------------------------------------------------------------|*/
		/*|-----  TABS SECCIÓN PREGUNTAS  ------|*/
		/*|--------------------------------------------------------------|*/	

		j(".pagePreguntas__section .panel .panel-heading .panel-title a")
		.on('click',function(){
			//Quitar todas las clases activas
			j(".pagePreguntas__section .panel .panel-heading .panel-title a")
			.removeClass('active');
			//Agregar la clase activa al elemento actual
			j(this).addClass('active');
		});	

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		j('#form-contacto').parsley();

		j("#form-contacto").submit( function(e){
			e.preventDefault();
			//Subir el formulario mediante ajax
			j.post( url + '/email/enviar.php', 
			{ 
				name   : j("#input_name").val(),
				email  : j("#input_email").val(),
				phone  : j("#input_phone").val(),
				message: j("#input_message").val(),
			},function(data){
				alert( data );

				j("#input_name").val("");
				j("#input_email").val("");
				j("#input_phone").val("");
				j("#input_message").val("");

				window.location.reload(false);
			});			
		}); 

	});

	/* ------------ Eventos Scroll ------------------------ */
	j(window).on('scroll',function(){

		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			//Si el scroll del navegador es mayor que la posicion de 300 pixeles
			if( j('body').scrollTop() > 300 ){
				//Mostrar flecha de dirección hacia arriba
				j("#arrow-up-page").fadeIn('slow');
			}else{ 
				/* Si no Ocultar esta flecha */ j("#arrow-up-page").fadeOut('slow');
			}
		}

		/* NAVEGACIÓN PRINCIPAL */
		if( j(".mainNavigation").length ){
			//Si el scroll del navegador es mayor que la posicion de 7 pixeles
			if( j('body').scrollTop() > 7 ){
				//
				j(".mainNavigation").addClass('mainNavigation--fixed');
			}else{ 
				/* Si no  */ j(".mainNavigation").removeClass('mainNavigation--fixed');
			}

		}

		/* CONTENEDOR ISOTOPE - Permite reorganizar el contenedor del isotope */
		if( j("#galeria-imagenes").length ){
			j("#galeria-imagenes").isotope( 'layout' );
		}

	});

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);