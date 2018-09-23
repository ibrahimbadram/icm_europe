function regulations_choose_country(id,idd,iddd) {

$('#show_countries').fadeOut(function(){
	$('body').removeClass("select-is-opened");
});

//$('body').animate({height:old_content_height + 50 },200);
$('#phone_code_popup').val(id);
$('#telephonecodeval').val(iddd);
$('#phone_popup').val(iddd);

$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');
$('#change_country').html('');
$('#change_country').html('<div class="flag-icon flag-icon_'+idd+'"></div>'+id);

}
function regulations_showcountries(){

$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');

$('#show_countries').fadeIn(function(){
	drawCountryDropdownList('#show_countries');
});

}

function regulations_choose_country2(id,idd,iddd) {

$('#show_countries2').fadeOut(function(){
	$('body').removeClass("select-is-opened");
});

$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');

if(idd !=""){
	
	$('#country_label').hide();
	$('#change_country2').html('');
	$('#change_country2').html('<div class="flag-icon flag-icon_'+idd+'"></div>'+id);
	$('#addr_country2').val(id);
}else{
	$('#country_label').show();
	$('#addr_country2').val("");
}

}
function regulations_showcountries2(){

$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');

$('#show_countries2').fadeIn(function(){
	drawCountryDropdownList('#show_countries2');
});

}
