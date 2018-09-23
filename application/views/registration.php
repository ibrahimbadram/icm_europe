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
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
<link rel="stylesheet" href="assets/registration/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/registration/css/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/registration/css/font-awesome.css" />
<link rel="stylesheet" href="assets/registration/css/ionicons.min.css">
<link rel="stylesheet" href="assets/registration/css/style.css">
<link rel="stylesheet" href="assets/registration/css/responsive.css">
<link rel="stylesheet" href="assets/registration/css/style-customizer.css" />

<link rel="stylesheet" type="text/css" href="assets/registration/css/magnific-popup/magnific-popup.css" />
<link href="assets/registration/css/landing/styles.css?v=2.4.0.1587" rel="stylesheet" />
<link href="assets/registration/css/landing/style.css" rel="stylesheet" />
<link href="assets/registration/css/landing/landing-page_demo.css?d=63610670706" rel="stylesheet"/>
<link href="assets/registration/css/landing/landing-page_custom.css?d=63625781777" rel="stylesheet"/>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
      <div class="navbar-header text-align-center"> <a href="index.php" class="navbar-brand"> <img class="img-responsive" id="logo_img" src="assets/registration/images/logo1.png" alt="logo"> </a> </div>
      <div class="text-align-center"> 
      <div class="col-md-3 float-right" >
      <a href="tel:00442074425610">
        <div class="iq-footer-box text-left">
          <div class="iq-icon"> <i aria-hidden="true" class="ion-ios-telephone-outline"></i> </div>
          <div class="footer-content hide-mobile">
            <h4 class="iq-tw-6 iq-pb-10">telephone</h4>
            <p style="font-size: 14px;">+44 207 442 5610</p>
          </div>
        </div>
        </a>
      </div>
      <div class="col-md-3 float-right" >
      <a href="mailto:support@icmtrader.com" class="__cf_email__" data-cfemail="">
        <div class="iq-footer-box text-left">
          <div class="iq-icon"> <i aria-hidden="true" class="ion-ios-email-outline"></i> </div>
          <div class="footer-content hide-mobile">
            <h4 class="iq-tw-6 iq-pb-10">Mail</h4>
            <p style="font-size: 14px;" >support@icmtrader.com</p>
          </div>
        </div>
        </a>
      </div>
      </div>
    </div>
  </div>
</header>
<section id="iq-home" class="iq-banner overview-block-pt iq-bg iq-bg-fixed iq-over-blue-90" style="background: url(assets/registration/images/bg/01.jpg);">
  <div class="container-2">
  <div class="full-width"> 
<input type="hidden" id="telephonecodeval" >
<form id="tc-lead-registration" >
  <div class="three-full-width margin-top-28">
      <div class="banner-text">
          <div class="full-width">
              <h2 class="form__title white-color margin-bottom-2-30 full-width">Register For Your Demo Account</h2>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_first_name">
                  <div class="input-field__wrapper">
                    <label class="input-field__label input-field__label_placeholder">First Name</label>
                    <input class="input-field__input input-field_error" id="first_name" name="first_name" type="text" onKeyUp="check_first_name()">
                  </div>
                  <div class="input-tooltip input-tooltip_first_name input-tooltip_error" style="display:none" >Please enter your first name.</div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_last_name">
                  <div class="input-field__wrapper">
                    <label  class="input-field__label input-field__label_placeholder">Last Name</label>
                    <input class="input-field__input input-field_error" id="last_name" name="last_name" type="text" onKeyUp="check_last_name()">
                  </div>
                  <div class="input-tooltip input-tooltip_last_name input-tooltip_error" style="display:none" >Please enter your last name.</div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_email">
                  <div class="input-field__wrapper">
                    <label for="Form_845758092a3f498ca7b3038653eb1fb6_Email" class="input-field__label input-field__label_placeholder">E-mail</label>
                    <input class="input-field__input" id="email" name="email" type="text" onKeyUp="check_email()">
                  </div>
                  <div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" >Please enter e-mail in the valid format (i.e. john.smith@gmail.com).</div>
                </div>
              </div>
              <div class="form__field">
                <div class="input-select input-select_width_full input-field_country">
                  <label class="input-select__label">country of Residence</label>
                  <select class="input-select__input select2-hidden-accessible" id="addr_country" name="addr_country" tabindex="-1" aria-hidden="true">
                  <option value="" selected="selected" ></option>
                    <?php
$contries = $this->sm->getAllrecords('country','','name');
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
                  <div class="input-tooltip input-tooltip_error input-tooltip_country" style="display:none" >This field is required.</div>
              </div>
              <div class="form__field">
                <div class="input-field input-field_width_full input-field_telephone">
                  <div class="input-field__wrapper">
                    <label for="Form_845758092a3f498ca7b3038653eb1fb6_telephone" class="input-field__label input-field__label_placeholder">telephone</label>
                    <input name="telephone" class="input-field__input input-field__input_is-number" id="telephone" value="" type="text" onKeyUp="check_telephone()">
                  </div>
                  <div class="input-tooltip input-tooltip_error input-tooltip_telephone" style="display: none;">Invalid format.</div>
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
                <input id="apply_here" name="btnSubmit" class="button padding-60" value="Submit" type="button" onClick="sendform()" disabled="disabled" >
              </div>
              <div style="text-align:center; padding-top:20px ; font-size:15px;" id="finalresult" > </div>
            </div>
          </div>
        </div>
</form>
    <div class="seven-full-width margin-top-50-2 text-align-center">
      <div class="full-width">
      <h1 class="text-align-center navy-color full-width margin-bottom-30" style="line-height:41px ; font-size:40px" >Trade with ICM <br><small class="navy-color">&quot;Award-Winning Broker&quot;</small></h1>
      <div class=" full-width">
        <div class="full-width">
          <div class="iq-banner-video"> 
          <img class="banner-img" src="assets/registration/images/banner/01.png" alt=""> 
          <div class="waves-class" >
            <div class="iq-waves">
          <a href="assets/registration/video/01.mp4" class="iq-video popup-youtube"><i class="ion-ios-play-outline"></i></a>
              <div class="waves wave-1"></div>
              <div class="waves wave-2"></div>
              <div class="waves wave-3"></div>
            </div>
            </div>
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
<section id="how-works" class=" padding-top-bottom how-works" style="background:url(assets/registration/images/bg1.jpg) ; background-size:cover" >
  <div class="container">
      <div class="half-full-awards-width">
        <h2 class="white-color text-align-center">Why ICM?</h2>
        <ul class="iq-mt-40 iq-list text-align-center">
          <li class="iq-tw-6">
          <img src="assets/registration/images/landing/2.png" ><span class="iq-font-black">FCA regulated and member of FSCS Compensation fund.</span></li>
          <li class="iq-tw-6"><img src="assets/registration/images/landing/5.png" ><span class="iq-font-black">Low spread, No commission, Fast execution and 24/5 customer support.</span></li>
          <li class="iq-tw-6"><img src="assets/registration/images/landing/3.png" ><span class="iq-font-black">Award Winning Platforms for Mobile devices, Tablets and PC.</span></li>
          <li class="iq-tw-6"><img src="assets/registration/images/landing/4.png" ><span class="iq-font-black">Easy and fast funding methods.</span></li>
          <li class="iq-tw-6"><img src="assets/registration/images/landing/3.png" ><span class="iq-font-black">Awards.</span></li>
        </ul>
        <div class="full-width text-align-center" >
        <a class="button  button-slide iq-mt-10 padding-60" href="https://access.icmcapital.co.uk/en/registration/demo?cmpnid=hhESBT~ON99NAfKFf4XG!arvs5SX" >APPLY FOR DEMO ACCOUNT</a> 
        </div>
                <div class="full-width margin-top-15 text-align-center color-white">
<p  >Trading CFDs involves significant risk of loss</p>
</div>
        </div>
      <div class="col-md-6"> </div>
    </div>
  
</section>
<div id="features" class="iq-amazing-tab white-bg full-width section_bgcolor_gray padding-top-bottom">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul id="iq-amazing-tab" class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active1"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><img src="assets/registration/images/platforms/MT4-logo.png" alt="" /></a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><img src="assets/registration/images/platforms/mt5-logo.png" alt="" /></a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><img src="assets/registration/images/platforms/cTrader.png" alt="" /></a></li>
        </ul>
        <div class="tab-content iq-mt-50">
          <div role="tabpanel" class="tab-pane active" id="home">
            <p class="iq-font-15"><strong>MetaTrader 4</strong> is a platform for trading Forex, analyzing financial markets and using Expert Advisors. Mobile trading, Trading Signals and the Market are the integral parts of <strong>MetaTrader 4</strong> that enhance your Forex trading experience.</p>
            <img class="img-responsive center-block" src="assets/registration/images/screenshots/metatrader4.jpg" alt="MT4"> </div>
          <div role="tabpanel" class="tab-pane" id="profile">
            <p class="iq-font-15">Successful trading on financial markets begins with a comfortable and multi-functional trading platform. <strong>MetaTrader 5</strong> is the best choice for the modern trader!</p>
            <br>
            <img class="img-responsive center-block" src="assets/registration/images/screenshots/metatrader5.jpg" alt="MT5"> </div>
          <div role="tabpanel" class="tab-pane" id="messages">
            <p><strong>cTrader</strong> is an independent trading platform that was developed for trading Foreign Exchange and products based on Futures Contracts.  cTrader is considered to be a trading platform of the 21st century.</p>
            <img class="img-responsive center-block" src="assets/registration/images/screenshots/ctrader.png" alt="cTrader"> </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<div class="full-width margin-top-50 ">
  <div class=" full-width">
  <div class="full-width  padding-top-bottom" > 
    <div class="container">
        <center>
          <h2 class="navy-color margin-bottom-2-30">Funding Methods</h2>
        </center>
          <div class="col-lg-12 col-md-12">
            <div class="owl-carousel" data-nav-dots="false" data-nav-arrow="true" data-items="5" data-sm-items="3" data-lg-items="5" data-md-items="4" data-autoplay="true">
              <div class="item"> <img class="img-responsive center-block payments" src="assets/registration/images/payments/BankTransfer2.jpg" alt="#"></div>
              <div class="item"> <img class="img-responsive center-block payments" src="assets/registration/images/payments/MasterCard.jpg" alt="#"></div>
              <div class="item"> <img class="img-responsive center-block payments" src="assets/registration/images/payments/Visa.jpg" alt="#"></div>
              <div class="item"> <img class="img-responsive center-block payments" src="assets/registration/images/payments/VisaElectron.png" alt="#"></div>
              <div class="item"> <img class="img-responsive center-block payments" src="assets/registration/images/payments/Skrill.jpg" alt="#"></div>
              <div class="item"> <img class="img-responsive center-block payments" src="assets/registration/images/payments/Neteller.jpg" alt="#"></div>
            </div>
      </div>
    </div>
    </div>
  </div>
  <section id="how-it-works" class="section_bgcolor_gray padding-top-bottom it-works re4-mt-50  full-width">
    <div class="container">
        <center>
          <h2 class="navy-color">Awards</h2>
        </center>
          <div class="col-lg-12 col-md-12">
            <div  class="text-center owl-carousel" data-nav-dots="false" data-nav-arrow="true" data-items="5" data-sm-items="3" data-lg-items="5" data-md-items="4" data-autoplay="true" >
              <div class="item">
                <div class="iq-works-box text-center"> <img src="assets/registration/images/awards/02.png" class="awards" alt="" /> </div>
              </div>
              <div class="item">
                <div class="iq-works-box text-center"> <img src="assets/registration/images/awards/03.png" class="awards" alt="" /> </div>
              </div>
              <div class="item">
                <div class="iq-works-box text-center"> <img src="assets/registration/images/awards/04.png" class="awards" alt="" /> </div>
              </div>
              <div class="item">
                <div class="iq-works-box text-center"> <img src="assets/registration/images/awards/05.png" class="awards" alt="" /> </div>
              </div>
              <div class="item">
                <div class="iq-works-box text-center"> <img src="assets/registration/images/awards/06.png" class="awards" alt="" /> </div>
              </div>
              <div class="item">
                <div class="iq-works-box text-center"> <img src="assets/registration/images/awards/07.png" class="awards" alt="" /> </div>
              </div>
            </div>
            <div class="full-width margin-top-30 text-align-center">
<a href="https://access.icmcapital.co.uk/en/registration/live?cmpnid=hhESBT~ON99NAfKFf4XG!arvs5SX" class="button button-slide iq-mt-10 padding-60">APPLY FOR LIVE ACCOUNT</a>
</div>
        <div class="full-width margin-top-15 text-align-center color-white">
<p style="color:#0f4879"  >Trading CFDs involves significant risk of loss</p>
</div>
      </div>
    </div>
  </section>

  <footer class="full-width">
  <section class=" full-width "  >
    <div class="container">
      <div  class="section section section_align_center ">
            <h2 style="text-align: center;" class="navy-color padding-top-bottom">Why not open an account today?</h2>
            <p style="text-align: center;"> </p>
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="radial-progress radial-progress_num_35">
                    <div class="radial-progress__circle">
                      <div class="radial-progress__mask radial-progress__mask_full">
                        <div class="radial-progress__fill"></div>
                      </div>
                      <div class="radial-progress__mask">
                        <div class="radial-progress__fill"></div>
                        <div class="radial-progress__fill radial-progress__fill_fix"></div>
                      </div>
                    </div>
                    <div class="radial-progress__inset">
                      <div class="radial-progress__percentage"></div>
                    </div>
                  </div>
                  <div class="radial-progress-title">1- Complete Application Form</div>
                </div>
                <div class="swiper-slide">
                  <div class="radial-progress radial-progress_num_70">
                    <div class="radial-progress__circle">
                      <div class="radial-progress__mask radial-progress__mask_full">
                        <div class="radial-progress__fill"></div>
                      </div>
                      <div class="radial-progress__mask">
                        <div class="radial-progress__fill"></div>
                        <div class="radial-progress__fill radial-progress__fill_fix"></div>
                      </div>
                    </div>
                    <div class="radial-progress__inset">
                      <div class="radial-progress__percentage"></div>
                    </div>
                  </div>
                  <div class="radial-progress-title">2- Submit Requested Documents</div>
                </div>
                <div class="swiper-slide">
                  <div class="radial-progress radial-progress_num_100" style="text-align: center;">
                    <div class="radial-progress__circle">
                      <div class="radial-progress__mask radial-progress__mask_full">
                        <div class="radial-progress__fill"></div>
                      </div>
                      <div class="radial-progress__mask">
                        <div class="radial-progress__fill"></div>
                        <div class="radial-progress__fill radial-progress__fill_fix"></div>
                      </div>
                    </div>
                    <div class="radial-progress__inset">
                      <div class="radial-progress__percentage"></div>
                    </div>
                  </div>
                  <div class="radial-progress-title" style="text-align: center;">3- Fund Account and Start Trading!</div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <p> </p>
            <div class="buttons-block twobutton">
              <div class="buttons-block__button"><a href="https://access.icmcapital.co.uk/en/registration/demo?cmpnid=hhESBT~ON99NAfKFf4XG!arvs5SX" class="button button_type_big button_style_bordered smallsize">APPLY FOR DEMO ACCOUNT</a></div>
              <div class="buttons-block__button"><a href="https://access.icmcapital.co.uk/en/registration/live?cmpnid=hhESBT~ON99NAfKFf4XG!arvs5SX" class="button button_type_big smallsize">APPLY FOR LIVE ACCOUNT</a></div>
            </div>
          </div>
        </div>
  </section>
  <section class="footer-info iq-pt-20 full-width">
  <div  class="section section_align_center section_bgcolor_light-gray">
        <div class="social-buttons"> <a href="www.linkedin.com/company/2407578" title="LinkedIn" class="social-buttons__button social-buttons__button_in"></a> <a href="https://www.youtube.com/user/ICMCapital" title="Youtube" class="social-buttons__button social-buttons__button_yb"></a> <a href="www.facebook.com/ICMCapital" title="Facebook" class="social-buttons__button social-buttons__button_fb"></a> <a href="https://twitter.com/ICMCapital" title="Twitter" class="social-buttons__button social-buttons__button_tw"></a> </div>
      </div>
  <div class=" full-width iq-mt-40 navy-bg">
    <div class="col-sm-12 text-center">
      <div class="footer-copyright iq-ptb-20">Copyright @<span id="copyright"> <script data-cfasync="false" src="/cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script><script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="http://www.icmcapital.co.uk" target="_blank" class="text-green">ICM.</a> All Rights Reserved </div>
    </div>
  </div>
</div>
</section>
</footer>
<div id="back-to-top"> <a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a> </div>
<script type="text/javascript" src="assets/registration/js/jquery.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/owl-carousel/owl.carousel.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/counter/jquery.countTo.js"></script> 
<script type="text/javascript" src="assets/registration/js/jquery.appear.js"></script> 
<script type="text/javascript" src="assets/registration/js/magnific-popup/jquery.magnific-popup.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/retina.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/wow.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/jquery.countdown.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/skrollr.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/registration/js/style-customizer.js"></script> 
<script type="text/javascript" src="assets/registration/js/custom.js"></script> 
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
    $("ul li").each(function () {
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
if ( check_first_name() && check_last_name() && check_email()  && check_country() && check_telephone()  ) {
$('#apply_here').attr('disabled','disabled');
$('#finalresult').html('<img src="assets/images/loader.gif" width="30" />');
$.post("<?=site_url('registration/signup')?>",{name:$('#first_name').val()+' '+$('#last_name').val(),email:$('#email').val(),country:$('#addr_country').val(),telephone:$('#telephone').val(),captcha:$('#g-recaptcha-response').val()}, function(data) {
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