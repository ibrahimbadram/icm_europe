var $window = $(window);	  
var myInterval;	
$(document).ready(function() {
$(".parent_menu").hover(function(){

var initid = $(this).attr('data-id');
var numid = initid.split('_');
var id = numid[1];
if (  $(window).width() > 900 ) {
$('.inner_menu_slide_'+id).addClass('show_sub_menu'); 
$('#parent_'+id).addClass('active_menu_link'); 
}
},function() {
$('.sub_menu_inner').delay(500).css('visibility','hidden');
$('.sub_menu_inner').css('z-index',4);
$('.sub_menu_inner').delay(500).removeClass('show_sub_menu');
$('.parent_menu').removeClass('active_menu_link'); 
});

$(".sub_menu_inner").hover(function(){
var initid = $(this).attr('data-id');
var numid = initid.split('_');
var id = numid[1];

if (  $(window).width() > 900 ) {
$('.inner_menu_slide_'+id).css('visibility','visible'); 
$('.inner_menu_slide_'+id).css('z-index',5);
$('#parent_'+id).addClass('active_menu_link'); 
}
}, function() {
$('.parent_menu').removeClass('active_menu_link');
$('.sub_menu_inner').css('visibility','hidden');
$('.sub_menu_inner').css('z-index',4);
});
});



function fade_menu(id) {
if ( $('#parent_'+id).is(":hover") || $('.inner_menu_slide_'+id).is(":hover") ) {
$('.inner_menu_slide_'+id).fadeIn('fast');	
} else {
$('.sub_menu_inner'+id).fadeOut('fast');
}
}
function slide_menu() {
	if (  $(window).width() < 960 ) {
	if ( $('.burger_menu').hasClass('active') ) {
		$('.main_menu').removeClass('active_menu');
		$('.burger_menu').removeClass('active');
	} else {
		$('.burger_menu').addClass('active');
		$('.main_menu').addClass('active_menu');
		
	}
	}
}

function slide_inner_menu(id,url) {
	if (  $(window).width() < 960 ) {
	if ( $('.inner_menu_'+id).hasClass('active') ) {
		$('.inner_menu_'+id).removeClass('active_inner');
		$('.inner_menu_'+id).removeClass('active');
	} else {
		$('.menu_inner').removeClass('active_inner');
		$('.inner_menu_'+id).addClass('active');
		$('.inner_menu_'+id).addClass('active_inner');
	}
	} else {
		window.location.replace(url);
	}
}

$(window).load(function() {
$('.banner-loader').fadeOut('fast');

});
function showpopup2(){
$('input.checking').prop('checked', true);
$('.popup-section-2').fadeIn('fast');
//$('input.checking').attr('checked','checked') 
}
function showpopup(){
$('.popup-section,.popup-shadow').fadeIn('fast');
}
function hidepopup(){
$('.popup-section-2,.popup-section,.popup-shadow').fadeOut('fast');	
}
function hidepopup2(){
$('.popup-section-2').fadeOut('fast');	
}
function sendform_popup(){
		
	if ( check_name_popup()  && check_last_name_popup() &&  check_email_popup() && check_phone_code_popup() && check_phone_popup() && ifchecked()) {

		$('#subscribe_here_popup').attr('onClick','');
		var site_url = $('#site_url').val();
		var url = site_url+"/home/send_popup";
		
		//$('#finalresult').html('<img src="images/landing/giphy.gif" width="30" />');
		$.post(url,{name:$('#name_popup').val(),last_name:$('#last_name_popup').val(),email:$('#email_popup').val(),phone_code:$('#phone_code_popup').val(),phone:$('#phone_popup').val(), lang_ref:$('#lang_ref').val()}, function(data) {
			console.log(data);
			if ( data == 1 ) {//sent with success
				$('#name_popup').val('');
				$('#email_popup').val('');
				$('#phone_popup').val('');
				$('#phone_code_popup').val('');
				$('input.checking').prop('checked', false);
				$('#subscribe_here_popup').attr('onClick','sendform_popup()');
				
				$('#finalresult_popup').show().addClass('input-tooltip_success').html($('#email_success_sent').val());
				setTimeout(finalresult_popup, 7000);

			} else {
				$('#finalresult_popup').show().addClass('input-tooltip_error').html($('#email_already_exist').val());
				
			}
		})
		  .done(function(data) {
		   //$('#finalresult').html(data);
		   $('#subscribe_here_popup').attr('onClick','sendform_popup()');
		  })
		  .fail(function(data) {
		  // $('#finalresult').html(data);

		  })
		  .always(function(data) {
		  // $('#finalresult').html(data);
		  });
		} else{
			$('#subscribe_here_popup').attr('onClick','sendform_popup()');
		}
}
function clearresult_popup(){
	$('#finalresult_popup').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();
}
function check_name_popup(){
	clearresult();
	var row = $('#name_popup').val();
	var result = row.split(' ');
if ( row.length >= 1 ) {
			$('.input-field_name_popup').removeClass('input-field_error');
			$('.input-tooltip_name_popup').fadeOut('fast');
			$('#subscribe_here_popup').attr('onClick','sendform_popup()');
		return true;
		} else {
			$('.input-field_name_popup').addClass('input-field_error');
			$('.input-tooltip_name_popup').fadeIn('fast');
			$('#subscribe_here_popup').attr('onClick','');
			return false;
		}

}
function check_last_name_popup(){
var row = $('#last_name_popup').val();
if ( row.length >= 1 ) {
$('.input-field_last_name_popup').removeClass('input-field_error');
$('.input-tooltip_last_name_popup').fadeOut('fast');
$('#subscribe_here_popup').attr('onClick','sendform_popup()');
return true;
} else {
$('.input-field_last_name_popup').addClass('input-field_error');
$('.input-tooltip_last_name_popup').fadeIn('fast');
$('#subscribe_here_popup').attr('onClick','');
return false;
}
}
function check_email_popup(){
	clearresult();
	var row = $('#email_popup').val();
	if ( row != '' && isValidEmailAddress(row)  ){
		$('.input-field_email_popup').removeClass('input-field_error');
		$('.input-tooltip_email_popup').fadeOut('fast');
		$('#subscribe_here_popup').attr('onClick','sendform_popup()');
		return true;
	} else {
		$('.input-field_email_popup').addClass('input-field_error');
		$('.input-tooltip_email_popup').fadeIn('fast');
		$('#subscribe_here_popup').attr('onClick','');
		return false;
	}
}
function check_phone_code_popup(){
	clearresult();
	var str = $('#phone_code_popup').val();

	if (str.startsWith('+') && str.length > 3 && str != '' ) {
		$('.input-field_phone_code_popup').removeClass('input-field_error');
		$('.input-tooltip_phone_code_popup').fadeOut('fast');
		$('#subscribe_here_popup').attr('onClick','sendform_popup()');
		return true;
	} else {
		$('.input-field_phone_code_popup').addClass('input-field_error');
		$('.input-tooltip_phone_code_popup').fadeIn('fast');
		$('#subscribe_here_popup').attr('onClick','');
		return false;
	}
}
function check_phone_popup(){
	clearresult();
	var str = $('#phone_popup').val();

	if ( !str.startsWith('+') && str.length > 6 && str != '' ) {
		$('.input-field_phone_popup').removeClass('input-field_error');
		$('.input-tooltip_phone_popup').fadeOut('fast');
		$('#subscribe_here_popup').attr('onClick','sendform_popup()');
		return true;
	} else {
		$('.input-field_phone_popup').addClass('input-field_error');
		$('.input-tooltip_phone_popup').fadeIn('fast');
		$('#subscribe_here_popup').attr('onClick','');
		return false;
	}
}


function ifchecked() {
	if ( $('input.checking').is(':checked') ) {
		$('.input-field_checkbox_popup').removeClass('input-field_error');
		$('.input-tooltip_checkbox_popup').fadeOut('fast');
		$('#subscribe_here_popup').attr('onClick','sendform_popup()');
		return true;
	} else {
		$('.input-field_checkbox_popup').addClass('input-field_error');
		$('.input-tooltip_checkbox_popup').fadeIn('fast');
		$('#subscribe_here_popup').attr('onClick','');
		return false;
	}
}
$(window).on('load',function() { 
$('.popup-section').css('background','url(assets/images/home/trading-bg1.jpg) center center');
$('.popup-section').css('background-size','cover');
$('.popup-section-2').height($('.popup-section').height());
$('#flux').height($('.popup-section-2').height()-150);
});
function scrolldiv(){
$("#flux").animate({ scrollTop: $('#flux').prop("scrollHeight")}, 1000);	
}

$(document).ready(function() {
$('#flux').width($('.popup-section-2').width()-50);
        $('#flux').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
          $('.button-2').fadeIn('fast');
		  $('.arrow-down').fadeOut('fast');
        } else {
			$('.button-2').fadeOut('fast');
			$('.arrow-down').fadeIn('fast');
		}
    });
});
