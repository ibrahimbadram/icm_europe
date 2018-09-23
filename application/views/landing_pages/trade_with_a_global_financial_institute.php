<?php
	function get_url_contents($url) {
$crl = curl_init();

curl_setopt($crl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
curl_setopt($crl, CURLOPT_URL, $url);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, 1);

$ret = curl_exec($crl);
curl_close($crl);
return $ret;
}
$country = '';
$countrycode = '';
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
$ipdat = @json_decode(get_url_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
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


if ( isset($output['country'])) {
$country = $output['country']; }
if ( isset($output['countrycode'])) {
$countrycode = $output['countrycode']; }

$camp_id = strtotime(date("Y-m-d H:i:s"));
//echo $camp_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ICM | Registration </title>
<base href="<?=base_url()?>" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
<meta name="description" content="ICM | Landing Page" />
<meta name="author" content="iqonicthemes.in" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="assets/registration/css/<?=$this->lg?>/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/registration/css/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/registration/css/font-awesome.css" />
<link rel="stylesheet" href="assets/registration/css/ionicons.min.css">
<link rel="stylesheet" href="assets/registration/css/<?=$this->lg?>/style.css">
<link rel="stylesheet" href="assets/registration/css/<?=$this->lg?>/responsive.css">
<link rel="stylesheet" href="assets/registration/css/<?=$this->lg?>/style-customizer.css" />

<link rel="stylesheet" type="text/css" href="assets/registration/css/<?=$this->lg?>/magnific-popup/magnific-popup.css" />
<link href="assets/registration/css/<?=$this->lg?>/landing/styles.css?v=2.4.0.1587" rel="stylesheet" />
<link href="assets/registration/css/<?=$this->lg?>/landing/style.css" rel="stylesheet" />
<link href="assets/registration/css/<?=$this->lg?>/landing/landing-page_demo.css?d=63610670706" rel="stylesheet"/>
<link href="assets/registration/css/<?=$this->lg?>/landing/landing-page_custom.css?d=63625781777" rel="stylesheet"/>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style >
.iq-over-blue-90:before {     background: rgba(74,196,243,0.7);}
</style>
</head>
<body data-spy="scroll" data-offset="80">
<div id="loading">
  <div id="loading-center" style="background:url(assets/images/loader.gif) center center no-repeat">
    <div class="loader" >
      
    </div>
  </div>
</div>
<header id="header-wrap">
  <div class="navbar navbar-default navbar-fixed-top menu-top">
    <div class="container-2">
      <div class="navbar-header text-align-center"> <a href="<?=base_url()?>" class="navbar-brand"> <img class="img-responsive" id="logo_img" src="assets/registration/images/logo1.png" alt="logo"> </a> </div>
      <div class="text-align-center"> 
      <!--<div class="col-md-1 float-right" >
      <? if ( $this->lg == 'ar' ) { ?>
      <a href="<?php echo $this->lang->switch_uri('en'); ?>">
      <? } else { ?>
      <a href="<?php echo $this->lang->switch_uri('ar'); ?>">
      <? } ?>
        <div class="iq-footer-box text-left">
          <div class="iq-icon"> <i aria-hidden="true" class="ion-ios-global-outline" style="font-size:14px">
           <? if ( $this->lg == 'ar' ) { ?>
            EN
            <? } else { ?>
      AR
      <? } ?>
          </i> </div>
        </div>
        </a>
      </div>-->
      <div class="col-md-3 float-right" >
      <a href="tel:00442074425610">
        <div class="iq-footer-box text-left">
          <div class="iq-icon"> <i aria-hidden="true" class="ion-ios-telephone-outline" style="font-size:14px"></i> </div>
          <div class="footer-content hide-mobile">
            <p style="font-size: 15px; margin-top:20px">+44 207 442 5610</p>
          </div>
        </div>
        </a>
      </div>
      <div class="col-md-3 float-right" >
      <a href="mailto:support@icm.com" class="__cf_email__" data-cfemail="">
        <div class="iq-footer-box text-left">
          <div class="iq-icon"> <i aria-hidden="true" class="ion-ios-email-outline"></i> </div>
          <div class="footer-content hide-mobile">
            <p style="font-size: 15px; margin-top:20px" >support@icm.com</p>
          </div>
        </div>
        </a>
      </div>
      </div>
    </div>
  </div>
</header>
<section id="iq-home" class="iq-banner overview-block-pt iq-bg iq-bg-fixed iq-over-blue-90" style="background: url(assets/registration/images/bg10.jpg);">
  <div class="container-2">
  <div class="full-width"> 
<input type="hidden" id="telephonecodeval" >
<form id="tc-lead-registration" >
      <? if ( $this->lg == 'ar' ) { ?>
    <input data-tc-field="field" type="hidden" id="Campaign:Referrer URL" name="campaign_id" value="1532613561-ar"/>
            <? } else { ?>
    <input data-tc-field="field" type="hidden" id="Campaign:Referrer URL"  name="campaign_id" value="1532613561"/>
      <? } ?>
    <input data-tc-field="field" type="hidden" id="Campaign:Campaign ID" name="campaign_name" value="Trade With A Global Financial Institute <?=$this->lg?>"/>
  <div class="three-full-width margin-top-28">
      <div class="banner-text">
          <div class="full-width">
              <h2 class="form__title white-color margin-bottom-2-30 full-width">
              <? if ( $this->lg == 'ar' ) { ?>
              سجِّل الآن...<br>
وتداول مع وسيط يتمتع بموثوقية عالمية. 
              <? } else { ?>
              Sign Up to Start Trading <br>with Reliable Broker
              <? } ?>
              </h2>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_first_name">
                  <div class="input-field__wrapper">
                    <label class="input-field__label input-field__label_placeholder">
                    <? if ( $this->lg == 'ar' ) { ?>
           الاسم الأول 
              <? } else { ?>
              First Name
              <? } ?>
                    </label>
                    <input class="input-field__input input-field_error" id="first_name" name="first_name" type="text" onKeyUp="check_first_name()">
                  </div>
                  <div class="input-tooltip input-tooltip_first_name input-tooltip_error" style="display:none" >
                     <? if ( $this->lg == 'ar' ) { ?>
 يرجى ادخال الاسم الاول.
               <? } else { ?>
              Please enter your first name.
              <? } ?>
                  </div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_last_name">
                  <div class="input-field__wrapper">
                    <label  class="input-field__label input-field__label_placeholder">
                    <? if ( $this->lg == 'ar' ) { ?>
                    لقب العائلة
              <? } else { ?>
                    Last Name
              <? } ?>
                    </label>
                    <input class="input-field__input input-field_error" id="last_name" name="last_name" type="text" onKeyUp="check_last_name()">
                  </div>
                  <div class="input-tooltip input-tooltip_last_name input-tooltip_error" style="display:none" >
                   <? if ( $this->lg == 'ar' ) { ?>
                  يرجى إدخال اسمك الأخير.
              <? } else { ?>
                  Please enter your last name.
              <? } ?>
                  
                  </div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_email">
                  <div class="input-field__wrapper">
                    <label for="Form_845758092a3f498ca7b3038653eb1fb6_Email" class="input-field__label input-field__label_placeholder">
                       <? if ( $this->lg == 'ar' ) { ?>
                البريد الإلكتروني
              <? } else { ?>
                    E-mail
              <? } ?>
                    
                    </label>
                    <input class="input-field__input" id="email" name="email" type="text" onKeyUp="check_email()">
                  </div>
                  <div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" >
                      <? if ( $this->lg == 'ar' ) { ?>
                      (john.smith@gmail.com).
                  الرجاء إدخال البريد الإلكتروني بالتنسيق الصحيح على سبيل المثال
                   
              <? } else { ?>
                  Please enter e-mail in the valid format (i.e. john.smith@gmail.com).
              <? } ?>
                  </div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-select input-select_width_full input-field_country">
                  <label class="input-select__label">
                      <? if ( $this->lg == 'ar' ) { ?>
                  بلد الإقامة
              <? } else { ?>
                  Country of Residence
              <? } ?>
                  </label>
                  <select class="input-select__input select2-hidden-accessible" id="addr_country" name="addr_country" tabindex="-1" aria-hidden="true">
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
                  <span class="select2 select2-container select2-container--default" dir="ltr" style=""> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" onClick="showcountries()" id="showcountries"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" >
                  <div id="change_country">
                    <div class="flag-icon flag-icon_af" style="background:none" ></div>
                     </div>
                  </span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries"  dir="ltr" style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
                  <input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString">
                  </span> <span class="select2-results">
                  <ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results" aria-expanded="true" aria-hidden="false">
                    <?php
foreach ($contries as $row){
 ?>
                    <li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country('<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
                      <div class="flag-icon flag-icon_<?=strtolower($row['iso'] )?>"></div>
                      <?=$row['name']?>
                      </span></li>
                    <?php
}
 ?>
                  </ul>
                  </span> </span> </span> </div>
                  <div class="input-tooltip input-tooltip_error input-tooltip_country" style="display:none" >
                   <? if ( $this->lg == 'ar' ) { ?>
                  هذه الخانة مطلوبه.
              <? } else { ?>
                  This field is required.
              <? } ?>
                  </div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_telephone">
                  <div class="input-field__wrapper">
                    <label for="Form_845758092a3f498ca7b3038653eb1fb6_telephone" class="input-field__label input-field__label_placeholder">
                     <? if ( $this->lg == 'ar' ) { ?>
                     رقم الهاتف
              <? } else { ?>
                    Phone Number
              <? } ?>
                    </label>
                    <input name="telephone" class="input-field__input input-field__input_is-number" id="telephone" value="" type="text" onKeyUp="check_telephone()">
                  </div>
                  <div class="input-tooltip input-tooltip_error input-tooltip_telephone" style="display: none;">
                  <? if ( $this->lg == 'ar' ) { ?>
                  صيغه غير صحيحة
              <? } else { ?>
                  Invalid format.
              <? } ?>
                  </div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_type_captcha input-field_width_full">
                  <div class="input-field__wrapper">
                    <div class="g-recaptcha" data-sitekey="6LfUUmMUAAAAAK_aGkJeysXXdVF8lq8xqO6jwE8P"></div>
                  </div>
                  <div class="input-tooltip input-tooltip_valid" style="display: none;"> </div>
                </div>
              </div>
              <div class="form__bottom">
                <input id="apply_here" name="btnSubmit" class="button padding-60" value="<? if ( $this->lg == 'ar' ) { ?>ارسل<? } else { ?>Submit<? } ?>" type="button" onClick="sendform()" disabled="disabled" >
              </div>
              <div style="text-align:center; padding-top:20px ; font-size:15px;" id="finalresult" > </div>
            </div>
          </div>
        </div>
</form>
    <div class="seven-full-width margin-top-50-2 text-align-center">
      <div class="full-width">
      <h1 class="text-align-center white-color full-width margin-bottom-30" style="line-height:31px ; font-size:30px" >
       <? if ( $this->lg == 'ar' ) { ?>
                  تداول في العملات الآن
              <? } else { ?>
     Trade With 
              <? } ?>
 <br>
 <? if ( $this->lg == 'ar' ) { ?>
           &quot; بحد أدنى 1,000 دولار &quot;
              <? } else { ?>
 &quot; A Global Financial Institute &quot;
              <? } ?>
 </h1>
      <div class=" full-width">
        <div class="full-width">
          <div class="iq-banner-video"> 
          <ul  >
          <li style="background:url(assets/registration/images/icon1.png) no-repeat left center"> &nbsp; <font>FSCS Protection &amp; Excess FSCS Insurance</font></li>
          <li style="background:url(assets/registration/images/icon2.png) no-repeat left center"> &nbsp; <font>Flexible Leverage</font></li>
          <li style="background:url(assets/registration/images/icon3.png) no-repeat left center"> &nbsp; <font>Balance Protection</font></li>
          <li style="background:url(assets/registration/images/icon4.png) no-repeat left center"> &nbsp; <font>Multi-Regulated Brokerage House</font></li>
          <li style="background:url(assets/registration/images/icon5.png) no-repeat left center"> &nbsp; <font>Superior Execution & Liquidity Depth</font></li>
          </ul>
            </div>
        </div>
        </div>
        
        
      </div>
    </div>
    </div>
  </div>
  <div class="banner-objects"> 
  <span class="banner-objects-01" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-50px);"> 
  <img src="assets/registration/images/drive/03.png" alt="drive02"> </span> <span class="banner-objects-02 iq-fadebounce"> <span class="iq-round"></span> </span> <span class="banner-objects-03 iq-fadebounce"> <span class="iq-round"></span> </span> <span class="banner-objects-04" data-bottom="transform:translatex(100px)" data-top="transform:translatex(-100px);"> <img src="assets/registration/images/drive/04.png" alt="drive02"> </span> </div>
</section>
<? $this->load->view('landing_pages/include1')?>

<script>
var i = document.getElementById("tc-lead-registration"),
    o = "https://icmcrm.com";

function r() {
    console.log("lead account submission successful")
}

function l(e) {
    console.error("lead account submission failed", e)
}

function u(e, t, n, a, s) {
    var i = new XMLHttpRequest;
    i.open(e, t, !0), i.addEventListener("load", function() {
        400 <= this.status ? s(this) : a(JSON.parse(this.response))
    }), i.setRequestHeader("whitelabel", "ICMVC"), i.addEventListener("error", s), i.send(n)
}
function sendtoicm() {
    for (var e = new FormData, t = [i.getElementsByTagName("input"), i.getElementsByTagName("select"), i.getElementsByTagName("textarea")], n = 0; n < t.length; n++)
        for (var a = 0; a < t[n].length; a++) {
            var s = t[n][a];
            e.append(s.id, "checkbox" === s.type ? s.checked : s.value)
        }
    return e.append("whitelabel", "ICMVC"), e.append("is_finished", "true"), u("POST", o + "/api/signup/lead/", e, r, l), !1
};

$(document).ready(function() {
$('.button-slide').click(function() {	
    $('html,body').animate({
scrollTop: ($('#iq-form').offset().top)-100},
1000);
});
<?php if ( $countrycode != '' ) { ?>
//$('#countyr-selected-<?=strtolower($countrycode)?>').trigger('click');
 <?php } else { 
 if ( $country != '' ) { ?>
//$('.countyr-selected-<?=strtolower($country)?>').trigger('click');
 <?php }} ?>  	
	
$("#inputString").keyup(function () {
    var filter = $(this).val();
    $("ul.select2-results__options li").each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show()
        }
    });
});

$(window).click(function() {
$('#show_countries').fadeOut('fast');
});
$('#showcountries,#show_countries').click(function(event){
event.stopPropagation();
});

    $("input[id*='telephone']").keydown(function (event) {


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
});
function sendform(){
			var campaign_id = $("input[name=campaign_id]").val(),
	campaign_name = $("input[name=campaign_name]").val();
if ( check_first_name() && check_last_name() && check_email()  && check_country() && check_telephone()  ) {
$('#apply_here').attr('disabled','disabled');
$('#finalresult').html('<img src="assets/images/loader.gif" width="30" />');
$.post("<?=site_url('registration/signup')?>",{name:$('#first_name').val()+' '+$('#last_name').val(),email:$('#email').val(),country:$('#addr_country').val(),telephone:$('#telephone').val(),captcha:$('#g-recaptcha-response').val(),camp_name:campaign_name,camp_id:campaign_id}, function(data) {
	if ( data == 1 ) {
sendtoicm();
	$('#finalresult').html('<h4 style="color:green"><img src="assets/registration/images/landing/confirm.gif"  /> Sent successfully</h4>');
	setTimeout(clearresult, 5000);
	
  return false;
	} else {
 $('#finalresult').html(data);
	}
$('#apply_here').removeAttr('disabled','disabled');
})
  .done(function(data) {
   //$('#finalresult').html(data);
  })
  .fail(function(data) {
  // $('#finalresult').html(data);
  })
  .always(function(data) {
  // $('#finalresult').html(data);
  });
} 
}
function clearresult(){
		$('#first_name').val('');
		$('#last_name').val('');
		$('#email').val('');
		$('#addr_country').val('');
		$('#change_country').text('');
		$('#change_country div').attr('class','flag-icon');
		$('#telephone').val('');
	$('#finalresult').html('');
}
function check_first_name(){ 
var row = $('#first_name').val();
if ( row.length >= 1 ) {
$('.input-field_first_name').removeClass('input-field_error');
$('.input-tooltip_first_name').fadeOut('fast');
$('#apply_here').removeAttr('disabled','disabled');
return true;
} else {
$('.input-field_first_name').addClass('input-field_error');
$('.input-tooltip_first_name').fadeIn('fast');
$('#apply_here').attr('disabled','disabled');
return false;
}
}
function check_last_name(){
var row = $('#last_name').val();
if ( row.length >= 1 ) {
$('.input-field_last_name').removeClass('input-field_error');
$('.input-tooltip_last_name').fadeOut('fast');
$('#apply_here').removeAttr('disabled','disabled');
return true;
} else {
$('.input-field_last_name').addClass('input-field_error');
$('.input-tooltip_last_name').fadeIn('fast');
$('#apply_here').attr('disabled','disabled');
return false;
}
}
function check_email(){
var row = $('#email').val();
if ( isValidEmailAddress(row) ){
$('.input-field_email').removeClass('input-field_error');
$('.input-tooltip_email').fadeOut('fast');
$('#apply_here').removeAttr('disabled','disabled');
return true;
} else {
$('.input-field_email').addClass('input-field_error');
$('.input-tooltip_email').fadeIn('fast');
$('#apply_here').attr('disabled','disabled');
return false;
}

}
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}
function showcountries(){
$('#apply_here').removeAttr('disabled','disabled');
$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');
$('#show_countries').fadeToggle('fast');
}
function check_telephone(){
var str = $('#telephone').val();
if (str.startsWith($('#telephonecodeval').val()) && str.length > 8 && str != '' ) {
$('#apply_here').removeAttr('disabled','disabled');
$('.input-field_telephone').removeClass('input-field_error');
$('.input-tooltip_telephone').fadeOut('fast');
return true;
} else {
$('.input-field_telephone').addClass('input-field_error');
$('.input-tooltip_telephone').fadeIn('fast');
$('#apply_here').attr('disabled','disabled');	
return false;
}
}

function check_address(){
var str = $('#address').val();
if ( str.length >= 10 ) {
$('#apply_here').removeAttr('disabled','disabled');
$('.input-field_address').removeClass('input-field_error');
$('.input-tooltip_address').fadeOut('fast');
return true;
} else {
$('.input-field_address').addClass('input-field_error');
$('.input-tooltip_address').fadeIn('fast');
$('#apply_here').attr('disabled','disabled');	
return false;
}
}
function check_country(){
var str = $('#addr_country').val();
if ( str != '' ) {
$('#apply_here').removeAttr('disabled','disabled');
$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');
return true;
} else {
$('.input-field_country').addClass('input-field_error');
$('.input-tooltip_country').fadeIn('fast');
$('#apply_here').attr('disabled','disabled');	
return false;
}
}
function choose_country(id,idd,iddd) {
$('#show_countries').fadeOut('fast');
$('#addr_country').val(id);
$('#telephonecodeval').val(iddd);
$('#telephone').val(iddd);
$('#apply_here').removeAttr('disabled','disabled');
$('.input-field_country').removeClass('input-field_error');
$('.input-tooltip_country').fadeOut('fast');
$('#change_country').html('<div class="flag-icon flag-icon_'+idd+'"></div>'+id);
}


</script>
</body>
</html>