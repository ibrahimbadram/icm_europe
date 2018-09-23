$window = $(window);

function awardsCarouselInitialise(){
 /* $('.carousel').carousel({
    carouselWidth:400,
    frontWidth: 250,
    frontHeight: 235,
    carouselHeight:285,
    directionNav:false,
    shadow:false,
    //buttonNav:'bullets'
  });*/
  $('#carousel_awards').carousel({
			padding:0,
			duration:0,
			fullWidth:false

	});
   autoplay();
}

function autoplay() {
    $('#carousel_awards').carousel('next');
    setTimeout(autoplay, 4500);
}

function smartphonesscroll(){

  $window.scroll(function() {
  
    if ( $(window).width() > 900 ) {
        var hT = $('.smartphones').offset().top,
         hH = $('.smartphones').outerHeight()-600,
         wH = $(window).height(),
         wS = $(this).scrollTop();
		// alert(wS);
        if (wS > (hT+hH-wH)){
          if ( $('.mt4_animation').hasClass('animate_mt4')){} else{
      	   $('.mt4_animation').addClass('animate_mt4');
      	   }
      	   if ( $('.mt5_animation').hasClass('animate_mt5')){} else{
      	      $('.mt5_animation').addClass('animate_mt5');

      	   }
      	   if ( $('.ctrader_animation').hasClass('animate_ctrader')){} else{
      	   $('.ctrader_animation').addClass('animate_ctrader');
      	   }
         if ( $('.smartphones-center').hasClass('animate')){} else{
           $('.smartphones-center').addClass('animate');
         }
         if ( $('.smartphones-left').hasClass('animate')){} else{
           $('.smartphones-left').addClass('animate');
         }
         if ( $('.smartphones-right').hasClass('animate')){} else{
           $('.smartphones-right').addClass('animate');
         }

         //bounce all elements
         /*setTimeout(function(){
               $('#mt4_img').removeClass('mt4_animation common_animation').removeClass('animate_mt4').addClass('bounceIn animated');
               $('#mt5_img').removeClass('mt5_animation common_animation').removeClass('animate_mt5').addClass('bounceIn animated');
                $('#ctrader_img').removeClass('ctrader_animation common_animation').removeClass('animate_ctrader').addClass('bounceIn animated');
         }, 3000);*/
        }
    }
    });
}



$window.on('scroll resize', smartphonesscroll);

$window.trigger('scroll');
$window.on('resize', awardsCarouselInitialise);

$(document).ready(function(){
	awardsCarouselInitialise();
});
