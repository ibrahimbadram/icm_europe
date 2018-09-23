
function choose_country($containerId, id,idd,iddd) {

		$($containerId+' #show_countries').fadeOut(function(){
			$('body').removeClass("select-is-opened");
		});

		//$('body').animate({height:old_content_height + 50 },200);
		$($containerId+' #phone_code_popup').val(id);
		$($containerId+' #telephonecodeval').val(iddd);
		$($containerId+' .input-field_phone_popup').val(iddd);

		$($containerId+' .input-field_country').removeClass('input-field_error');
		
		$($containerId+' .input-tooltip_country').fadeOut('fast');
		$($containerId+' .input-tooltip_phone_code_popup').fadeOut('fast');
		$($containerId+' #change_country').html('');
		$($containerId+' #change_country').html('<div class="flag-icon flag-icon_'+idd+'"></div>'+id);

}
function showcountries($containerId){

	$($containerId+' .input-field_country').removeClass('input-field_error');
	$($containerId+' .input-tooltip_country').fadeOut('fast');

	$($containerId+' #show_countries').fadeIn(function(){
		drawCountryDropdownList($containerId+' #show_countries');
	});

}

function choose_country2($containerId, id,idd,iddd) {

	$($containerId+' #show_countries2').fadeOut(function(){
		$('body').removeClass("select-is-opened");
	});

	$($containerId+' .input-field_country').removeClass('input-field_error');
	$($containerId+' .input-tooltip_country').fadeOut('fast');

	if(idd !=""){
		$($containerId+' #country_label').hide();
		$($containerId+' #change_country2').html('');
		$($containerId+' #change_country2').html('<div class="flag-icon flag-icon_'+idd+'"></div>'+id);
		$($containerId+' #addr_country2').val(id);
	}else{
		$($containerId+' #country_label').show();
		$($containerId+' #addr_country2').val("");
	}

}

function showcountries2($containerId){

	$($containerId+' .input-field_country').removeClass('input-field_error');
	$($containerId+' .input-tooltip_country').fadeOut('fast');

	$($containerId+' #show_countries2').fadeIn(function(){
		drawCountryDropdownList($containerId+' #show_countries2');
	});

}


function drawCountryDropdownList($id){
	$($id).find('.select2-search__field').val("").trigger('keyup');

}

/*
*COUNTRIES FUNCTIONS
*/
function countries_callback_functions($containerId){
	$($containerId+" #inputString").keyup(function () {
		var filter = $(this).val();
		$("ul#select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results li").each(function () {
			if ($(this).text().search(new RegExp(filter, "i")) < 0) {
				$(this).hide();
			} else {
				$(this).show()
			}
		});
		

	});
	
	$($containerId+" #inputString2").keyup(function () {
		var filter = $(this).val();
		$("ul#select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-results li").each(function () {
			if ($(this).text().search(new RegExp(filter, "i")) < 0) {
				$(this).hide();
			} else {
				$(this).show()
			}
		});
		

	});
	
	$($containerId+' #showcountries,'+$containerId+' #show_countries').click(function(event){
	
		$($containerId+' #show_countries2').fadeOut('fast');
		if ($($containerId+' #show_countries').is(':visible')) {
			drawCountryDropdownList($containerId+'#show_countries');
			
			//disable tooltip on code
			$($containerId+'.input-field_phone_code_popup').removeClass('input-field_error');
			$($containerId+'.input-tooltip_phone_code_popup').fadeOut('fast');
			$($containerId+'.input-field_phone_popup').removeClass('input-field_error');
			$($containerId+'.input-tooltip_phone_popup').fadeOut('fast');
		
			$('body').addClass("select-is-opened");
			
		}else{
			$('body').removeClass("select-is-opened");
		}
		event.stopPropagation();
	});
	
	$($containerId+' #showcountries2,'+ $containerId+' #show_countries2').click(function(event){
		
		$($containerId+' #show_countries').fadeOut('fast');
		if ($($containerId+' #show_countries2').is(':visible')) {
			drawCountryDropdownList($containerId+' #show_countries2');
			$('body').addClass("select-is-opened");
			
		}else{
			$('body').removeClass("select-is-opened");
		}
		event.stopPropagation();
	});
	
}

/*
* COUNTRIES DROPDOWN HIDE
*/
function countries_fadeOut($containerId){
	
	if(!$($containerId+' #show_countries').is(':hidden')){
		
		$($containerId+' #show_countries').hide();
		$('body').removeClass("select-is-opened");
		drawCountryDropdownList($containerId+' #show_countries');
	}
	
	if(!$($containerId+' #show_countries2').is(':hidden')){
		
		$($containerId+' #show_countries2').hide();
		$('body').removeClass("select-is-opened");
		drawCountryDropdownList($containerId+' #show_countries2');
	}
}

function phone_callBack_function($containerId){
	$($containerId+" input[id*='phone_popup']").keydown(function (event) {
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
}

function refreshPopupDropdownList(){
	if ( $('#countrycode').val() != '' ) { 
	$('#get_call_popup #countyr-selected-'+$('#countrycode').val()).trigger('click');
	$('#get_call_popup #countyr-selected2-'+$('#countrycode').val()).trigger('click');
	
	$('#open_an_account-form #countyr-selected-'+$('#countrycode').val()).trigger('click');
	$('#open_an_account-form #countyr-selected2-'+$('#countrycode').val()).trigger('click');
	
	  } else { 
	 if ( $('#country').val() != '' ) { 
	$('#get_call_popup #countyr-selected-'+$('#country').val()).trigger('click');
	$('#get_call_popup #countyr-selected2-'+$('#country').val()).trigger('click');
	
	$('#open_an_account-form #countyr-selected-'+$('#country').val()).trigger('click');
	$('#open_an_account-form #countyr-selected2-'+$('#country').val()).trigger('click');
	 }} 
}
		

function requestCallbackForm(){
	
	var $containerId = $('#get_call_popup').val();
	if ( check_account_number_popup1($containerId) && check_full_name_popup1($containerId) && check_email_popup1($containerId) && check_phone_code_popup1($containerId) && check_phone_popup1($containerId) && check_country_popup1($containerId) && check_subject_popup1($containerId) && check_message_popup1($containerId) && check_captcha_result_popup1($containerId)) {
		$($containerId+' #subscribe_here_popup').attr('onClick','');
		var site_url = $('#site_url').val();
		var url = site_url+"/home/request_callback";
		
		$.post(url,{accountNumber: $($containerId+' #AccountNumber').val(), name:$($containerId+' #name_popup').val(),email:$($containerId+' #email_popup').val(),phone:$($containerId+' #phone_popup').val(), country : $($containerId+' #addr_country2').val(), subject: $($containerId+' #subject_popup').val(), message: $($containerId+' #message_popup').val(), site_url: $('#site_url').val(),  phone_code:$($containerId+' #phone_code_popup').val()}, function(data) {
			console.log(data);
			if ( data.success == 1 ) {//sent with success 
				$($containerId+' [class^="input-field_"]').removeClass('input-field_typing');
				$($containerId+' #name_popup').val('');
				$($containerId+' #email_popup').val('');
				$($containerId+' #phone_popup').val('');
				$($containerId+' #AccountNumber').val('');
				$($containerId+' #subject_popup').val('');
				$($containerId+' #message_popup').val('');
				$($containerId +' #phone_code_popup').val('');
				$($containerId +' #captcha_result_popup').val('');
				$($containerId +' #rand1').val(data.rand1);	
				$($containerId +' #rand2').val(data.rand2);
				$($containerId +' #captcha_result').val(data.result);
				
				refreshPopupDropdownList();
				
				$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
				
				$($containerId+' #finalresult_popup').show().addClass('input-tooltip_success').html($($containerId+' #email_success_sent').val());
				$('html, body').animate({
					scrollTop: $($containerId+" #finalresult_popup").offset().top - 200
				}, 2000);
				//$('#finalresult_popup').html('<h4 style="color:green"><img src="images/landing/confirm.gif"  /> Sent successfully</h4>');
				setTimeout(function(){
					$($containerId+' #finalresult_popup').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();
				}, 5000);

			} else {
				//$($containerId+' #finalresult_popup').show().addClass('input-tooltip_error').html($('#email_already_exist').val());
				$('html, body').animate({
					scrollTop: $($containerId+" #finalresult_popup").offset().top - 200
				}, 2000);
			}
		})
		  .done(function(data) {
		   //$('#finalresult_popup').html(data);
		   $($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
		  })
		  .fail(function(data) {
		  // $('#finalresult').html(data);

		  })
		  .always(function(data) {
		  // $('#finalresult').html(data);
		  });
		} else{
			$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
		}
}


function check_phone_popup1($containerId){
	
	clearresult($containerId);
	var str = $($containerId +' #phone_popup').val();
	
	//add typing class to the field when start typing
	if(str !=""){
		$($containerId+' .input-field_phone_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_phone_popup').removeClass('input-field_typing');
	}
	
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

function check_country_popup1($containerId){
	
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

function check_phone_code_popup1($containerId){
	
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
	return false;
}

function clearresult($containerId){
	$($containerId+' #finalresult').removeClass('input-tooltip_success').removeClass('input-tooltip_error').hide();
}

function check_account_number_popup1($containerId){
	
	clearresult($containerId);

	var str = $($containerId +' #AccountNumber').val();
	
	//add typing class to the field when start typing
	if(str !=""){
		$($containerId+' .input-field_acc_number_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_acc_number_popup').removeClass('input-field_typing');
	}
	
	//check if password has case sensitive and contain capital letter and numbers
	var strongRegex = new RegExp("^[0-9]+$");
	var test = strongRegex.test(str);   // true
	
	if(test && str.length == 6 || str==""){
		$($containerId +' .input-field_acc_number_popup').removeClass('input-field_error');

		$($containerId +' .input-tooltip_acc_number_popup').fadeOut('fast');

		return true;
	}else{
		$($containerId +' .input-field_acc_number_popup').addClass('input-field_error');

		$($containerId +' .input-tooltip_acc_number_popup').fadeIn('fast');

		return false;
	}
	return false;

}
function check_full_name_popup1($containerId){
	clearresult($containerId);
	var row = $($containerId+' #name_popup').val();
	var result = row.split(' ');
	
	//add typing class to the field when start typing
	if(row !=""){
		$($containerId+' .input-field_name_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_name_popup').removeClass('input-field_typing');
	}
	
	if (/\s/.test(row)) {
		if ( result[0] != '' && result[1] != ''  ){
			$($containerId+' .input-field_name_popup').removeClass('input-field_error');
			$($containerId+' .input-tooltip_name_popup').fadeOut('fast');
			$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
			return true;
		} else {
			$($containerId+' .input-field_name_popup').addClass('input-field_error');
			$($containerId+' .input-tooltip_name_popup').fadeIn('fast');
			$($containerId+' #subscribe_here_popup').attr('onClick','');
			return false;
		}
	} else {
		$($containerId+' .input-field_name_popup').addClass('input-field_error');
		$($containerId+' .input-tooltip_name_popup').fadeIn('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','');
		return false;
	}
	return false;
}
function check_email_popup1($containerId){
	
	clearresult($containerId);
	var row = $($containerId+' #email_popup').val();
	
	//add typing class to the field when start typing
	if(row !=""){
		$($containerId+' .input-field_email_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_email_popup').removeClass('input-field_typing');
	}
	if ( row != '' && isValidEmailAddress(row)  ){
		$($containerId+' .input-field_email_popup').removeClass('input-field_error');
		$($containerId+' .input-tooltip_email_popup').fadeOut('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
		return true;
	} else {
		$($containerId+' .input-field_email_popup').addClass('input-field_error');
		$($containerId+' .input-tooltip_email_popup').fadeIn('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','');
		return false;
	}
	return false;
}

function check_subject_popup1($containerId){
	
	clearresult($containerId);
	var row = $($containerId+' #subject_popup').val();
	
	//add typing class to the field when start typing
	if(row !=""){
		$($containerId+' .input-field_subject_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_subject_popup').removeClass('input-field_typing');
	}
	
	if ( row != ''  ){
		$($containerId+' .input-field_subject_popup').removeClass('input-field_error');
		$($containerId+' .input-tooltip_subject_popup').fadeOut('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
		return true;
	} else {
		$($containerId+' .input-field_subject_popup').addClass('input-field_error');
		$($containerId+' .input-tooltip_subject_popup').fadeIn('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','');
		return false;
	}
	return false;
}
function check_message_popup1($containerId){
	
	clearresult($containerId);
	var row = $($containerId+' #message_popup').val();
	
	//add typing class to the field when start typing
	if(row !=""){
		$($containerId+' .input-field_message_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_message_popup').removeClass('input-field_typing');
	}
	
	if ( row != ''  ){
		$($containerId+' .input-field_message_popup').removeClass('input-field_error');
		$($containerId+' .input-tooltip_message_popup').fadeOut('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
		return true;
	} else {
		$($containerId+' .input-field_message_popup').addClass('input-field_error');
		$($containerId+' .input-tooltip_message_popup').fadeIn('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','');
		return false;
	}
	return false;
}

function check_captcha_result_popup1($containerId){
	
	clearresult($containerId);
	var row = $($containerId+' #captcha_result_popup').val();
	var row1 = $($containerId+' #captcha_result').val();
	
	//add typing class to the field when start typing
	if(row !=""){
		$($containerId+' .input-field_captcha_result_popup').addClass('input-field_typing');
	}else{
		$($containerId+' .input-field_captcha_result_popup').removeClass('input-field_typing');
	}
	
	if ( row != '' && (row ==  row1)){
		$($containerId+' .input-field_captcha_result_popup').removeClass('input-field_error');
		$($containerId+' .input-tooltip_captcha_result_popup').fadeOut('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','requestCallbackForm()');
		return true;
	} else {
		$($containerId+' .input-field_captcha_result_popup').addClass('input-field_error');
		$($containerId+' .input-tooltip_captcha_result_popup').fadeIn('fast');
		$($containerId+' #subscribe_here_popup').attr('onClick','');
		return false;
	}
	return false;
}

function showSupportMenu($menuId, $directionClass){
	$('.mobile-support a').toggleClass('active');
	$('.mobile-support a #contact-i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');

	if($directionClass == 'cbp-spmenu-right'){
		$('body').toggleClass('cbp-spmenu-push-toleft');
	}
	else {//cbp-spmenu-left
		$('body').toggleClass('cbp-spmenu-push-toright');
	}
	$('#'+$menuId).toggleClass('cbp-spmenu-open');
}

 
 function closespmenu(){
	 if($('.cbp-spmenu').hasClass('cbp-spmenu-open')){
		 $('.cbp-spmenu').removeClass('cbp-spmenu-open').toggleClass('disabled');
		 $('body').removeClass('cbp-spmenu-push-toright').removeClass('cbp-spmenu-push-toleft');
		 $('.mobile-support a').removeClass('active');
		 $('.mobile-support a #contact-i').removeClass('fa-angle-right').addClass('fa-angle-down');
	 }
}

/*
* Ready document
*/
$(document).ready(function(){
	
	$('li.mobile-lang').click(function(){
		$(this).toggleClass('active');
	});
	
	
	 if($( window ).width() > 768){
		$('.call-button-block').click(function(){
				showpopup('#get_call_popup');
		});
	}else{
		hidepopup('#get_call_popup');
	}
	
	// Trigger functiobs of countries
	countries_callback_functions('#get_call_popup');
	
	$(window).click(function() {
		
		//hide countries dropdownbox on window click
		countries_fadeOut('#get_call_popup');
	});
	
	//Phone number KeyDown Event trigger
	phone_callBack_function('#get_call_popup');
	
   	// Get the header
   	var header = $("header");
   	var header2 = $(".header_first_row");
   
   	// Get the offset position of the navbar
   	var sticky = header.offset().top+90;
   	
   	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
   /*
	* HEADER SCROLL
	*/
	function headerScroll() {
	   
		if ( $(window).width() > 1140 ) {
		  if (window.pageYOffset > sticky) {
			//Add the fixed menu class to the header	
			header.addClass("fixed_menu");
			header2.addClass("fixed_menu_2");

			$('#content').css('margin-top',162);

		  } else {

			header.removeClass("fixed_menu");
			header2.removeClass("fixed_menu_2");

			$('#content').css('margin-top',0);

		  }

		}else{

			header.removeClass("fixed_menu");
			header2.removeClass("fixed_menu_2");

			$('#content').css('margin-top',0);

		}
	}

   	//header on scroll actions
   	$(window).scroll(headerScroll);
   	$(window).resize(headerScroll);
	
	var n = "language-global-menu";
	
	//Show Language evnet click
	$(".show_languages").unbind().bind("click", function(t) {
		
        $('.languages_bar').slideToggle(function(){
			var hidden = $(this).is(":hidden");
			if (!hidden) {
				$(".show_languages").find('font i').removeClass('fa-angle-down').addClass('fa-angle-up');
			}else{
				$(".show_languages").find('font i').removeClass('fa-angle-up').addClass('fa-angle-down');
			}
		});
		
		t.stopPropagation();
        t.preventDefault();
       
    });
	
	/*$('#close_lang').unbind().bind("click", function(n) {
		$('.languages_bar').slideToggle('fast');
		n.stopPropagation();
		n.preventDefault();
	});*/
	
	// Click Action on each language link
	$('.language-global-menu').find('.langs li').each(function(){
		var li = $(this);
		li.click(function(){
			var link = li.find('a');
			var href = link.attr('href');
			location.replace(href);
		});
		
	});
	
	$("#get_call_popup input[type='radio']").change(function(){
		// Do something interesting here
		var value = $(this).val();
		if(value == 'True'){
			$('#AccountNumber').prop("disabled", false);
		}else if(value == 'False'){
			$('#AccountNumber').prop("disabled", true);
		}
	});
	
	$("#get_call_popup input[type='radio']").trigger('change');
	
	$('#openRequestCallback').unbind().bind('click',function(e){
		e.preventDefault();
		showpopup('#get_call_popup');
		
	});
	
	$('#showSupportMenu').unbind().bind('click',function(e){
		e.preventDefault();
		var directionClass = $('#directionClass').val();
		showSupportMenu('cbp-spmenu-s1',directionClass);
		
	});
	
	refreshPopupDropdownList();
	$(window).scroll(closespmenu);
 });

 
 
 
