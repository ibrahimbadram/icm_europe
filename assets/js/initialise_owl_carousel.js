function owlcarousel() {

$(".owl-carousel").each(function() {
    var $this = $(this),
        $items = ($this.data('items')) ? $this.data('items') : 1,
        $loop = ($this.data('loop')) ? $this.data('loop') : true,
        $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
        $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
        $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
        $space = ($this.attr('data-space')) ? $this.data('space') : 15;
        $autoplayTimeout = ($this.attr('data-autoplayTimeout')) ? $this.attr('data-autoplayTimeout') : 5000;
    $(this).owlCarousel({
        loop: $loop,
        items: $items,
        responsive: {
            0: {
                items: $this.data('xx-items') ? $this.data('xx-items') : 1
            },
            600: {
                items: $this.data('xs-items') ? $this.data('xs-items') : 1
            },
            767: {
                items: $this.data('sm-items') ? $this.data('sm-items') : 2
            },
            992: {
                items: $this.data('md-items') ? $this.data('md-items') : 2
            },
            1190: {
                items: $this.data('lg-items') ? $this.data('lg-items') : 3
            },
            1200: {
                items: $items
            }
        },
        dots: $navdots,
        margin: $space,
        nav: $navarrow,
        navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
        autoplay: $autoplay,
        autoplayTimeout :$autoplayTimeout,
        autoplayHoverPause: true
    });
});
}
$(document).ready(function() {
	//owlcarousel();
	
	//Load Slider banners on ajax request
	$.ajax({
		type: 'POST',
		url: $('#siteurl').val()+'/home/loadbanner',
		async:false,
		success: function(result) {
			
			$('.banner_details').html(result);
			owlcarousel();
			$('.banner_details').css('background','none');
			$('.banner_details').css('height','inherit');
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { }
	});

});

//$(document).ajaxStop(function()  {		owlcarousel(); });
