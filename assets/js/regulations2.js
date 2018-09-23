function sendFirstStepform(){
		var site_url = $('#site_url').val();

	if ( steps_check_email() && steps_check_password() && steps_check_name() && steps_check_surname()) {

		var url = site_url+"/about_us/send_regulations";
		$.post(url,{
				name:$('#name').val(),
				surname:$('#surname').val(),
				password:$('#password').val(),
				email:$('#email').val(), 
				country:$('#country').val(), 
				regulator_name: $('#input_from_entitty').val()
			}, 
			function(data) {

				console.log(data);
				
				if ( data.response == 1 ) {//sent with success

					$('#name').val('');
					$('#email').val('');
					$('#country').val('LB');
					$('#surname').val('');
					$('#password').val('');
					
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

function clearresult(){

	$('#finalresult').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();

}

function steps_check_name(){

	clearresult();

	var row = $('#name').val();

	if (row != "") {
		$('.input-field_name').removeClass('input-field_error');

		$('.input-tooltip_name').fadeOut('fast');

		return true;

	} else {
		
		$('.input-field_name').addClass('input-field_error');

		$('.input-tooltip_name').fadeIn('fast');

		return false;

	}

}

function steps_check_password(){
	
	clearresult();

	var str = $('#password').val();

	if (str.length >= 6 && str != '' ) {

		$('.input-field_password').removeClass('input-field_error');

		$('.input-tooltip_password').fadeOut('fast');

		return true;

	} else {
		$('.input-field_password').addClass('input-field_error');

		$('.input-tooltip_password').fadeIn('fast');

		return false;
	}

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

$(document).ready(function(){

	var form = $("#example-form");

	

	form.validate({

		errorPlacement: function errorPlacement(error, element) { element.before(error); },

		rules: {

			confirm: {

				equalTo: "#password"

			}

		}

	});

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
			}
			
		},
		onStepChanging: function (event, currentIndex, newIndex)
		{
			//form.validate().settings.ignore = ":disabled,:hidden";
			
			//check the form using the codeigniter rules
			event.preventDefault();
			
			return sendFirstStepform();
			//return form.valid();
		}/*,

		onFinishing: function (event, currentIndex)

		{

			form.validate().settings.ignore = ":disabled";

			return form.valid();

		},

		onFinished: function (event, currentIndex)

		{

			alert("Submitted!");

		}*/
		

	});

    $('#jurBlock button').click(function(){
            var value = $(this).val();
			$('#jurBlock button').removeClass('active').addClass('passive');
			$(this).removeClass('passive').addClass('active');
			$('#input_from_entitty').val(value);
			$('#regulator_name').html(value);

      });

});

/*function isValidEmailAddress(emailAddress) {

	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

	return pattern.test(emailAddress);

}*/

