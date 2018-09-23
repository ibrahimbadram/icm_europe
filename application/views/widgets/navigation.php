<?
	//load content
	$this->lang->load('content');
		
	$dir = 'ltr';
	if($this->lang->lang() == 'ar' || $this->lang->lang() == 'fa'){
		$dir = 'rtl';
	}
	$languages = $this->sm->getAllrecords_nowebsite('tbl_languages', array('active'=>1));
	
	
   function get_url_contents2($url) {
   
	   $crl = curl_init();
	   curl_setopt($crl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
	   curl_setopt($crl, CURLOPT_URL, $url);
	   curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, 1);
	   
	   $ret = curl_exec($crl);
	   curl_close($crl);
	   
	   return $ret;
   }
   
   $uri1 = $this->uri->segment(1);
   $uri2 = $this->uri->segment(2);
   
   
   
   function getClientIP2(){
   
     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
       $ip = $_SERVER['HTTP_CLIENT_IP'];
     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     } else {
       $ip = $_SERVER['REMOTE_ADDR'];
     }
   
     return $ip;
   
   }
   
   $ipaddress = getClientIP2();
   
   function ip_detailsnav($ip) {
     $json = get_url_contents2("http://ipinfo.io/{$ip}/geo");
     $details = json_decode($json, true);
     return $details;
   
   }
   
   $details = ip_detailsnav($ipaddress);
   

	$ip = NULL;
	$purpose = "location";
	$deep_detect = TRUE;
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
//$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
$ipdat = @json_decode(get_url_contents2("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                   $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
   $show=0;
   
   
   if ( isset($output['countrycode'])) {
	   $countrycode = strtoupper ($output['countrycode']);
	   if ( $countrycode == 'IR' || $countrycode == 'AF' || $countrycode == 'IRN' || strtoupper ($details['countrycode']) == 'IR'  ) {
			$show=1;
	   }
   }
   
   if ( isset($output['country'])) {
	   $country = strtoupper ($output['country']);
	   if ( $country == 'IRAN' || $country == 'AFGANISTAN' || strtoupper ($details['country']) == 'IRAN'  ) {
			$show=1;
	   }
   }
   
    $country = $output['country'];
	$countrycode = $output['country_code'];

   ?>
   
<? /* div class="feedback-buttons">
   <a href="mailto:support@icm.com" class="feedback-buttons__button feedback-buttons__button_mail" data-popup="#ContactUsPopupForm">
   <img class="feedback-buttons__button__icon" src="assets/images/support/mail_main.svg" alt="Mail">
   <span><? echo $this->sm->getword('MAIL',$this->lg)?></span>
   </a>
   <a href="tel:00442074425610" class="feedback-buttons__button feedback-buttons__button_call" data-popup="#RequestCallbackPopupForm">
   <img class="feedback-buttons__button__icon" src="assets/images/support/phone_main.svg" alt="Call">
   <span><? echo $this->sm->getword('Call',$this->lg)?></span>
   </a>
   <a href="javascript:$zopim.livechat.window.show()" class="feedback-buttons__button feedback-buttons__button_chat">
   <img class="feedback-buttons__button__icon" src="assets/images/support/chat_main.svg" alt="">
   <span><? echo $this->sm->getword('Chat',$this->lg)?></span>
   </a>
</div> */ ?>
<div class="popup-shadow" onClick="hidepopup('#get_call_popup')"  ></div>
<div class="popup-shadow-2"   ></div>
<div class="popup-section" id="get_call_popup" style="display:none">
	<img class="close-it" src="assets/images/close.png" onClick="hidepopup('#get_call_popup')"  />
	<input type="hidden" value="<?=$this->session->userdata('captcha_result')?>" id="captcha_result">
	<div class="text-container" >
	<h3 class="text-center"></strong>GET A CALL</strong></h3>
	<div class="full-width home_newsletter" style="background:none" >
	<input type="hidden" name="lang_ref" id="lang_ref" value="<?=$this->lang->lang()?>">
	<div class="full-width">
		<div class="full-width">
			<div class="col-lg-6 col-md-6 col-sm-4 existing_client_container" style="padding:0">
				<div class="form-group">
					
						<label class="existing_client_label">Existing Client?</label>
						<div class="anoying_radio">
							<input class="existing-client" data-val="true" data-val-required="'Is Existing Client' must not be empty." id="IsExistingClient_True" name="IsExistingClient" type="radio" value="True"><label for="IsExistingClient_True">Yes</label>
							<input checked="checked" class="existing-client form-control" id="IsExistingClient_False" name="IsExistingClient" type="radio" value="False"><label for="IsExistingClient_False">No</label>
							<span class="field-validation-valid" data-valmsg-for="IsExistingClient" data-valmsg-replace="true"></span>
						</div>
					
				</div>
			</div>
			<div class="col-md-6 col-md-6  col-sm-8 acc_number_container" style="padding-right:0">
				<div class="form-group">
					<div class="input-field input-field_width_full input-field_acc_number_popup">
						<div class="account-number-wrapper">
							<label class="input-field__label input-field__label_placeholder">Account Number</label>
							<input class="form-control input-field_acc_number_popup normal-input" dir="ltr" id="AccountNumber" name="AccountNumber"  type="tel" value=""  onKeyUp="check_account_number_popup1('#get_call_popup')">
							<div class="input-tooltip input-tooltip_acc_number_popup input-tooltip_error" style="display:none" ><?=$this->sm->getword('Invalid number format', $this->lg)?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="full-width input-field_name_popup">
		<div class="col-amd">
			<div class="form-group">
				<label class="input-field__label input-field__label_placeholder"><?=lang('home_full_name_placeholder')?><sup>*</sup></label>
				<input class="form-control input-field_name_popup" type="text" id="name_popup" name="name_popup" onKeyUp="check_full_name_popup1('#get_call_popup')">
				<div class="input-tooltip input-tooltip_name_popup input-tooltip_error" style="display:none" ><?=lang('home_full_name_error_msg')?></div>
			</div>
		</div>
	</div>
	<div class="full-width input-field_email_popup">
		<div class="col-amd">
			<div class="form-group">
			<label class="input-field__label input-field__label_placeholder"><?=lang('home_email_placeholder')?><sup>*</sup></label>
			<input class="form-control input-field_email_popup input-field__input_is-address" type="text"  id="email_popup" name="email_popup" onKeyUp="check_email_popup1('#get_call_popup')">
			<div class="input-tooltip input-tooltip_error input-tooltip_email_popup" style="display:none" ><?=lang('home_email_error_msg')?></div>
			</div>
		</div>
	</div>
	 <div class="full-width form__field phone_container input-field_phone_code_popup">
			<input type="hidden" id="phone_code_label" value="<?=lang('code')?>"/>
			<div class="col-bmd-3">
			<div class="form-group">
			<!--<input class="form-control input-field_phone_code_popup input-field__input_is-number" type="text" placeholder="<? echo $this->sm->getword('country code',$this->lg)?>" id="phone_code_popup" name="phone_code_popup" onKeyUp="check_phone_code_popup1()" >-->
			<select class="form-control input-select__input select2-hidden-accessible " id="phone_code_popup" name="phone_code_popup" tabindex="-1" aria-hidden="true" onchange="check_phone_code_popup1('#get_call_popup')">
			<option value="" selected="selected" ></option>
			<?php
			$contries = $this->sm->getAllrecords_nowebsite('country','','name');
			foreach ($contries as $row){
			?>
			<option value="<?=$row['iso']?>">
			<?=$row['name']?>
			</option>
			<?php } ?>
			</select>
			<input type="hidden" id="telephonecodeval" >
			<span class="select2 select2-container select2-container--default" <?=$dir?> style=""> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" onClick="showcountries('#get_call_popup')" id="showcountries"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" >
			<div id="change_country">
			<div class="flag-icon flag-icon_af" style="background:none" ><?=lang('code')?><sup>*</sup></div>
			</div>
			</span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below show_countries" id="show_countries"  <?=$dir?> style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
			<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString">
			</span> <span class="select2-results">
			<ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results" aria-expanded="true" aria-hidden="false" <?=$dir?>>
			<?php
			foreach ($contries as $row){
			?>
			<li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country('#get_call_popup','<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
			<div class="flag-icon flag-icon_<?=strtolower($row['iso'] )?>"></div>
			<?=$row['name']?>
			</span></li>
			<?php
			}
			?>
			</ul>
			</span> </span> </span> 

			<div class="input-tooltip input-tooltip_error input-tooltip_phone_code_popup" style="display:none" ><?=lang('home_phone_code_error_msg')?></div>
			</div>
			</div>
			<div class="col-bmd-4">
				  
				  <div class="form__field">
					  <div class="input-field input-field_width_full input-field_phone_popup">
						<div class="input-field__wrapper">
						 <label class="input-field__label input-field__label_placeholder">
							<?=lang('home_phone_placeholder')?><sup>*</sup>
						  </label>
						 <input type="tel" name="phone" id="phone_popup"  class="form-control input-field_phone_popup input-field__input input-field__input_is-number" onkeyup="check_phone_popup1('#get_call_popup')" style="width:100%;">
						</div>
					  </div>
					  <div class="input-tooltip input-tooltip_phone_popup input-tooltip_error" style="display:none" >
						<?=$this->sm->getword('Invalid format (i.e. +44 20 7234 3456).', $this->lg)?>
					  </div>
					</div>
			</div>
		</div>
        <div class="full-width form__field">
			<div class="col-amd">
				<div class="form-group" id="country_residence_container">
				<input type="hidden" id="country_residence_label" value="<?=$this->sm->getword('Country of Residence', $this->lg)?>"/>
			  <div class="input-select input-select_width_full input-field_country">
			   <label class="input-select__label" id="country_label"> <?=$this->sm->getword('Country of Residence', $this->lg)?><sup>*</sup></label>
				<select class="form-control input-select__input select2-hidden-accessible" id="addr_country2" name="addr_country2" tabindex="-1" aria-hidden="true">
				  <option value="" selected="selected" ></option>
				  <?php
	$contries = $this->sm->getAllrecords_nowebsite('country','','name');
	foreach ($contries as $row){
	 ?>
				  <option value="<?=$row['iso']?>">
				  <?=$row['name']?>
				  </option>
				  <?php } ?>
				</select>
				<span class="select2 select2-container select2-container--default" <?=$dir?> style="    height: 55px;"> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-container" onClick="showcountries2('#get_call_popup')" id="showcountries2"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-container" >
				<div id="change_country2">
				  <div class="flag-icon flag-icon_af" style="background:none" ></div>
				</div>
				</span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below show_countries2" id="show_countries2"  <?=$dir?> style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
				<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString2">
				</span> <span class="select2-results">
				<ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-results" aria-expanded="true" aria-hidden="false" <?=$dir?>>
				  <?php
	foreach ($contries as $row){
	 ?>
				  <li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected2-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country2('#get_call_popup','<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
					<div class="flag-icon flag-icon_<?=strtolower($row['iso'] )?>"></div>
					<?=$row['name']?>
					</span></li>
				  <?php
	}
	 ?>
				</ul>
				</span> </span> </span> 
				</div>
			  <div class="input-tooltip input-tooltip_error input-tooltip_country" style="display:none" >
				<?=$this->sm->getword('Country is required', $this->lg)?>.
			  </div>
			</div>
			</div>
        </div>
	<div class="full-width input-field_subject_popup">
		<div class="col-amd">
			<div class="form-group">
			<label class="input-field__label input-field__label_placeholder">Subject<sup>*</sup></label>
			<input class="form-control input-field_subject_popup" type="text"  id="subject_popup" name="subject_popup" onKeyUp="check_subject_popup1('#get_call_popup')">
			<div class="input-tooltip input-tooltip_error input-tooltip_subject_popup" style="display:none" >Subject is required</div>
			</div>
		</div>
	</div>
	<div class="full-width  input-field_message_popup">
		<div class="col-amd">
			<div class="form-group">
			<label class="input-field__label input-field__label_placeholder">Message<sup>*</sup> </label>
			<textarea class="form-control input-field_message_popup" id="message_popup" name="message_popup" onKeyUp="check_message_popup1('#get_call_popup')"></textarea>
			<div class="input-tooltip input-tooltip_error input-tooltip_message_popup" style="display:none" >Message is required</div>
			</div>
		</div>
	</div>
	<div class="full-width">
		<div class="col-md-8 col-xs-12" style="padding:0">
			 <table>
				<tr>
				  <td align="top"><span id="captcha_shape">
					<span id="rand1"><?=$rand1?></span>
					+
					<span id="rand2"><?=$rand2?></span>
					</span><sup>*</sup></td>
				  <td style="padding-left:10px;" align="top">
				  <div class="full-width input-field_captcha_result_popup">
					<div class="col-amd">
				  <div class="form-group">
				  <label class="input-field__label input-field__label_placeholder">Type your result here<sup>*</sup> </label>
				  <input type="tel" name="captcha" class="form-control normal-input captcha input-field_captcha_result_popup" onKeyUp="check_captcha_result_popup1('#get_call_popup')" id="captcha_result_popup" pattern="[0-9]*"/>
				  <div class="input-tooltip input-tooltip_error input-tooltip_captcha_result_popup" style="display:none" >Wrong Captcha!</div>
				  </div>
				  </div>
				  </div>
			</div>
				  </td>
				</tr>
			  </table>
		</div>
		<div class="col-md-4 col-xs-12" id="subscribe_here_popup_container">
			<div class="flex-display align-items-center">
			<button class="btn btn-primary" onClick="requestCallbackForm()" id="subscribe_here_popup">Request CallBack</button>
			</div>
		</div>
		<div class="full-width margin-b-20">
			<div class="col-amd">
			<div class="input-tooltip text-center" style="display:none" id="finalresult_popup"></div>
			</div>
		</div>
	</div>
	
	</div>
	</div>
	</div>

</div>

<div id="feedback-buttons-block">
	<div class="mail-button"><a href="mailto:support@icm.com" rel="<?=$this->lg?>" class="feedback-iframe"><? echo $this->sm->getword('MAIL',$this->lg)?></a></div>
	<div class="livechat-button">
	<noindex><a rel="nofollow" href="javascript:$zopim.livechat.window.show()" class="js-livechatinc" ><? echo $this->sm->getword('Chat',$this->lg)?></a></noindex>
	</div>
	<div class="call-button-block"><a class="call-button" rel="<?=$this->lg?>" onClick="javascript: showpopup('#get_call_popup');return false;"><? echo $this->sm->getword('Call',$this->lg)?></a></div>
</div>
<div id="mobile-feedback-block">
	<noindex>
	<!--a rel="nofollow" href="#" onclick="javascript:$zopim.livechat.window.show(); return false;">Live Chat
	</a-->
	<a  href="mailto:support@icm.com"><? echo $this->sm->getword('MAIL',$this->lg)?>
	</a>
	&nbsp;
	<a  <?/*onClick="showpopup('#get_call_popup')"*/?> id="openRequestCallback"><? echo $this->sm->getword('Call',$this->lg)?>
	</a>
	</noindex>
</div>

<div class="leftSideSocialMedia social_<?=$this->lg?> background_navy">
	<div class="relative social-icons font_14" >
	   <span class="social_media floatright relative">
		   <span class="white_color">
			   <a href="https://www.instagram.com/ICMCapital/" target="_blank" >
			   <i class="fa fa-instagram"></i></a>
			   <a href="https://www.facebook.com/ICMCapital" target="_blank" >
			   <i class="fa fa-facebook-official"></i></a>
			   <a href="https://www.twitter.com/ICMCapital" target="_blank" >
			   <i class="fa fa-twitter"></i></a>
			   <a href="https://www.linkedin.com/company/icm-capital" target="_blank" >
			   <i class="fa fa-linkedin"></i></a>
		   </span>
	   </span>
	</div>
</div>
<header class="full-width header_<?=$this->lg?>">
   <div class="full_width header_first_row">
		<div class="container">
			<div class="header_logo floatleft relative">
				<a href="<?=site_url('home')?>">
				<?/*<? if($this->lg == 'ar' || $this->lg== 'fa'){?>
				<img src="assets/images/sponsors-icm.jpg" class="sponsors_logo">
				<img src="assets/images/logo.png" class="margin-top-down-10">
				<? }else{ ?>*/?>
				<div class="logo-A">
					<div>
						<img src="assets/images/logo.png" class="margin-top-down-10 l-logo">
					</div>
					
				</div>
				</a>
				<?/*<img src="assets/images/sponsors-icm.jpg" class="sponsors_logo">*/ ?>
				<div class="sponsors_logo">
					<div class="logo_container">
						
						<a href="<?=site_url('company_news/ICMcom-Proud-Premier-League-Fulham-FC-Shirt-Sleeve-Sponsor')?>"><img src="assets/images/menu/top/fulham.png" class="fullham-logo">
						</a>
						<div class="logo_separator"></div>
						<img src="assets/images/menu/top/polo.jpg" class="polo-logo">
						<div class="logo_separator"></div>
						<img src="assets/images/menu/top/cycling.jpg" class="cyclink-logo">
					</div>
				</div>
				<div class="sponsors_logo_mobile">
						<img src="assets/images/menu/top/sponsors_logo_mobile.jpg" class="sponsors_logo_mobile-logo">
				</div>
				<?/*<? } ?> 
				</a>*/?>
				<div class="none_burger_menu burger_menu" onclick="slide_menu()"></div>
				
			 </div>
			 <div class=" floatright header-top-right-container" >
			<div class="floatleft margin-top-8 header_first_row_width header-row" style="direction:ltr" >
					<div class="floatright social-icons font_14" >
					  
					   <div class="header_language floatright  pointer show_languages">
						  <!--<i class="fa fa-globe white_color margin-right-5"></i>-->
						  <img src="assets/images/languages/<?=$this->lg?>.png" class="active_lang"><font class=""> <i class="fa fa-angle-down"></i>  </font>
						  <div class="languages_bar language-global-menu">
								<div class="relative">
								 <?
									
									if(!empty($languages)){
										
								 ?>
								 <ul class="langs">
									<?
										foreach($languages as $lang){
											if($lang['prefix'] != $this->lg){
									?>
									<? if ( $lang['prefix'] == 'fa' /*&& $show == 1 */ ) {  ?>
									<li>
										<a href="<?php echo $this->lang->switch_uri($lang['prefix']); ?>"  lang="<?=$lang['prefix']?>">
										<div class="language_bar">
											  <img src="assets/images/languages/<?=$lang['prefix']?>.png">
										   </div>
										<span><? echo $lang['title']?></span></a>
									</li>
									<? }else if($lang['prefix'] != 'fa') { 
											
									?>
									<li >
										<a href="<?php echo $this->lang->switch_uri($lang['prefix']); ?>" lang="<?=$lang['prefix']?>">
											<div class="language_bar">
											  <img src="assets/images/languages/<?=$lang['prefix']?>.png">
										   </div>
												   
										<span><? echo $lang['title']?></span>
										</a>
									</li>
									<? } ?>
									
									<?
										} } 
									?>
									<? /*
									<a href="javascript:void(0)" class="btn-div-close" id="close_lang">
										Close
										<i class="fa fa-close"></i>
									</a>    */ ?>
									</ul>
									<? }   ?>
											</div>
											</div>
									  </div>
								   </div>
					
					<span class="top-menu-separator floatright"></span>
					<?
						$directionClass = 'cbp-spmenu-right';
						if($this->lg == 'ar' ||  $this->lg == 'fa'){
							$directionClass = 'cbp-spmenu-left';
						}
					?>
					<input type="hidden" id="directionClass" value="<?=$directionClass?>">
					<span class="mobile-support floatright relative">
						<?/*<a href="tel:+442074425610">*/?>
						<a id="showSupportMenu" <?/*onClick="showSupportMenu('cbp-spmenu-s1','<?=$directionClass?>')"*/?>>
						<span class="">
						<?/*<img src="assets/images/menu/contact icon-01.jpg"> */?>
						<!--<i class="fa fa-phone " ></i> -->
						<?/*<font class="hide-mobile"  >+44 207 442 5610 </font>*/?>
						<i class="fa fa-envelope"></i> 
						<font ><? echo $this->sm->getword('Contact Us',$this->lg)?> <i class="fa fa-angle-down" id="contact-i"></i>  </font>
						</span>
						</a>
					</span>
					<!--<span class="email-support floatright relative">
						<?/*<a href="mailto:support@icm.com">*/?>
						<a onClick="showSupportMenu('cbp-spmenu-s2','<?=$directionClass?>')">
						<span class=" ">
						<i class="fa fa-envelope " ></i> 
						<?/*<font class="hide-mobile" >support@icm.com<i class="fa fa-angle-down"></i></font>*/?>
						<font class="hide-mobile" >Send An Email <i class="fa fa-angle-down"></i>  </font>

						</span>
						</a>
					</span>-->
					<nav class="cbp-spmenu cbp-spmenu-vertical <?=$directionClass?>" id="cbp-spmenu-s1">
						
						<h1><? echo $this->sm->getword('Contact Us',$this->lg)?><span class="closespmenu" onClick="closespmenu()">X</span></h1>
						<h5><i class="fa fa-phone" ></i> Via Phone</h5>
						<hr>
						<a href="tel:+442076349770">UK <span class="floatright">+44 207 634 9770</span></a>
						<a href="tel:+442076349779">VC <span class="floatright">+44 207 634 9779</span></a>
						<a href="tel:+35725251100" class="last">EU <span class="floatright">+357 2525 1100</span></a>
						<h5><i class="fa fa-envelope" ></i> Via Email</h5>
						<hr>
						<a href="mailto:support@icm.com">GLOBAL<span class="floatright">support@icm.com</span></a>
						<a href="mailto:support@icmcapital.co.uk">UK <span class="floatright">support@icmcapital.co.uk</span></a>
						<a href="mailto:support@icmcapital.com">VC <span class="floatright">support@icmcapital.com</span></a>
						<a href="mailto:support@icmtrader.eu" class="last">EU <span class="floatright">support@icmtrader.eu</span></a>
					</nav>
				</div>
				
				<div class="header-row links-holder">
					<a href="<?=site_url('icm_access')?>">
					<span class="white_color relative floatright light_blue_bg pointer padding-10 margin-left-10  icm-access transition-5ms ">
					<? echo $this->sm->getword('ICM ACCESS',$this->lg)?></span>
					</a>
					<a href="<?=site_url('account/real')?>" >
					<span class="white_color relative floatright none_tablet_and_mobile margin-left-10 padding-10 background_dark_grey button-amd real-account transition-5ms /*padding-10-75*/ shine-btn">
					<? echo $this->sm->getword('CREATE A ACCOUNT ',$this->lg)?></span>
					</a>
					
				</div>
				
			 </div>
		</div>
   </div>
   <div class="full_width header_second_row">
      <div  class="header_container">
         <div class="header_menu floatright relative /*flex-display align-items-center*/">
			<!--<div class="investment_house_logo">
				<img src="assets/images/menu/top/investment_house.png" class="slogon-logo">
			</div>-->
			<div class="main_menu_container /*width-100*/">
            <ul class="full-width none_menu main_menu" <? if($this->lg == 'ar' || $this->lg == 'fa'){echo'style="direction:rtl;"';}?>>
				<li class="mobile-lang">
					<img src="assets/images/languages/<?=$this->lg?>.png" class="active_lang"><font class=""> <i class="fa fa-angle-down"></i>  </font>
					<?
									
									if(!empty($languages)){
										
								 ?>
								 <ul class="langs">
									<?
										foreach($languages as $lang){
											if($lang['prefix'] != $this->lg){
									?>
									<? if ( $lang['prefix'] == 'fa' /*&& $show == 1 */ ) {  ?>
									<li>
										<a href="<?php echo $this->lang->switch_uri($lang['prefix']); ?>"  lang="<?=$lang['prefix']?>">
										<div class="language_bar">
											  <img src="assets/images/languages/<?=$lang['prefix']?>.png">
										   </div>
										<span><? echo $lang['title']?></span></a>
									</li>
									<? }else if($lang['prefix'] != 'fa') { 
											
									?>
									<li >
										<a href="<?php echo $this->lang->switch_uri($lang['prefix']); ?>" lang="<?=$lang['prefix']?>">
											<div class="language_bar">
											  <img src="assets/images/languages/<?=$lang['prefix']?>.png">
										   </div>
												   
										<span><? echo $lang['title']?></span>
										</a>
									</li>
									<? } ?>
									
									<?
										} } 
									?>
									<? /*
									<a href="javascript:void(0)" class="btn-div-close" id="close_lang">
										Close
										<i class="fa fa-close"></i>
									</a>    */ ?>
									</ul>
									<? }   ?>
				</li>
               <li class="parent_menu <? if ( $uri1 == 'about_us' ) echo "active_menu_link";?>" id="parent_1" data-id="parent_1">
                  <a onclick="slide_inner_menu(1,'<?=$this->lg?>/about_us')">
                  <font>
                  <? echo $this->sm->getword('About Us',$this->lg)?>
                  </font></a>
                  <span class="menu_inner inner_menu_1 ">
                  <a href="<?=site_url('about_us/profile')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'profile' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Profile',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/regulations')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'regulations' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Regulations',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/advantages')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'advantages' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Advantages',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/careers')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'careers' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Careers',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/contact_us')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'contact_us' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Contact us',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/news')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'news' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('News',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/awards')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'awards' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Awards',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/gallery')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'gallery' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Gallery',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/sponsorships')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'sponsorships' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Sponsorships',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/sr')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'sr' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('CSR',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/events')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'events' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Events',$this->lg)?></span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'accounts' ) echo "active_menu_link";?>" id="parent_2" data-id="parent_2">
                  <a onclick="slide_inner_menu(2,'<?=$this->lg?>/accounts')">
                  <font>
                  <? echo $this->sm->getword('Accounts',$this->lg)?>
                  </font></a>
                  <span class="menu_inner inner_menu_2 ">
                  <a href="<?=site_url('accounts/type')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'type' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Account Types',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('accounts/opening')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'opening' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Account Opening',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'funding' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Account Funding',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('accounts/faqs')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'faqs' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Account FAQS',$this->lg)?></span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'products' ) echo "active_menu_link";?>" id="parent_3" data-id="parent_3">
                  <a onclick="slide_inner_menu(3,'<?=$this->lg?>/products')" >
                  <font><? echo $this->sm->getword('Products',$this->lg)?></font></a>
                  <span class="menu_inner inner_menu_3">
                  <a href="<?=site_url('products/spot-forex')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'spot-forex' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Spot Forex',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/precious-metals')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'precious-metals' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Precious Metals',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/us-stocks')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'us-stocks' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('US Stocks',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/currency-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'currency-futures' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Currency Futures',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/energy-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'energy-futures' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Energy Futures',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/index-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'index-futures' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Index Futures',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/metals-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'metals-futures' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Metals Futures',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/cryptocurrencies')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'cryptocurrencies' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('CryptoCurrencies',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('products/specifications')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'specifications' ) echo "active_menu_link";?>">
                  Specifications</span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'platforms' ) echo "active_menu_link";?>" id="parent_4" data-id="parent_4">
                  <a onclick="slide_inner_menu(4,'<?=$this->lg?>/platforms/mt4_all')">
                  <font><? echo $this->sm->getword('Platforms',$this->lg)?>
                  </font></a>
                  <span class="menu_inner inner_menu_4">
                  <a href="<?=site_url('platforms/mt4_desktop')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_desktop' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT4 Desktop',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt4_web')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_web' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT4 Web',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt4_mac')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_mac' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT4 Mac',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_iphone')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_iphone' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT4 Iphone',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_android')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_android' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT4 Android',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_desktop')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_desktop' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT5 Desktop',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_web')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_web' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT5 Web',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_mac')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_mac' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT5 Mac',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_iphone')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_iphone' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT5 Iphone',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_android')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_android' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('MT5 Android',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_desktop')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_desktop' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('cTrader Desktop',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_web')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_web' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('cTrader Web',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_mac')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_mac' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('cTrader mac',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_iphone')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_iphone' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('cTrader Iphone',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_android')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_android' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('cTrader Android',$this->lg)?>
                  </span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'partners' ) echo "active_menu_link";?>" id="parent_5" data-id="parent_5">
                  <a onclick="slide_inner_menu(5,'<?=$this->lg?>/partners')">
                  <font><? echo $this->sm->getword('Partners',$this->lg)?>
                  </font></a>
                  <span class="menu_inner inner_menu_5">
                  <a href="<?=site_url('partners/partnership-programs')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'partners' && $uri2 == 'partnership-programs' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Partnership Programs',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('partners/icm-agent')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'partners' && $uri2 == 'icm-agent' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('ICM Agent',$this->lg)?>
                  </span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'academy' ) echo "active_menu_link";?>" id="parent_6" data-id="parent_6">
                  <a onclick="slide_inner_menu(6,'<?=$this->lg?>/academy')">
                  <font><? echo $this->sm->getword('Academy',$this->lg)?>
                  </font></a>
                  <span class="menu_inner inner_menu_6">
                  <a href="<?=site_url('academy/introduction')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'introduction' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Introduction',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('academy/analysis')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'analysis' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Analysis',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('academy/trading-rules')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'trading-rules' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Trading Rules',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('academy/glossary')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'glossary' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Glossary',$this->lg)?>
                  </span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'resources' ) echo "active_menu_link";?>" id="parent_7" data-id="parent_7">
                  <a onclick="slide_inner_menu(7,'<?=$this->lg?>/resources')">
                  <font><? echo $this->sm->getword('Resources',$this->lg)?>
                  </font></a>
                  <span class="menu_inner  inner_menu_7">
                  <a href="<?=site_url('resources/market_news')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'resources' && $uri2 == 'market_news' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Market News',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('resources/trading_tools')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'resources' && $uri2 == 'trading_tools' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Trading Tools',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('resources/trading_central')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'resources' && $uri2 == 'trading_central' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Trading Central',$this->lg)?></span>
                  </a>
                  </span>
               </li>
               <li class="parent_menu <? if ( $uri1 == 'promos'  ) echo "active_menu_link";?>" id="parent_8" data-id="parent_8">
                  <a onclick="slide_inner_menu(8,'<?=$this->lg?>/promos')">
                  <font><? echo $this->sm->getword('Promos',$this->lg)?>
                  </font></a>
                  <span class="menu_inner  inner_menu_8">
                  <a href="<?=site_url('promos/bonuses')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'promos' && $uri2 == 'bonuses' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Bonuses',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('promos/contests')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'promos' && $uri2 == 'contests' ) echo "active_menu_link";?>">
                  <? echo $this->sm->getword('Contests',$this->lg)?>
                  </span>
                  </a>
                  </span>
               </li>
			   
			   <li class="show-on-scroll-only no_hover_effect">
					<a href="<?=site_url('account/real')?>">
					<span class="white_color  none_tablet_and_mobile  padding-10 background_dark_grey button-amd real-account transition-5ms ">
					<? echo $this->sm->getword('CREATE A ACCOUNT',$this->lg)?></span>
					
					</a>
			   </li>
            </ul>
			</div>
         </div>
      </div>
      <div class="full-width">
         <div class="sub_menu_inner inner_menu_slide_1 padding-top-bottom-20" data-id="parent_1"  >
            <div class="header_container" id="first_nav_col">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('about_us/sponsorships')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'sponsorships' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a8.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Sponsorships',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Proud Sponsors of the England Polo ...',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/events')?>">
                  <span class="full-width menu-span  <? if ( $uri1 == 'about_us' && $uri2 == 'events' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a10.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Events',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Event: ICM participates at the iFX ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('about_us/news')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'news' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a6.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('News',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/sr')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'sr' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a9.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('CSR',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/gallery')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'gallery' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/gallery.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Gallery',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('about_us/careers')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'careers' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a4.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Careers',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/awards')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'awards' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a7.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Awards',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/contact_us')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'contact_us' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a5.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Contact Us',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright text-center">
                  <a href="<?=site_url('about_us/profile')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'profile' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a1.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Profile',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/regulations')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'regulations' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a2.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Regulations',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('about_us/advantages')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'about_us' && $uri2 == 'advantages' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/a3.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Advantages',$this->lg)?></span>
                  </span>
                  </a>
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_2 padding-top-bottom-20" data-id="parent_2"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('accounts/opening')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'opening' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ac3.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Account Opening',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('accounts/faqs')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'faqs' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ac4.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Account FAQS',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('accounts/funding')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'funding' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ac2.png" class="menu_icon" /> 
                  <span class="inner_title">
                  <strong><? echo $this->sm->getword('Account Funding',$this->lg)?></strong></span>
                  </span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('ICM offers a wide range of fast and easy deposit and withdrawal methods ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('accounts/type')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'accounts' && $uri2 == 'type' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ac1.png" class="menu_icon" /> 
                  <span class="inner_title">
                  <strong><? echo $this->sm->getword('Account Types',$this->lg)?></strong></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Deposit, Leverage, Minimum Lot Size, Instruments Available, Stop/Limit Levels...',$this->lg)?>
                  </span>
                  </a>
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_3 padding-top-bottom-20" data-id="parent_3"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('products/metals-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'metals-futures' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p1.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Metals Futures',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('products/cryptocurrencies')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'cryptocurrencies' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p2.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('CryptoCurrencies',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('products/specifications')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'specifications' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p3.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Specifications',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('products/us-stocks')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'us-stocks' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p4.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('US Stocks',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('products/currency-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'currency-futures' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p5.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Currency Futures',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('products/energy-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'energy-futures' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p6.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Energy Futures',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('products/spot-forex')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'spot-forex' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p7.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Spot Forex',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('products/precious-metals')?>">
                  <span class="full-width menu-span">
                  <img src="assets/images/menu/p8.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Precious Metals',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('products/index-futures')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'products' && $uri2 == 'index-futures' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/p9.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Index Futures',$this->lg)?></span>
                  </span>
                  </a>
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_4 padding-top-bottom-20" data-id="parent_4"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <span class="full-width menu-span">
                  <img src="assets/images/menu/ctrader.png" class="menu_icon_lg" /></span>
                  <a href="<?=site_url('platforms/ctrader_desktop')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_desktop' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/desck.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('cTrader Desktop',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_mac')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_mac' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/web.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('cTrader mac',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_web')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_web' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/web.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('cTrader Web',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_iphone')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_iphone' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ios.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('cTrader Iphone',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/ctrader_android')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'ctrader_android' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/android.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('cTrader Android',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <span class="full-width menu-span">
                  <img src="assets/images/menu/mt5.png" class="menu_icon_lg" />
                  </span>
                  <a href="<?=site_url('platforms/mt5_desktop')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_desktop' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/desck.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT5 Desktop',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_web')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_web' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/web.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT5 Web',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_mac')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_mac' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/mac.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT5 Mac',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_iphone')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_iphone' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ios.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT5 Iphone',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt5_android')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt5_android' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/android.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT5 Android',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <span class="full-width menu-span">
                  <img src="assets/images/menu/mt4.png" class="menu_icon_lg" /></span>
                  <a href="<?=site_url('platforms/mt4_desktop')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_desktop' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/desck.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT4 Desktop',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt4_web')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_web' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/web.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT4 Web',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt4_mac')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_mac' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/mac.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT4 Mac',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt4_iphone')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_iphone' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/ios.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT4 Iphone',$this->lg)?></span>
                  </span>
                  </a>
                  <a href="<?=site_url('platforms/mt4_android')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'platforms' && $uri2 == 'mt4_android' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/android.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('MT4 Android',$this->lg)?></span>
                  </span>
                  </a>
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_5 padding-top-bottom-20" data-id="parent_5"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('partners/partnership-programs')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'partners' && $uri2 == 'partnership-programs' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/part2.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('Partnership Programs',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Our introducing brokers (IB) partnership program is designed to provide you with the best benefits in the market ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('partners/icm-agent')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'partners' && $uri2 == 'icm-agent' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/part1.png" class="menu_icon" /> 
                  <span class="inner_title"><? echo $this->sm->getword('ICM Agent',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Register for a Marketing Agent account today to receive your ICM Agent log in details ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright text-center">
                  <img src="assets/images/menu/patnership.png"  /> 
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_6 padding-top-bottom-20" data-id="parent_6"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('academy/glossary')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'glossary' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/acad4.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Glossary',$this->lg)?></span></span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Describes the difference between a portfolio`s performance vs. the average ...',$this->lg)?>
                  </span>
                  </a>
                  <a href="<?=site_url('academy/trading-rules')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'trading-rules' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/acad3.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Trading Rules',$this->lg)?></span></span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('The MetaTrader 4 trading software which is used at ICM includes a full back ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('academy/introduction')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'introduction' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/acad1.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Introduction',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('Foreign Exchange (FX or FOREX) is the cornerstone of all international capital ...',$this->lg)?>
                  </span> 
                  </a>
                  <a href="<?=site_url('academy/analysis')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'academy' && $uri2 == 'analysis' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/acad5.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Analysis',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('For many years, traders active in the stock market and foreign exchange market ...',$this->lg)?>
                  </span> 
                  </a>
               </div>
               <div class="sub-menu_column floatright text-center">
                  <img src="assets/images/menu/academy.png"  /> 
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_7 padding-top-bottom-20" data-id="parent_7"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width" >
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('resources/trading_central')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'resources' && $uri2 == 'trading_central' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/n3.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Trading Central',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('ICM has chosen Trading Central`s technical analysis package which identifies real time, actionable trading opportunities for our most popular  ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('resources/trading_tools')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'resources' && $uri2 == 'trading_tools' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/n2.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Trading Tools',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('At ICM we continuously strive to offer you services which can support you when trading with us. Below you will find a Pip Calculator which can  ...',$this->lg)?>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('resources/market_news')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'resources' && $uri2 == 'market_news' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/n1.png" class="menu_icon" />
                  <span class="inner_title"><? echo $this->sm->getword('Market News',$this->lg)?></span>
                  </span>
                  <span class="full-width menu-description-span">
                  <? echo $this->sm->getword('US Indices started the week higher after U.S. Treasury Secretary Steven Mnuchin declared that the trade war between the United States and China is ...',$this->lg)?>
                  </span>
                  </a>
               </div>
            </div>
         </div>
         <div class="sub_menu_inner inner_menu_slide_8 padding-top-bottom-20" data-id="parent_8"  >
            <div class="header_container">
               <div class="sub-menu__buttons floatright">
                  <a href="https://clients.icmcapital.com/#/auth/login" class="button_style margin-top-down-10 full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Live Account',$this->lg)?>
                  </a>
                  <a href="https://clients.icmcapital.com/#/" class="button_style margin-top-down-10 button_style_bordered full-width"  target="_blank" >
                  <? echo $this->sm->getword('Apply for Demo Account',$this->lg)?>
                  </a>
                  <a href="<?=site_url('accounts/funding')?>" class="button_style margin-top-down-10 full-width">
                  <? echo $this->sm->getword('Fund your Account',$this->lg)?>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('promos/contests')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'promos' && $uri2 == 'contests' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/promo2.png" class="menu_icon_md" />
                  <span class="inner_title_50"><? echo $this->sm->getword('Contests',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <a href="<?=site_url('promos/bonuses')?>">
                  <span class="full-width menu-span <? if ( $uri1 == 'promos' && $uri2 == 'bonuses' ) echo "active_menu_link";?>">
                  <img src="assets/images/menu/promo1.png" class="menu_icon_md" />
                  <span class="inner_title_50"><? echo $this->sm->getword('Bonuses',$this->lg)?></span>
                  </span>
                  </a>
               </div>
               <div class="sub-menu_column floatright">
                  <img src="assets/images/menu/promoimg.png"  /> 
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<script src="<?=base_url('assets/js/jquery-latest.min.js')?>"></script>
<script src="<?=base_url('assets/js/common.js')?>"></script>
 <? if ( $countrycode != '' ) { ?>
<input type="hidden" value="<?=strtolower($countrycode)?>" id="countrycode">
 <? } else { 
 if ( $country != '' ) { ?>
<input type="hidden" value="<?=strtolower($country)?>"  id="country">
<? }} ?> 
