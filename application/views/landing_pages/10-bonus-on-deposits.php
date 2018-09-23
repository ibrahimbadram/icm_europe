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
.iq-over-blue-90:before {
	content:inherit;
     background: none;
}
td p {
	margin-bottom:0;
}
.popup-shadow {
	position:fixed;
	width:100%;
	height:100%;
	z-index:99999;
	background:rgba(255,255,255,0.5);
	display:none;
}
.popup-section {
	position:fixed;
	width:50%;
	top:10%;
	left:25%;
	height:550px;
	z-index:999999;
	background:white;
	border:1px solid #F2F2F2;
	border-radius:5px;
	overflow:hidden;
	display:none;
	box-shadow:0 3px 10px 0 rgba(0,0,0,.3);
}
.popup-section li {
	margin:1px 0;
	width:100%;
	position:relative;
	float:left;
	line-height:25px;
	list-style:inside;
}
.popup-section-button {
    display: inline-block;
    margin:5px;
    padding: 12px 20px;
    font-size: 14px;
    line-height: 15px;
    color: #fff;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 3px 10px 0 rgba(52,161,174,.3);
    border: 0;
    outline: 0;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
    -webkit-appearance: none;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-property: background-color;
    transition-property: background-color;
	display:none;
	width:200px;
}
.button-grey {
    background-color: #939ca3;
}
.button-green {
    background-color: #65be65;
}
.buttons-container {
	text-align:center;
	width:100%;
	float:left;
	margin-top:20px;
	position:relative;
}
.text-container {
	text-align:justify;
	width:100%;
	height:400px;
	margin:0 auto 20px;
	position:relative;
	overflow-y:auto;
	padding:20px;
}
.arrow-down {
	position:absolute;
	left:45%;
	top:-50px;
	z-index:10;
	cursor:pointer;
}
h3 {
	text-align:center;
	padding:10px 0;
	color:#47c3d2;
	font-size:30px;
}
.close-it {
	position:absolute;
    right: -42px;
    top: -35px;
	z-index:999;
	cursor:pointer;
}
@media screen and (min-width: 1px) and (max-width: 1000px) {
.popup-section {
	width:98%;
	left:1%;
}	
.popup-section {
	height:80%;
}
.text-container  {
	height:70%;
}
}
.full-width {
	position:relative;
	float:left;
	width:100%;
}
</style>

</head>
<body data-spy="scroll" data-offset="80">
<div class="popup-shadow" onClick="hidepopup()"  ></div>
<div class="popup-section" >
<!--<img class="close-it" src="close.png" onClick="hidepopup()"  />-->
<div class="text-container" id="flux" >
<h3>Continuous 10% Bonus to Cash Reward</h3>
<p>In order to participate in the Continuous 10% Bonus to Cash Reward promotion you agree to be bound by these terms and conditions as well as the general terms that apply to your account.</p>
<div style="margin: 0px auto;">
<table border="1" cellspacing="0" cellpadding="0" width="512" height="252" class="table" style="height: 252px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="23%" valign="top">
<p align="center"><strong>Deposit</strong></p>
</td>
<td width="35%" valign="top">
<p align="center"><strong>10% Credit Bonus</strong></p>
</td>
<td width="23%" valign="top">
<p align="center"><strong>Lots to be traded</strong></p>
</td>
<td width="25%" valign="top">
<p align="center"><strong>Cash reward</strong></p>
</td>
</tr>
<tr>
<td  valign="top">
<p>2,000 USD</p>
</td>
<td  valign="top">
<p>200 USD</p>
</td>
<td  valign="top">
<p>40</p>
</td>
<td  valign="top">
<p>200 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>3,000 USD</p>
</td>
<td  valign="top">
<p>300 USD</p>
</td>
<td  valign="top">
<p>60</p>
</td>
<td  valign="top">
<p>300 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>4,000 USD</p>
</td>
<td  valign="top">
<p>400 USD</p>
</td>
<td  valign="top">
<p>80</p>
</td>
<td  valign="top">
<p>400 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>5,000 USD</p>
</td>
<td  valign="top">
<p>500 USD</p>
</td>
<td  valign="top">
<p>100</p>
</td>
<td  valign="top">
<p>500 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>10,000 USD</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
<td  valign="top">
<p>200</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>Above 10,000 USD</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
<td  valign="top">
<p>200</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
</tr>
</tbody>
</table>
</div>
<p align="center"><strong>Formula: Credit bonus / 5 = lots to be traded</strong></p>
<p><strong>Terms and Conditions</strong></p>
<ol>
<li>10% credit bonus will be issued on each new deposit above 2,000 USD.</li>
<li>10% credit bonus is for trading purposes only until set amount of lots have been traded; after which credit bonus can be turned into cash.</li>
<li>For each new deposit that is made a new bonus can be received as long as the bonus amount does not exceed 1,000 USD bonus per account.</li>
<li>The client can convert each new bonus to cash whenever the correlating lots, which match the above formula “Credit bonus / 5 = lots to be traded”, have been traded.</li>
<li>A maximum of 1,000 USD cash can be issued per account each time the fixed amount of lots has been reached.</li>
<li>Calculations will be made on a deposit by deposit basis.</li>
<li>There is no time limit for the lots to be traded.</li>
<li>In the process of trading the client can withdraw funds from their account but this may result in credit bonus reduction by 10% of the withdrawal amount accordingly.</li>
<li>If a client deposits more than 10,000 USD then they will be able to maintain 1,000 USD bonus as long as more than 10,000 USD is maintained in the account. <br /> Example: Client deposits 10,000 USD and receives 1,000 USD bonus, they later deposit another 5,000 USD to the same account (they do not receive anything as the maximum bonus they can receive in one account is 1,000 USD). The client then withdraws 5,000 USD; they keep 1,000 USD bonus as this correlates to the original 10,000 USD deposit.</li>
<li>Any withdrawals of profit must be funded to a bank account which matches the ICM Capital account holder’s name.</li>
<li>Traded lots will be calculated on the last working day of each month. Any applicable cash reward will be deposited into the clients live account within 5 working days thereafter if all terms have been met.</li>
<li>No Marketing Agent’s commission is included in the calculations for bonus or cash reward.</li>
<li>Master accounts and sub-accounts are entitled to this promotion and can receive a maximum of 1,000 USD bonus per account.</li>
<li>This revised promotion starts on 1<sup>st</sup> March 2014 and ending on 01/08/2018.</li>
<li>Clients will be informed before this promotion ends and any remaining trading credit is withdrawn.</li>
</ol>
<br>
<p><strong>Communication Delay</strong></p>
<p>ICM Capital shall not be made liable for any delays in the acceptance or transmission of orders due to a breakdown or failure of transmission or communication facilities, or for any other cause beyond their reasonable control or anticipation.</p>
<p><strong>Disentitlement</strong></p>
<p>In cases of any indiscretion in trading, over leveraging, misuse of orders where "scalping" or “sniping” or “hedging” may be involved, such transactions will not be taken into consideration and will be treated as Terms and Conditions breaching activity and may even be removed from participants accounts. ICM Capital reserves the right to disqualify any participant or cancel the trades found in violation of the trading rules or applying inappropriate trading strategies. Scalping is defined as a trade that was opened and closed within a very short period of time. Hedging means a client over exposing his account with an opposite trade to an existing trade with the same trade volume with ICM Capital or another company to gain profit from deal terms.</p>
<p><strong>Postponement or Cancellation</strong></p>
<p>ICM Capital in its sole discretion, reserves the right to extend or postpone the promotion periods, to cancel the promotion and/or to reject any participant's application if determined that such action is reasonable and/or necessary.<br /><br /> The credit bonus will be forfeited and removed from the account under the following circumstances:</p>
<ul>
<li>The account gets liquidated/stopped out <u>OR</u></li>
<li>The account balance becomes negative <u>and</u> account has no open positions</li>
</ul>
<p>If the equity/margin falls below 0%, the credit bonus will be utilised to adjust balances to zero.</p>
<p><strong>Promotion Terms</strong></p>
<p>ICM Capital reserves the right to amend or waive any rule during and after this promotion. We may make changes to the Terms and Conditions and will notify you of these changes by posting the modified terms on the ICM Capital website.</p>
<p><strong>Engaging in CFDs or Spot FX carries a high risk to your capital. You should not engage in this form of investing unless you understand the nature of the Transaction you are entering into and the true extent of your exposure to the risk of loss. Your profit and loss will vary according to the extent of the fluctuations in the price of the underlying markets on which the trade is based.</strong></p>
<p>Please <a data-id="3489" href="/policies/terms-and-conditions/" title="Terms and Conditions">click here</a> for full trading terms and conditions.</p>
<p>These terms are dated 10<sup>th</sup> January 2018.</p>


<div class="reached full-width" ></div>
</div>
<div class="buttons-container" >
<img alt="arrow_down.png" class="arrow-down"   onClick="scrolldiv()"
src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjE4M0RCMzM2NzNDQTExRTg5OTM4ODUzQzY0NzA4RTNGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjE4M0RCMzM3NzNDQTExRTg5OTM4ODUzQzY0NzA4RTNGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MTgzREIzMzQ3M0NBMTFFODk5Mzg4NTNDNjQ3MDhFM0YiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MTgzREIzMzU3M0NBMTFFODk5Mzg4NTNDNjQ3MDhFM0YiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5mbLr9AAAKBUlEQVR42uxYbXBVRxl+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" />
<button class="popup-section-button  button-green" onClick="hidepopup()" >Close </button>
</div>
</div>
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
<section id="iq-home" class="iq-banner overview-block-pt iq-bg iq-bg-fixed iq-over-blue-90" style="background: url(assets/registration/images/bg/000.jpg);">
  <div class="container-2">
  <div class="full-width"> 
<input type="hidden" id="telephonecodeval" >
<form id="tc-lead-registration" >
      <? if ( $this->lg == 'ar' ) { ?>
    <input data-tc-field="field" type="hidden" id="Campaign:Referrer URL" name="campaign_id" value="1533549688-ar"/>
            <? } else { ?>
    <input data-tc-field="field" type="hidden" id="Campaign:Referrer URL"  name="campaign_id" value="1533549688"/>
      <? } ?>
    <input data-tc-field="field" type="hidden" id="Campaign:Campaign ID" name="campaign_name" value="10% bonus on deposits <?=$this->lg?>"/>
  <div class="three-full-width margin-top-28">
      <div class="banner-text">
          <div class="full-width">
              <h2 class="form__title form__title-2 white-color margin-bottom-2-30 full-width">
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
              <h4 class="showpopup" onClick="showpopup()" >
              * Terms & conditions</h4>
            </div>
          </div>
        </div>
</form>
    <div class="seven-full-width margin-top-50-2 text-align-center full-height">
      <div class="full-width full-height ">
      <h1 class="text-align-center white-color  margin-bottom-30 middle-text"  >
       <? if ( $this->lg == 'ar' ) { ?>
                  <strong> 10٪ BONUS </ strong> على الودائع *

              <? } else { ?>
    <strong>10% BONUS</strong> on Deposits*
              <? } ?>
 <br>
 <? if ( $this->lg == 'ar' ) { ?>
           &quot; وما يصل إلى 1: 400 الرافعة المالية
&quot;
              <? } else { ?>
 & Up To 1:400 Leverage
              <? } ?>
</h1>
      <div class=" full-width">
        <div class="full-width">
          <div class="iq-banner-video"> 
          <img class="banner-img" src="assets/registration/images/bonus.png" alt=""> 
            </div>
        </div>
        </div>
        
        
      </div>
    </div>
    </div>
  </div>
  <!--<div class="banner-objects banner-objects-2"> 
  <span class="banner-objects-01" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-50px);"> 
  <img src="assets/registration/images/drive/03.png" alt="drive02"> </span> <span class="banner-objects-02 iq-fadebounce"> <span class="iq-round"></span> </span> <span class="banner-objects-03 iq-fadebounce"> <span class="iq-round"></span> </span> <span class="banner-objects-04" data-bottom="transform:translatex(100px)" data-top="transform:translatex(-100px);"> <img src="assets/registration/images/drive/04.png" alt="drive02"> </span> </div>-->
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


function showpopup(){
//$('body').css('overflow','hidden');	
$('.popup-section,.popup-shadow').fadeIn('fast');	
}
function hidepopup(){
//$('body').css('overflow-y','scroll');	
$('.popup-section,.popup-shadow').fadeOut('fast');	
}
function scrolldiv(){
$("#flux").animate({ scrollTop: $('#flux').prop("scrollHeight")}, 1000);	
}

$(document).ready(function() {
//$('#flux').width($('.popup-section').width()-50);
$('#flux').height($('.popup-section').height()-200);
        $('#flux').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
          $('.popup-section-button').fadeIn('fast');
		  $('.arrow-down').fadeOut('fast');
        } else {
			$('.popup-section-button').fadeOut('fast');
			$('.arrow-down').fadeIn('fast');
		}
    });
});
</script>
</body>
</html>