(function($) {
  "use strict";
$(document).ready(function(){
    // Carousal Slider
	if ($('body').hasClass('rtl')) {
    $(".owl-carousel.hl-modern-carousel").owlCarousel({
				  loop:true,
				  margin:3,
				  center: true,
				  items:3,
				  nav:hollandVars.slider_options.controls,
				  autoplay: hollandVars.slider_options.auto,
				  autoplayTimeout: hollandVars.slider_options.pause,
				  smartSpeed: hollandVars.slider_options.speed,
				  navText: [' ',' '],
				  rtl:true,
				  responsive:{
					  0:{
						  items:1
					  },
					  600:{
						  items:2
					  },
					  992:{
						  items:2
					  }
				  }
	});
}
else{
	$(".owl-carousel.hl-modern-carousel").owlCarousel({
				  loop:true,
				  margin:3,
				  center: true,
				  items:3,
				  nav:hollandVars.slider_options.controls,
				  autoplay: hollandVars.slider_options.auto,
				  autoplayTimeout: hollandVars.slider_options.pause,
				  smartSpeed: hollandVars.slider_options.speed,
				  navText: [' ',' '],
				  responsive:{
					  0:{
						  items:1
					  },
					  600:{
						  items:2
					  },
					  992:{
						  items:2
					  }
				  }
	});
}
	$('.hl-mobile-icon .hl-menu-open').click(function(){
		$('.hl-mobile-menu').addClass('hl-mobile-menu-open');
		});
	$('.menu-close').click(function(){
		$('.hl-mobile-menu').removeClass('hl-mobile-menu-open');
		});
	$('.hl-mobile-menu').on('click', function(e) {
  		if (e.target !== this)
    	return;
  		$(this).removeClass('hl-mobile-menu-open');
	});
	$('iframe[src*="youtube.com"],iframe[src*="player.vimeo.com"] ').each(function() {
        $(this).wrap('<div class="video-wrapper"></div>');
    }); 
});  
  })(jQuery);