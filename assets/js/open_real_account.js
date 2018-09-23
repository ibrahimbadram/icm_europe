window.drf = {
  csrfHeaderName: "X-CSRFTOKEN",
  csrfCookieName: "csrftoken"
};


function sendFirstStepform($containerId){
		var site_url = $('#site_url').val();
		
		if ( steps_check_name($containerId) && steps_check_surname($containerId) &&  steps_check_email($containerId) && steps_check_password($containerId)   && steps_check_phone_code_popup($containerId) && steps_check_phone_popup($containerId) && steps_check_country($containerId)) {

		var url = site_url+"/account/send_regulations";
		var name = $($containerId +' #name').val();
		var surname = $($containerId +' #surname').val();
		var password = $($containerId +' #password').val();
		var email = $($containerId +' #email').val();
		var country = $($containerId +' #addr_country2').val();
		var phone = $($containerId +' #phone_steps').val();
		
		$.post(url,{
				name:$($containerId +' #name').val(),
				surname:$($containerId +' #surname').val(),
				password:$($containerId +' #password').val(),
				email:$($containerId +' #email').val(), 
				country:$($containerId +' #addr_country2').val(),
				phone:$($containerId +' #phone_steps').val(),
				regulator_name: $($containerId +' #input_from_entity').val()
			}, 
			function(data) {

				console.log(data);
				
				//hit icmcapital api to save the data
				icmcapital_api_hit(name, surname, password,email, country, phone);
				
				if ( data.response == 1 ) {//sent with success
					$($containerId +' #name').val('');
					$($containerId +' #email').val('');
					$($containerId +' #surname').val('');
					$($containerId +' #password').val('');
					$($containerId +' #phone_steps').val('');
					$($containerId +' #phone_code_popup').val('');
					
					$($containerId +' #change_country').html('<div class="flag-icon flag-icon_af" style="background:none">'+$($containerId +' #phone_code_label').val()+'</div>');
					$($containerId +' #change_country2').html('<div class="flag-icon flag-icon_af" style="background:none">'+$($containerId +' #country_residence_label').val()+'</div>');
					
					$($containerId +' #finalresult').show().addClass('input-tooltip_success').html(data.message).css({ "margin-bottom" : "20px"});

					$('html, body').animate({
						scrollTop:$containerId.offset().top + 200
					}, 2000);

					setTimeout(clearresult, 5000);

				} else {

					$($containerId +' #finalresult').show().addClass('input-tooltip_error').html(data.message).css({ "margin-bottom" : "20px"});

					$('html, body').animate({

						scrollTop:$containerId.offset().top + 200

					}, 2000);

				}

			}
		);
		
		

		} else{
			$('html, body').animate({
					scrollTop:$($containerId).offset().top + 200
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
				telephone:phone,
				is_finished:true
			}, 
			function(data) {

				console.log(data);

			}
		);
}
function clearresult($containerId){
	
	$($containerId +' #finalresult').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();
	
}
function steps_check_country($containerId){
	
	var str = $($containerId +' #addr_country2').val();
	
	if ( str != '' ) {
		$($containerId +' .input-field_country').removeClass('input-field_error');
		$($containerId +' .input-tooltip_country').fadeOut('fast');
		return true;
	} else {
		$($containerId +' .input-field_country').addClass('input-field_error');
		$($containerId +' .input-tooltip_country').fadeIn('fast');
		return false;
	}
}
function steps_check_name($containerId){
	
	clearresult($containerId);

	var row = $($containerId +' #name').val();
	
	if ( row.length >= 1 ) {
		$($containerId +' .input-field_name').removeClass('input-field_error');
		$($containerId +' .input-tooltip_name').fadeOut('fast');
		
		return true;
	} else {
		$($containerId +' .input-field_name').addClass('input-field_error');
		$($containerId +' .input-tooltip_name').fadeIn('fast');
	return false;
	}

}

function steps_check_phone_code_popup($containerId){
	
	clearresult($containerId);
	var str = $($containerId +' #phone_code_popup').val();

	//if (str.startsWith('+') && str.length > 3 && str != '' ) {
	if (str.length > 1 && str != '' ) {
		$($containerId +' .input-field_phone_code_popup').removeClass('input-field_error');
		$($containerId +' .input-tooltip_phone_code_popup').fadeOut('fast');
		return true;
	} else {
		$($containerId +' .input-field_phone_code_popup').addClass('input-field_error');
		$($containerId +' .input-tooltip_phone_code_popup').fadeIn('fast');
		return false;
	}
}
function steps_check_phone_popup($containerId){
	
	clearresult($containerId);
	var str = $($containerId +' #phone_steps').val();

	//if ( !str.startsWith('+') && str.length > 6 && str != '' ) {
	if (str.startsWith(str) && str.length > 8 && str != '' ) {
		$($containerId +' .input-field_phone_popup').removeClass('input-field_error');
		$($containerId +' .input-tooltip_phone_popup').fadeOut('fast');
		return true;
	} else {
		$($containerId +' .input-field_phone_popup').addClass('input-field_error');
		$($containerId +' .input-tooltip_phone_popup').fadeIn('fast');
		return false;
	}
}

function steps_check_password($containerId){
	
	clearresult($containerId);

	var str = $($containerId +' #password').val();
	
	//check if password has case sensitive and contain capital letter and numbers
	
	var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,15})");
	var test = strongRegex.test(str);   // true
	
	if(test && str.length <= 15 && str != ''){
		$($containerId +' .input-field_password').removeClass('input-field_error');

		$($containerId +' .input-tooltip_password').fadeOut('fast');

		return true;
	}else{
		$($containerId +' .input-field_password').addClass('input-field_error');

		$($containerId +' .input-tooltip_password').fadeIn('fast');

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
function steps_check_surname($containerId){

	clearresult($containerId);

	var row = $($containerId +' #surname').val();

	if (row != "") {
		
		$($containerId +' .input-field_surname').removeClass('input-field_error');

		$($containerId +' .input-tooltip_surname').fadeOut('fast');

		return true;

	} else {

		$($containerId +' .input-field_surname').addClass('input-field_error');

		$($containerId +' .input-tooltip_surname').fadeIn('fast');

		return false;

	}

}

function steps_check_email($containerId){

	clearresult($containerId);

	var row = $($containerId +' #email').val();

	if ( row != '' && isValidEmailAddress(row)  ){

		$($containerId +' .input-field_email').removeClass('input-field_error');

		$($containerId +' .input-tooltip_email').fadeOut('fast');

		return true;

	} else {

		$($containerId +' .input-field_email').addClass('input-field_error');

		$($containerId +' .input-tooltip_email').fadeIn('fast');

		return false;
	}

}


$(document).ready(function(){
	
	//var form = $('#open_an_account-form');
	var $containerId = ('#open_an_account-form');

	/*$('#jurBlock button').click(function(){
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
			$('#input_from_entity').val(value);
			$('#regulator_name').html(value);

      });
	  */
	$('#choose_regulator .imgfield-container').click(function(){
		var $this = $(this);
		var tab_id = $this.attr('data-tab-id');
			//alert(tab_id);
		var $next = $this.find('div.imgfield-wrap');
		if(!$next.hasClass('selected')){
			$('.imgfield-container').find('div.imgfield-wrap').removeClass('selected');
			$('.imgfield-container').find('div.imgfield-wrap').find('div.button-selected').removeClass('checked').addClass('unchecked');
			$next.addClass('selected');
			$next.find('div.button-selected').removeClass('unchecked').addClass('checked');
			
			$('.notes').removeClass('active_tab');
		
			//activate tab
			$('#'+tab_id+'_tab').addClass('active_tab');
			
			$('#input_from_entity').val(tab_id);
			$('#regulator_name').html(tab_id);
		}
	}); 
	
	$('#sendFirstStepform_btn').click(function(e){
		e.preventDefault();
		
		sendFirstStepform($containerId);
		
		return false;
	});
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
	
	
	
	$($containerId +' #name').blur(function(){
		steps_check_name($containerId);
	});
	$($containerId +' #surname').blur(function(){
		steps_check_surname($containerId);
	});
	$($containerId +' #email').blur(function(){
		steps_check_email($containerId);
	});
	$($containerId +' #password').blur(function(){
		steps_check_password($containerId);
	});
	
	$($containerId +' #phone_code_popup').blur(function(){
		steps_check_phone_code_popup($containerId);
	});
	
	$($containerId +' #phone_steps').blur(function(){
		steps_check_phone_popup($containerId);
	});
	
	// Trigger functiobs of countries
	countries_callback_functions($containerId);
	
	$(window).click(function() {
		
		//hide countries dropdownbox on window click
		countries_fadeOut($containerId);
	});
	
	//Phone number KeyDown Event trigger
	phone_callBack_function($containerId);
	
});


/*function isValidEmailAddress(emailAddress) {

	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

	return pattern.test(emailAddress);

}*/

