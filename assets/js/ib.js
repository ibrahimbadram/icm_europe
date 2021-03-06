
function sendform(){
	
	var $containerId = $('#container_id').val();
	if ( check_name($containerId) && check_email($containerId) && check_phone($containerId)) {

		$($containerId+' #subscribe_here').attr('onClick','');
		var site_url = $('#site_url').val();
		var url = site_url+"/home/send_newsletter";
		
		//$('#finalresult').html('<img src="images/landing/giphy.gif" width="30" />');
		$.post(url,{name:$($containerId+' #name').val(),email:$($containerId+' #email').val(),phone:$($containerId+' #phone').val(), lang_ref:$('#lang_ref').val()}, function(data) {
			console.log(data);
			if ( data == 1 ) {//sent with success
				$($containerId+' #name').val('');
				$($containerId+' #email').val('');
				$($containerId+' #phone').val('');
				$($containerId+' #subscribe_here').attr('onClick','sendform()');
				
				$($containerId+' #finalresult').show().addClass('input-tooltip_success').html($($containerId+' #email_success_sent').val());
				$('html, body').animate({
					scrollTop: $($containerId+" #finalresult").offset().top - 200
				}, 2000);
				//$('#finalresult').html('<h4 style="color:green"><img src="images/landing/confirm.gif"  /> Sent successfully</h4>');
				setTimeout(clearresult, 5000);

			} else {
				$($containerId+' #finalresult').show().addClass('input-tooltip_error').html($('#email_already_exist').val());
				$('html, body').animate({
					scrollTop: $($containerId+" #finalresult").offset().top - 200
				}, 2000);
			}
		})
		  .done(function(data) {
		   //$('#finalresult').html(data);
		   $($containerId+' #subscribe_here').attr('onClick','sendform()');
		  })
		  .fail(function(data) {
		  // $('#finalresult').html(data);

		  })
		  .always(function(data) {
		  // $('#finalresult').html(data);
		  });
		} else{
			$($containerId+' #subscribe_here').attr('onClick','sendform()');
		}
}

function clearresult($containerId){
	$($containerId+' #finalresult').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();
}
function check_name($containerId){
	clearresult($containerId);
	var row = $($containerId+' #name').val();
	var result = row.split(' ');
	if (/\s/.test(row)) {
		if ( result[0] != '' && result[1] != ''  ){
			$($containerId+' .input-field_name').removeClass('input-field_error');
			$($containerId+' .input-tooltip_name').fadeOut('fast');
			$($containerId+' #subscribe_here').attr('onClick','sendform()');
		return true;
		} else {
			$($containerId+' .input-field_name').addClass('input-field_error');
			$($containerId+' .input-tooltip_name').fadeIn('fast');
			$($containerId+' #subscribe_here').attr('onClick','');
			return false;
		}
	} else {
		$($containerId+' .input-field_name').addClass('input-field_error');
		$($containerId+' .input-tooltip_name').fadeIn('fast');
		$($containerId+' #subscribe_here').attr('onClick','');
		return false;
	}
}
function check_email($containerId){
	
	clearresult($containerId);
	var row = $($containerId+' #email').val();
	if ( row != '' && isValidEmailAddress(row)  ){
		$($containerId+' .input-field_email').removeClass('input-field_error');
		$($containerId+' .input-tooltip_email').fadeOut('fast');
		$($containerId+' #subscribe_here').attr('onClick','sendform()');
		return true;
	} else {
		$($containerId+' .input-field_email').addClass('input-field_error');
		$($containerId+' .input-tooltip_email').fadeIn('fast');
		$($containerId+' #subscribe_here').attr('onClick','');
		return false;
	}
}
function isValidEmailAddress(emailAddress) {
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	return pattern.test(emailAddress);
}

function check_phone($containerId){
	clearresult($containerId);
	var str = $($containerId+' #phone').val();

	if (str.startsWith('+') && str.length > 8 && str != '' ) {
		$($containerId+' .input-field_phone').removeClass('input-field_error');
		$($containerId+' .input-tooltip_phone').fadeOut('fast');
		$($containerId+' #subscribe_here').attr('onClick','sendform()');
		return true;
	} else {
		$($containerId+' .input-field_phone').addClass('input-field_error');
		$($containerId+' .input-tooltip_phone').fadeIn('fast');
		$($containerId+' #subscribe_here').attr('onClick','');
		return false;
	}
}

