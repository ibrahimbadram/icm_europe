var old_content_height = 0;
var default_padding_bottom = 100;

window.drf = {
  csrfHeaderName: "X-CSRFTOKEN",
  csrfCookieName: "csrftoken"
};

function sendFirstStepform(){
	
		var site_url = $('#site_url').val();
		
		//$('body').animate({height:old_content_height + default_padding_bottom },200);
		
		if ( steps_check_name() && steps_check_surname() &&  steps_check_email() && steps_check_password()   && steps_check_phone_code_popup() && steps_check_phone_popup() && steps_check_country()) {

		var url = site_url+"/account/send_regulations";
		var name = $('#name').val();
		var surname = $('#surname').val();
		var password = $('#password').val();
		var email = $('#email').val();
		var country = $('#addr_country2').val();
		var phone = $('#phone_popup').val();
		
		$.post(url,{
				name:$('#name').val(),
				surname:$('#surname').val(),
				password:$('#password').val(),
				email:$('#email').val(), 
				country:$('#addr_country2').val(),
				phone:$('#phone_popup').val(),
				regulator_name: $('#input_from_entitty').val()
			}, 
			function(data) {

				console.log(data);
				
				//hit icmcapital api to save the data
				icmcapital_api_hit(name, surname, password,email, country, phone);
				
				if ( data.response == 1 ) {//sent with success
					$('#name').val('');
					$('#email').val('');
					$('#surname').val('');
					$('#password').val('');
					$('#phone_popup').val('');
					$('#phone_code_popup').val('');
					
					$('#change_country').html('<div class="flag-icon flag-icon_af" style="background:none">'+$('#phone_code_label').val()+'</div>');
					$('#change_country2').html('<div class="flag-icon flag-icon_af" style="background:none">'+$('#country_residence_label').val()+'</div>');
					
					$('#finalresult').show().addClass('input-tooltip_success').html(data.message);

					$('html, body').animate({
						scrollTop:$("#example-form").offset().top + 200
					}, 2000);

					setTimeout(clearresult, 5000);

				} else {

					$('#finalresult').show().addClass('input-tooltip_error').html(data.message);

					$('html, body').animate({

						scrollTop:$("#example-form").offset().top + 200

					}, 2000);

				}

			}
		);
		
		

		} else{
			$('html, body').animate({
					scrollTop:$("#example-form").offset().top + 200
				}, 2000);
		}
}

function icmcapital_api_hit(name,surname,password,email,country,phone){
	
	var url = 'https://icmcapital-biq.dev.tradecore.io/api/signup/demo/';
	
	//alert(url);
	$.post(url,{
				first_name:name,
				last_name:surname,
				password:password,
				email:email, 
				addr_country:country,
				telephone:phone
			}, 
			function(data) {

				console.log(data);

			}
		);
}
function clearresult(){
	
	$('#finalresult').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();
	
	//$('body').animate({height:old_content_height + default_padding_bottom },200);
}
function steps_check_country(){
	
	var str = $('#addr_country2').val();
	
	if ( str != '' ) {
		$('.input-field_country').removeClass('input-field_error');
		$('.input-tooltip_country').fadeOut('fast');
		return true;
	} else {
		$('.input-field_country').addClass('input-field_error');
		$('.input-tooltip_country').fadeIn('fast');
		return false;
	}
}
function steps_check_name(){
	
	clearresult();

	var row = $('#name').val();
	
	if ( row.length >= 1 ) {
		$('.input-field_name').removeClass('input-field_error');
		$('.input-tooltip_name').fadeOut('fast');
		
		return true;
	} else {
		$('.input-field_name').addClass('input-field_error');
		$('.input-tooltip_name').fadeIn('fast');
	return false;
	}

}

function steps_check_phone_code_popup(){
	clearresult();
	var str = $('#phone_code_popup').val();

	//if (str.startsWith('+') && str.length > 3 && str != '' ) {
	if (str.length > 1 && str != '' ) {
		$('.input-field_phone_code_popup').removeClass('input-field_error');
		$('.input-tooltip_phone_code_popup').fadeOut('fast');
		return true;
	} else {
		$('.input-field_phone_code_popup').addClass('input-field_error');
		$('.input-tooltip_phone_code_popup').fadeIn('fast');
		return false;
	}
}
function steps_check_phone_popup(){
	clearresult();
	var str = $('#phone_popup').val();

	//if ( !str.startsWith('+') && str.length > 6 && str != '' ) {
	if (str.startsWith(str) && str.length > 8 && str != '' ) {
		$('.input-field_phone_popup').removeClass('input-field_error');
		$('.input-tooltip_phone_popup').fadeOut('fast');
		return true;
	} else {
		$('.input-field_phone_popup').addClass('input-field_error');
		$('.input-tooltip_phone_popup').fadeIn('fast');
		return false;
	}
}

function steps_check_password(){
	
	clearresult();

	var str = $('#password').val();
	
	//check if password has case sensitive and contain capital letter and numbers
	
	var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,15})");
	var test = strongRegex.test(str);   // true
	
	if(test && str.length <= 15 && str != ''){
		$('.input-field_password').removeClass('input-field_error');

		$('.input-tooltip_password').fadeOut('fast');

		return true;
	}else{
		$('.input-field_password').addClass('input-field_error');

		$('.input-tooltip_password').fadeIn('fast');

		return false;
	}
	/*if (str.length >= 6 && str.length <= 15 && str != '' ) {

		$('.input-field_password').removeClass('input-field_error');

		$('.input-tooltip_password').fadeOut('fast');

		return true;

	} else {
		$('.input-field_password').addClass('input-field_error');

		$('.input-tooltip_password').fadeIn('fast');

		return false;
	}*/

}
function steps_check_surname(){

	clearresult();

	var row = $('#surname').val();

	if (row != "") {
		
		$('.input-field_surname').removeClass('input-field_error');

		$('.input-tooltip_surname').fadeOut('fast');

		return true;

	} else {

		$('.input-field_surname').addClass('input-field_error');

		$('.input-tooltip_surname').fadeIn('fast');

		return false;

	}

}

function steps_check_email(){

	clearresult();

	var row = $('#email').val();

	if ( row != '' && isValidEmailAddress(row)  ){

		$('.input-field_email').removeClass('input-field_error');

		$('.input-tooltip_email').fadeOut('fast');

		return true;

	} else {

		$('.input-field_email').addClass('input-field_error');

		$('.input-tooltip_email').fadeIn('fast');

		return false;
	}

}

function drawCountryDropdownList($id){
	$($id).find('.select2-search__field').val("").trigger('keyup');

}
	
$(document).ready(function(){
	
	var form = $("#example-form");

	
	
	/*form.validate({

		errorPlacement: function errorPlacement(error, element) { element.before(error); },

		rules: {

			confirm: {

				equalTo: "#password"

			}

		}

	});*/
	
	/*
	* Old Code will be reused next time
	*/
	
	/*
	form.children("div").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		labels: {
			next : function(){
				var translated_next = $('#translated_next').val();
				return translated_next;
			},
			previous : function(){
				var translated_previous = $('#translated_previous').val();
				return translated_previous;
			},
			finish : function(){
				var translated_finish = $('#translated_submit').val();
				return translated_finish;
			}
			
		},
		//onStepChanging: function (event, currentIndex, newIndex)
		//{
			//form.validate().settings.ignore = ":disabled,:hidden";
			
			//check the form using the codeigniter rules
			//event.preventDefault();
			
			//return sendFirstStepform();
			//return form.valid();
		//},

		onFinishing: function (event, currentIndex)

		{

			//form.validate().settings.ignore = ":disabled";

			//return form.valid();
			event.preventDefault();
			
			return sendFirstStepform();

		}
		

	});*/
	
	//old_content_height = $('body').height();
	
	$('#name').blur(function(){
		steps_check_name();
	});
	$('#surname').blur(function(){
		steps_check_surname();
	});
	$('#email').blur(function(){
		steps_check_email();
	});
	$('#password').blur(function(){
		steps_check_password();
	});
	
	$('#phone_code_popup').blur(function(){
		steps_check_phone_code_popup();
	});
	
	$('#phone_popup').blur(function(){
		steps_check_phone_popup();
	});
	
    $('#jurBlock button').click(function(){
            var value = $(this).val();
			$('.notes').removeClass('active_tab');
			if(value == 'FCA'){
				//active FCA tab
				$('#FCA_tab').addClass('active_tab');
			}else if(value == 'CySEC'){
				//active CySEC tab
				$('#CySEC_tab').addClass('active_tab');
			}else if(value == 'FSA'){
				//active FSA tab
				$('#FSA_tab').addClass('active_tab');
			}
			
			$('#jurBlock button').removeClass('active').addClass('passive');
			$(this).removeClass('passive').addClass('active');
			$('#input_from_entitty').val(value);
			$('#regulator_name').html(value);

      });
	  
	  $("#inputString").keyup(function () {
		var filter = $(this).val();
		$("ul#select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results li").each(function () {
			if ($(this).text().search(new RegExp(filter, "i")) < 0) {
				$(this).hide();
			} else {
				$(this).show()
			}
		});
		

	});
	
	$("#inputString2").keyup(function () {
		var filter = $(this).val();
		$("ul#select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-results li").each(function () {
			if ($(this).text().search(new RegExp(filter, "i")) < 0) {
				$(this).hide();
			} else {
				$(this).show()
			}
		});
		

	});
	
	
	$(window).click(function() {
	
		$('#show_countries').fadeOut(function(){
			$('body').removeClass("select-is-opened");
			drawCountryDropdownList('#show_countries');
		});
		
		$('#show_countries2').fadeOut(function(){
			$('body').removeClass("select-is-opened");
			drawCountryDropdownList('#show_countries2');
		});
		
		//$('body').animate({height:old_content_height + default_padding_bottom + 50},200);
		
	});
	
	
	$('#showcountries,#show_countries').click(function(event){
		
		$('#show_countries2').fadeOut('fast');
		if ($('#show_countries').is(':visible')) {
			drawCountryDropdownList('#show_countries');
			
			//disable tooltip on code
			$('.input-field_phone_code_popup').removeClass('input-field_error');
			$('.input-tooltip_phone_code_popup').fadeOut('fast');
			$('.input-field_phone_popup').removeClass('input-field_error');
			$('.input-tooltip_phone_popup').fadeOut('fast');
		
			$('body').addClass("select-is-opened");
			
		}else{
			$('body').removeClass("select-is-opened");
		}
		event.stopPropagation();
	});
	
	$('#showcountries2,#show_countries2').click(function(event){
		
		$('#show_countries').fadeOut('fast');
		if ($('#show_countries2').is(':visible')) {
			drawCountryDropdownList('#show_countries2');
			$('body').addClass("select-is-opened");
			
		}else{
			$('body').removeClass("select-is-opened");
		}
		event.stopPropagation();
	});
	
	$("input[id*='phone_popup']").keydown(function (event) {


        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || 
            (event.keyCode >= 96 && event.keyCode <= 105) || 
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault(); 
        //if a decimal has been added, disable the "."-button

    });
	
	wizardActionFixWidth();

});

function wizardActionFixWidth(){
	
	var first_column_width = $('.col-md-12.col-lg-5').width();
	
	$('.wizard > .actions').width(first_column_width);
	
}
$( window ).resize(function() {
	wizardActionFixWidth();
});

/*function isValidEmailAddress(emailAddress) {

	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

	return pattern.test(emailAddress);

}*/

