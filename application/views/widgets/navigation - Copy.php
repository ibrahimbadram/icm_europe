<?
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
   <style>
		.margin-b-20{
			margin-bottom:20px !important;
		}
		/*@-webkit-keyframes jello {
		  from, 11.1%, to {
			-webkit-transform: none;
			transform: none;
		  }

		  22.2% {
			-webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
			transform: skewX(-12.5deg) skewY(-12.5deg);
		  }

		  33.3% {
			-webkit-transform: skewX(6.25deg) skewY(6.25deg);
			transform: skewX(6.25deg) skewY(6.25deg);
		  }

		  44.4% {
			-webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
			transform: skewX(-3.125deg) skewY(-3.125deg);
		  }

		  55.5% {
			-webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
			transform: skewX(1.5625deg) skewY(1.5625deg);
		  }

		  66.6% {
			-webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);
			transform: skewX(-0.78125deg) skewY(-0.78125deg);
		  }

		  77.7% {
			-webkit-transform: skewX(0.390625deg) skewY(0.390625deg);
			transform: skewX(0.390625deg) skewY(0.390625deg);
		  }

		  88.8% {
			-webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
			transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
		  }
		}

		@keyframes jello {
		  from, 11.1%, to {
			-webkit-transform: none;
			transform: none;
		  }

		  22.2% {
			-webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
			transform: skewX(-12.5deg) skewY(-12.5deg);
		  }

		  33.3% {
			-webkit-transform: skewX(6.25deg) skewY(6.25deg);
			transform: skewX(6.25deg) skewY(6.25deg);
		  }

		  44.4% {
			-webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
			transform: skewX(-3.125deg) skewY(-3.125deg);
		  }

		  55.5% {
			-webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
			transform: skewX(1.5625deg) skewY(1.5625deg);
		  }

		  66.6% {
			-webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);
			transform: skewX(-0.78125deg) skewY(-0.78125deg);
		  }

		  77.7% {
			-webkit-transform: skewX(0.390625deg) skewY(0.390625deg);
			transform: skewX(0.390625deg) skewY(0.390625deg);
		  }

		  88.8% {
			-webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
			transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
		  }
		}*/

	   .show-on-scroll-only{
		   display:none !important;
	   }
	   
	   .burger_menu{
		   top:45px;
		   right:0;
	   }
	  
		@media screen and (min-width: 1035px){
			.header_logo {
				 width: auto;
			}
			header:not(.fixed_menu) .header_logo {
				position: relative;
				top: 20px;
			}
		}
		.header_first_row {
			padding: 0;
		}
		
		.header_first_row .header-row:first-child {
			    padding: 0px 0 12px;
		}
		
		
		
		header .sponsors_logo {
			padding: 10px 0;
			display: inline-block;
			text-align: center;
			position: relative;
			padding:0;
			margin-left:30px;
			vertical-align:bottom;
		}
		
		.sponsors_logo_mobile{
			display:none;
		}
		
		
		header .sponsors_logo .logo_container {
			display: inline-block;
			width:100%;
			height:100%;
		}
		
		header .sponsors_logo .logo_container .fullham-logo{
			    width: 200px;
		}
		
		header .sponsors_logo .logo_container .polo-logo{
			        width: 145px;
		}
		
		
		header .sponsors_logo .logo_container .cyclink-logo:last-child{
			    width: auto;
		}
		
		
		@media only screen and (min-width:991px){
			.header_logo a img{
					width: 220px;
					padding: 0;
					margin: 0;
			}
			header .sponsors_logo {
				margin-left:45px;
			}
			
			header .sponsors_logo .logo_container .fullham-logo {
					width: 165px;
				}
		}
		
		header .sponsors_logo .logo_container > * {
			display: inline-block;
			vertical-align:middle;
			
		}
		
		header .sponsors_logo .logo_separator {
				width: 1px;
				background-color: #ccc;
				height: 40px;
				margin: 0 10px;
				
			}

		
		.header_language {
			margin: 0 10px 0 20px;
		}
		.header_second_row {
			padding:0px 0px 10px 0;
		}
		
		@media screen and (min-width: 1035px){
			.header_first_row_width {
				width: 460px;
			}
		}
		
		header .container{
			 max-width: 93%;
		}
		
		@media screen and (max-width:1250px){
			header .sponsors_logo {
				margin-left:1em;
			}
		}
		
		@media screen and (max-width:1140px){
			.header_first_row_width {
				width: auto;
			}
			.header_logo a img ,
			header .sponsors_logo .logo_container .fullham-logo{
					width: 160px;
			}
			
			header .sponsors_logo .logo_container .fullham-logo:last-child{
			}
			
			.l-logo{
				width: 265px !important;
			}
		}
		@media screen and (max-width:1036px){
			.header_logo,
			.header-top-right-container{
				float:none !important;
			} 
			.header-top-right-container{
			    display: table;
				margin: 0 auto;
				
			}
		}
		
		@media screen and (max-width:1035px){
			header .container{
				width:95%;
				    max-width: 100%;
					margin:0 auto;
			}
		}
		
		.links-holder a span{
			padding:10px 20px;
		}
		
		header .mobile-support,
		header .email-support{
			margin-left:auto;
			margin-right:20px;
		}
		
		
		.languages_bar{
			top:-5px;
			left:auto;
			right:-5px;
			background: #eff2f2;
			border-top: #044f80 solid 1px;
		}
		
		.header_ar .languages_bar,
		.header_fa .languages_bar{
			left:-15px;
			right:auto;
		}
		
		.header_ar .mobile-support,
		.header_ar .email-support,
		.header_fa .mobile-support,
		.header_fa .email-support{
			margin-right:auto;
			margin-left:20px;
		}
		
		
		.light_blue_bg {
			background: #004E7F;
		}
		
		.mobile-support a,
		.email-support a {
			color: #606a70;
			position:relative;
			top:5px;
			//border-bottom: 1px solid #044f80;
			transition: all .5s;
			display: inline-block;
			line-height: 14px;
			
		}
		
		.mobile-support a span font,
		.email-support a span font{
			font-weight:bold;
			font-size: 14px;
		}
		.mobile-support a span i,
		.email-support a span i{
			font-size:18px;
			    color: #004E7F;
		}
		
		
		.top-menu-separator{
			position:relative;
		}
		.top-menu-separator:before, .top-menu-separator:after {
			content: '';
			position: absolute;
			top: 5px;
			left: 0;
			width: 1px;
			height: 18px;
			background-color: #d7dce0;
		}
		
		span.demo-account{
			background: #3cafdb;
		}
		
		/*span.demo-account:hover{
			background: #b7b7b7;
		}*/
		
		/*@keyframes blink {
				0% { box-shadow: inset 0 0 0 50px #3cafdb; }
				50% { box-shadow: none; }
				100% { box-shadow: inset 0 0 0 50px #3cafdb;}
			}

			@-webkit-keyframes blink {
				0% { box-shadow: inset 0 0 0 50px #3cafdb; }
				50% { box-shadow: 0 0 0; }
				100% { box-shadow: inset 0 0 0 50px #3cafdb; }
			}
			*/

		span.real-account{
			background: #004E7F;
			position: relative;
			box-shadow: inset 0 0 0 0 #3cafdb;
			-webkit-transition: ease-out 0.4s;
			-moz-transition: ease-out 0.4s;
			transition: ease-out 0.4s;
			/*-webkit-animation: blink 2.0s linear infinite;
			-moz-animation: blink 2.0s linear infinite;
			-ms-animation: blink 2.0s linear infinite;
			-o-animation: blink 2.0s linear infinite;
			animation: blink 2.0s linear infinite;*/
			overflow:hidden;
			
		}
		
		span.real-account:hover {
		  //box-shadow: inset 400px 0 0 0 #3cafdb;
		  color:#FFF;
		}

		span.icm-access{
		    background: #b7b7b7;
		}
		
		span.icm-access:hover{
		    //background: #004E7F;
		    background: #3cafdb;
		}
		.leftSideSocialMedia{
			display:none;
		}
		
		
		@media only screen and (min-width:991px){
			.leftSideSocialMedia{
				display:block;
				position:fixed;
				left:0;
				bottom:25px;
				z-index: 9;
				transform:translateY(-50%);
				-moz-transform:translateY(-50%);
				-webkit-transform:translateY(-50%);
				-ms-transform:translateY(-50%);
			}
			
			.leftSideSocialMedia.social_ar,
			.leftSideSocialMedia.social_fa{
				left:auto;
				right:0;
			}
			
			
			.leftSideSocialMedia a{
				display:block;
				//padding: 9px 0 5px 12px;
				padding: 0 0 0px 10px;
				margin: 15px 0px;
				
			}
			
			.leftSideSocialMedia.social_ar a,
			.leftSideSocialMedia.social_fa a{
				padding: 0 12px 0px 0px;
			}
			
			
			.social-icons .social_media span a i{
				font-size:24px;
			}
		}
		.burger_menu{
			bottom:-40px;
		}
		.languages_bar {
			position: fixed;
			top:0;
			left:0;
			width:100%;
			border:none;
		}
	
		
		.language-global-menu .langs {
			overflow: hidden;
			padding: 29px 180px 18px 0;
			width: 960px;
			margin-left: auto !important;
			margin-right: auto !important;
			list-style: none;
			position: relative;
			-moz-column-count: 4;
			-webkit-column-count: 4;
			column-count: 4;
			min-height: 135px;
		}
		
		.language-global-menu .langs li {
			margin: 0 0 5px;
			background: none;
			padding: 0;
			overflow: hidden;
		}
		
		
		.btn-div-close {
			position: absolute;
			top: 31px;
			right: 0;
			padding: 0 33px 0 0;
			color: #004E7F;
			font: 500 14px/30px 'Roboto', sans-serif;
			color: #004E7F !important;
		}

		.btn-div-close .fa{
			color: #004E7F !important;
			font-size: 20px;
			margin-left: 5px;
		}

		.language-global-menu li a {
			color: #606a70;
			display: inline-flex;
			padding: 0 0 0 0;
			text-transform: capitalize;
		}

		.language-global-menu li a span {
			display: block;
			white-space: nowrap;
			position:relative;
			top:5px;
		}

		.language-global-menu a:hover, .language-global-menu .sflangSelected a span, .language-global-menu a:hover span {
			color: #004E7F;
			text-decoration: none;
		}
		
		
	
	
		@media screen and (min-width:895px) and (max-width:1035px){
			.header_logo{
				float:none;
			}
			
			.header-top-right-container{
				float:none;
			}
			
			.header_first_row .header-row:first-child {
				float:right;
				padding-top:0;
				padding-right:20px;
			}
			
		}
		@media only screen and (max-width:1035px){
			.main_menu{
				top:100px;
				min-height: 100vh;
			}
			.header_container,
			.header_menu{
				position:static;
			}
			 .main_menu{
				   background: rgba(4, 79, 128, 1);
				   overflow-y:auto;
			   }
			
			.header_menu .main_menu{
				position:absolute;
				top:100px;
			}
			.header_first_row .header-row:first-child{
				display:none;
			}
			
			.header-top-right-container{
				float:none;
			}
			
			.header_logo {
				z-index:1;
			}
			
			
			.links-holder a span{
				padding:15px !important;
				
			}
			
			.header_logo{
			       float: none;
				margin: 20px auto;
		   }
		   
		   .header-top-right-container{
			       float: none;
					direction: ltr;
					margin: 0 auto;
					display: block;
		   }
		   
			
			header .links-holder a span,
			header .links-holder a {
				display:inline-block;
				width: auto;
				vertical-align: middle;
				margin-right: 10px;
				    height: 45px;
					    margin: 10px auto 15px auto;
			}
		}
		
		@media only screen and (min-width:1035px){
			.fixed_menu {
				top: 0;
				-webkit-transition: all 5ms ease;
				-moz-transition: all 5ms ease;
				-ms-transition: all 5ms ease;
				-o-transition: all 5ms ease;
				transition: all 5ms ease;
			}
			
			.header_ar.fixed_menu .header_menu,
			.header_fa.fixed_menu .header_menu {
				float:left;
			}
			
			.fixed_menu_2{
				z-index:1;
			}
			.fixed_menu .sponsors_logo{
				display:none !important;
			}
			
			.fixed_menu_2 .header_logo a img{
				width:130px;
				    margin: 10px 0;
			}
			
			.fixed_menu_2 .header_logo a img.slogon-logo{
				margin-top:0;
			}
			.fixed_menu_2 .header_logo a img.l-logo{
				margin-bottom:0;
			}
			
			.fixed_menu_2 .links-holder,
			.fixed_menu_2 .header_first_row_width{
				display:none;
			}
			.fixed_menu .container{
				max-width:1170px;
				width:100%;
			}
			
			.fixed_menu .show-on-scroll-only{
			   display:inline-block !important;
			   margin:0px 10px 0;
		   }
		   
		   .fixed_menu .show-on-scroll-only:hover{
			  margin:0px 10px 0 0 !important;
		   }
		   
		   .fixed_menu .no_hover_effect:hover{
				font-weight:normal !important;
				background:none !important;
				margin:0 !important;
				transform:none !important;
				width:auto !important;
				border:none !important;
				
			}
			
			.fixed_menu .show-on-scroll-only a span{
				padding: 13px 10px;
			}
			
			.fixed_menu .sub_menu_inner{
				top:0;
				z-index:10000;
			}
			
		}
		@media screen and (min-width:1036px) and (max-width:1276px){
				
			.links-holder{
				padding-top:10px;
			}
		}
		
		@media screen and (min-width:1036px) and (max-width:1276px){
			.header_logo,
			.header-top-right-container{
				float:none;
			}
			
			.header-top-right-container{
				margin-top:30px;
			}
		
		}
		@media screen and (max-width:660px){
			.sponsors_logo{
				display:none !important;
			}
			.sponsors_logo_mobile{
				display:block;
			    float: left;
				width: 100%;
				 margin-top: 24px;
				text-align: center;
			}
			.sponsors_logo_mobile img{
				max-width:100%;
				width:auto !important;
			}
		}			
		@media screen and (max-width:500px){
			.l-logo {
				width: 190px !important;
			}
			
			.sponsors_logo_mobile img {
				max-width: 67%;
			}
			.header_logo{
				text-align:left;
				padding:0;
				    margin: 10px auto;
			}
			.burger_menu{
				    top: 20px;
			}
			
			.header_menu .main_menu {
				top: 90px;
			}
			
			.parent_menu font,
			.menu-span{
				font-family: sans-serif;
			}
			.parent_menu font{
				font-size:100%;
			}
			.menu-span{
				font-size:75%;
			}
			
			.header_menu li:after{
				top:15px;
			}
			.links-holder{
				width:100%;
				float: left;
				margin: 10px 0px 0px;
			}
			
			.links-holder a{
				display: block;
				margin-bottom: 10px;
				margin-right:10px;
				width:100%;
			}
			.links-holder a span{
				width:100%;
			}
			.main_menu{
				top:60px ;
			}
			
			.header_menu .main_menu{
				padding-top: 10px
			}
			
			.main_menu li{
				background:transparent;
			}
			
		}
		
		/*right buttons*/
		#feedback-buttons-block {
			bottom: -30px;
			transform: translateY(-50%);
			-webkit-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			-o-transform: translateY(-50%);
			position: fixed;
			right: 0;
			z-index: 9;
		}
		#feedback-buttons-block > div {
			width: 60px;
			height: 63px;
			margin: 0 0 10px;
		}
		#feedback-buttons-block a {
			background: url(<?=base_url()?>assets/images/sprite1.png) 0 0 no-repeat;
			height: 63px;
			color: #fff;
			overflow: hidden;
			font: 12px/105px Arial, Helvetica, sans-serif;
			display: block;
			text-align: center;
			transition: all 0.3s ease-out;
			-webkit-transition: all 0.3s ease-out;
		}
		#feedback-buttons-block .call-button-block a {background-position: 0 -126px;}
		#feedback-buttons-block .mail-button a {background-position: 0 -63px;}
		#feedback-buttons-block .mail-button a:hover, 
		#feedback-buttons-block .call-button-block a:hover, .livechat-button a:hover {text-decoration: none;}
		#feedback-buttons-block .livechat-button a.hover,
		#feedback-buttons-block .livechat-button a:hover{background-position: -63px 0;}
		#feedback-buttons-block .call-button-block a.hover,
		#feedback-buttons-block .call-button-block a:hover {background-position: -63px -126px;}
		#feedback-buttons-block .mail-button a.hover,
		#feedback-buttons-block .mail-button a:hover {background-position: -63px -63px;}
		
		
		#mobile-feedback-block {
			top: 65%;
			transform: translateY(-50%);
			-webkit-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			-o-transform: translateY(-50%);
			position: fixed;
			right: -50px;
			z-index: 9;
			display: none;
		}
		
		#mobile-feedback-block{
			-ms-transform: rotate(-90deg);
			-webkit-transform: rotate(-90deg);
			transform: rotate(-90deg);
		}
		#mobile-feedback-block a {
			background: #004E7F  95% 50% no-repeat;
			color: #fff;
			padding: 4px 13px 4px 13px;
			border-radius: 5px 5px 0 0;
			font-size: 15px;
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			margin: 0px 5px 0 0;
			text-transform:capitalize;
		}
		
		@media screen and (max-width:768px) {
			.burger_menu{
			   right:0;
		   }
		   
		   
			#feedback-buttons-block{
				display: none;
			}
			#mobile-feedback-block {
				display: block;
			}
			
		}
		
		@media only screen and (min-width:955px){
		.padding-10-75{
			padding:10px 75px !important;
		}
		}
		
		body.select-is-opened .popup-section .select2-dropdown{
			position:absolute !important;
			left: 0 !important;
		}
		
		.popup-section .home_newsletter{
			min-height:300px;
			
		}
		
		.popup-section .full-width {
			   margin-bottom : 5px;
		}
		
		.popup-section .full-width .form-group .input-field_country{
			    height: 53px;
		}
		
		.popup-section  .input-field__label,
		.popup-section  .flag-icon,
		.popup-section .input-select__label{
			font-size: 15px;
			color: #666;
		}
		.popup-section  .input-field__label,
		.popup-section .input-select__label
		{
			position: absolute;
			left: 15px;
		}
		
		.popup-section li{
			line-height:10px;
		}
		.popup-section  .input-field__label {
			top: 14px;
			cursor: text;
			-webkit-transition: all .1s linear;
			transition: all .1s linear;
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		
		.popup-section .input-select__label {
			top: 9px;
			z-index: 10;
		}

		.popup-section .input-field__label_placeholder {
			top: 6px;
			font-size: 15px;
		}
		.popup-section .form-control,
		.popup-section .select2-selection__rendered{
			    height: 55px;
				
		}
		
		.popup-section  input[type=text],
		.popup-section  textarea{
			padding: 35px 15px 0;
		}
		.popup-section .form-group{
			margin-bottom:0;
		}
		
		/*.popup-section .select2-selection__arrow b {
			top: 100% !important;
			position:absolute;
		}*/
		
		.popup-section .select2-container--default .select2-selection--single {
			border: none !important;
			outline: none !important;
		}
		
		.popup-section .close-it{
			top:20px;
			right:20px;
		}
		
		.popup-section .select2-selection__arrow{
			height:10px;
		}
		.popup-section textarea{
			height:100px !important;
		}
		/*.popup-section  .select2-container--default .select2-selection--single .select2-selection__rendered {
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;
				-ms-align-items: center;
				-webkit-align-items: center;
				align-items: center;
				-ms-justify-content: left;
				-webkit-justify-content: left;
				-moz-justify-content: left;
				justify-content: left;
			}*/
		
		/*
		* New language design
		*/
		.header_first_row_width{
			position:relative;
			    display: block;
		}
		.languages_bar{
			display: none;
			background-color: transparent;
			-moz-border-radius: 0;
			left: auto;
			right: 0;
			max-width: 380px;
			padding: 10px;
			padding-bottom: 0;
			position: absolute;
			top: 37%;
			z-index: 12;
		}
	
		.language-global-menu .langs{
			padding:0;
		}
		
		.languages_bar {
			
		}
		.language-global-menu div.relative  {
			border: 1px solid #FFF;
			background-color:  rgba(0, 78, 127, 1);
			-moz-border-radius: 0;
			-webkit-border-radius: 0;
			border-radius: 0;
			margin-top: 15px;
			position: absolute;
			top: 100%;
			left: 0;
			right: 0;
			width: 100%;
			
		}
		
		.language-global-menu div.relative  ul{
			width: 100%;
			padding: 10px;
			padding-bottom: 0;
			font-size: 14px;
			text-align: left;
			    -moz-column-count: inherit;
			-webkit-column-count: inherit; 
			 column-count: inherit; 
			 -webkit-box-shadow: 0 6px 12px rgba(0,0,0,0.175);
			box-shadow: 0 6px 12px rgba(0,0,0,0.175); 	
			-webkit-background-clip: padding-box;
			background-clip: padding-box;
			min-height: 90px;
		}
		
		.language-global-menu div.relative:before {
			content: '';
			width: 0;
			height: 0;
			display: block;
			border-style: solid;
			position: absolute;
			border-width: 0 8px 8px 8px;
			border-color: transparent transparent rgba(0, 78, 127, 1) transparent;
			position: absolute;
			bottom: 100%;
			right: 7px;
		}
		.language-global-menu .langs li{
			width:33%;
			float:left;
		}
		.language-global-menu li a{
			color:#FFF;
		}
		.header_language {
			margin:3px  10px 0 20px;
		}
		
		.languages_bar{
			top:10px;
		}
		
		.language-global-menu li a{
			position:relative;
		}
		
		.language-global-menu li:hover a span{
			color:#007bff;
			-webkit-transition:color .2s;
			transition:color .2s;
			-moz-transition:color .2s;
			-ms-transition:color .2s;
			-o-transition:color .2s;
		}
		.language-global-menu li:hover a img{
			opacity:.5;
		}
		
		.logo-A,
		.sponsors_logo{
			display:inline-block;
		}
		.logo-A{
		    display: inline-block;
			vertical-align: top;
			margin-top: -10px;
		}
		
	   </style>
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
<div class="popup-shadow" onClick="hidepopup()"  ></div>
<div class="popup-shadow-2"   ></div>
<div class="popup-section" id="get_call_popup" style="display:none">
	<img class="close-it" src="assets/images/close.png" onClick="hidepopup()"  />
	<div class="text-container" >
	<h3 class="text-center"></strong>GEt A CALL</strong></h3>
	<div class="full-width home_newsletter" style="background:none" >
	<input type="hidden" name="lang_ref" id="lang_ref" value="<?=$this->lang->lang()?>">
	<div class="full-width">
	<div class="full-width">
		<div class="col-amd">
			<div class="form-group">
				<label class="input-field__label input-field__label_placeholder"><?=lang('home_full_name_placeholder')?></label>
				<input class="form-control input-field_name_popup" type="text" id="name_popup" name="name" onKeyUp="check_full_name_popup()">
				<div class="input-tooltip input-tooltip_full_name_popup input-tooltip_error" style="display:none" ><?=lang('home_full_name_error_msg')?></div>
			</div>
		</div>
	</div>
	<div class="full-width">
		<div class="col-amd">
			<div class="form-group">
			<label class="input-field__label input-field__label_placeholder"><?=lang('home_email_placeholder')?></label>
			<input class="form-control input-field_email_popup input-field__input_is-address" type="text"  id="email_popup" name="email" onKeyUp="check_email_popup()">
			<div class="input-tooltip input-tooltip_error input-tooltip_email_popup" style="display:none" ><?=lang('home_email_error_msg')?></div>
			</div>
		</div>
	</div>
	 <div class="full-width form__field phone_container">
			<input type="hidden" id="phone_code_label" value="<?=lang('code')?>"/>
			<div class="col-bmd-3">
			<div class="form-group">
			<!--<input class="form-control input-field_phone_code_popup input-field__input_is-number" type="text" placeholder="<? echo $this->sm->getword('country code',$this->lg)?>" id="phone_code_popup" name="phone_code_popup" onKeyUp="check_phone_code_popup()" >-->
			<select class="form-control input-select__input select2-hidden-accessible" id="phone_code_popup" name="phone_code_popup" tabindex="-1" aria-hidden="true" onchange="check_phone_code_popup()">
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
			<span class="select2 select2-container select2-container--default" <?=$dir?> style=""> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" onClick="getACall_popup_showcountries()" id="showcountries"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" >
			<div id="change_country">
			<div class="flag-icon flag-icon_af" style="background:none" ><?=lang('code')?></div>
			</div>
			</span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries"  <?=$dir?> style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
			<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString">
			</span> <span class="select2-results">
			<ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results" aria-expanded="true" aria-hidden="false" <?=$dir?>>
			<?php
			foreach ($contries as $row){
			?>
			<li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="getACall_popup_choose_country('<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
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
							<?=lang('home_phone_placeholder')?>
						  </label>
						 <input type="text" name="phone" id="phone_popup"  class="form-control input-field_phone_popup input-field__input input-field__input_is-number" onkeyup="steps_check_phone_popup()" style="width:100%;">
						</div>
					  </div>
					  <div class="input-tooltip input-tooltip_phone_popup input-tooltip_error" style="display:none" >
						<?=lang('home_phone_error_msg2')?>
					  </div>
					</div>
			</div>
		</div>
        <div class="full-width form__field" >
			<div class="col-amd">
				<div class="form-group">
				<input type="hidden" id="country_residence_label" value="<?=$this->sm->getword('Country of Residence', $this->lg)?>"/>
			  <div class="input-select input-select_width_full input-field_country">
			   <label class="input-select__label" id="country_label"> <?=$this->sm->getword('Country of Residence', $this->lg)?></label>
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
				<span class="select2 select2-container select2-container--default" <?=$dir?> style="    height: 55px;"> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-container" onClick="getACall_popup_showcountries2()" id="showcountries2"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-container" >
				<div id="change_country2">
				  <div class="flag-icon flag-icon_af" style="background:none" ></div>
				</div>
				</span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries2"  <?=$dir?> style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
				<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString2">
				</span> <span class="select2-results">
				<ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-results" aria-expanded="true" aria-hidden="false" <?=$dir?>>
				  <?php
	foreach ($contries as $row){
	 ?>
				  <li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected2-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="getACall_popup_choose_country2('<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
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
	<div class="full-width">
		<div class="col-amd">
			<div class="form-group">
			<label class="input-field__label input-field__label_placeholder">Subject</label>
			<input class="form-control input-field_subject_popup" type="text"  id="subject_popup" name="email" onKeyUp="check_subject_popup()">
			<div class="input-tooltip input-tooltip_error input-tooltip_subject_popup" style="display:none" >Subject is required</div>
			</div>
		</div>
	</div>
	<div class="full-width margin-b-20">
		<div class="col-amd">
			<div class="form-group">
			<label class="input-field__label input-field__label_placeholder">Message </label>
			<textarea class="form-control input-field_message_popup" id="message_popup" name="email" onKeyUp="check_message_popup()"></textarea>
			<div class="input-tooltip input-tooltip_error input-tooltip_message_popup" style="display:none" >Message is required</div>
			</div>
		</div>
	</div>
	<div class="full-width">
		<div class="col-amd text-center">
		<button class="btn btn-primary" <? /*onClick="sendform_popup()"*/?> id="subscribe_here_popup">Request CallBack</button>
		</div>
	</div>
	<div class="full-width">
			<div class="col-amd">
			<div class="input-tooltip text-center" style="display:none" id="finalresult_popup"></div>
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
	<div class="call-button-block"><a class="call-button" rel="<?=$this->lg?>"><? echo $this->sm->getword('Call',$this->lg)?></a></div>
</div>
<div id="mobile-feedback-block">
	<noindex>
	<!--a rel="nofollow" href="#" onclick="javascript:$zopim.livechat.window.show(); return false;">Live Chat
	</a-->
	<a rel="nofollow" href="mailto:support@icm.com"><? echo $this->sm->getword('MAIL',$this->lg)?>
	</a>
	<a rel="nofollow" href="#" onclick="javascript:showpopup(); return false;"><? echo $this->sm->getword('Call',$this->lg)?>
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
   <?php /*<div class="header_first_row full_width background_navy">
      <div class="header_container">
         <div class="relative floatleft margin-top-8 header_first_row_width" style="direction:ltr" >
            <span class="mobile-support floatleft relative">
            <a href="tel:+442074425610">
            <span class="white_color">
            <i class="fa fa-phone " ></i> 
            <font class="hide-mobile"  >+44 207 442 5610 </font>
            </span>
            </a>
            </span>
            <span class="email-support floatleft relative">
            <a href="mailto:support@icm.com">
            <span class="white_color ">
            <i class="fa fa-envelope " ></i> 
            <font class="hide-mobile" >support@icm.com</font>
            </span>
            </a>
            </span>
            <div class="relative floatright social-icons font_14" >
               <span class="social_media floatright relative">
               <span class="white_color">
               <a href="https://www.instagram.com/ICMCapital/" target="_blank" >
               <i class="fa fa-instagram"></i></a>
               <a href="https://www.facebook.com/ICMCapital" target="_blank" >
               <i class="fa fa-facebook"></i></a>
               <a href="https://www.twitter.com/ICMCapital" target="_blank" >
               <i class="fa fa-twitter"></i></a>
               <a href="https://www.linkedin.com/company/icm-capital" target="_blank" >
               <i class="fa fa-linkedin"></i></a>
               </span>
               </span>
               <div class="header_language floatright relative pointer show_languages">
                  <!--<i class="fa fa-globe white_color margin-right-5"></i>-->
                  <img src="assets/images/languages/<?=$this->lg?>.png" class="active_lang"><font class="white_color"> <i class="fa fa-angle-down"></i>  </font>
                  <div class="languages_bar ">
                     <div class="full-width">
                        <a href="<?php echo $this->lang->switch_uri('en'); ?>">
                           <div class="language_bar">
                              <img src="assets/images/languages/en.png">
                           </div>
                        </a>
                        <a href="<?php echo $this->lang->switch_uri('ar'); ?>">
                           <div class="language_bar">
                              <img src="assets/images/languages/ar.png">
                           </div>
                        </a>
                        <a href="<?php echo $this->lang->switch_uri('zh'); ?>">
                           <div class="language_bar">
                              <img src="assets/images/languages/ch.png">
                           </div>
                        </a>
                     </div>
                     <div class="full-width">
                        <a href="<?php echo $this->lang->switch_uri('es'); ?>">
                           <div class="language_bar">
                              <img src="assets/images/languages/es.png">
                           </div>
                        </a>
                        <a href="<?php echo $this->lang->switch_uri('ru'); ?>">
                           <div class="language_bar">
                              <img src="assets/images/languages/ru.png">
                           </div>
                        </a>
                        <? if ( $show == 1 ) {  ?>
                        <a href="<?php echo $this->lang->switch_uri('fa'); ?>">
                           <div class="language_bar">
                              <img src="assets/images/languages/fa.png">
                           </div>
                        </a>
                        <? } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <div class="relative floatright links-holder" >
            <a href="<?=site_url('icm_access')?>">
            <span class="white_color relative floatright light_blue_bg pointer padding-10 margin-left-10 real-account icm-access transition-5ms ">
            <? echo $this->sm->getword('ICM ACCESS',$this->lg)?></span>
            </a>
            <a href="<?=site_url('account/real')?>" >
            <span class="white_color relative floatright none_tablet_and_mobile margin-left-10 padding-10 background_dark_grey button-amd real-account transition-5ms ">
            <? echo $this->sm->getword('OPEN REAL ACCOUNT',$this->lg)?></span>
            </a>
            <a href="<?=site_url('account/demo')?>" >
            <span class="white_color relative floatright none_tablet_and_mobile margin-left-10 padding-10 background_light_grey demo-account transition-5ms ">
            <? echo $this->sm->getword('TRY A DEMO',$this->lg)?></span>
            </a>
         </div> 
      </div>
   </div>*/?>
   <div class="full_width header_first_row">
		<div class="container">
			<div class="header_logo floatleft relative">
				<a href="<?=site_url('home')?>">
				<? if($this->lg == 'ar' || $this->lg== 'fa'){?>
				<img src="assets/images/sponsors-icm.jpg" class="sponsors_logo">
				<img src="assets/images/logo.png" class="margin-top-down-10">
				<? }else{ ?>
				<div class="logo-A">
					<div>
						<img src="assets/images/logo.png" class="margin-top-down-10 l-logo">
					</div>
					<div>
						<img src="assets/images/menu/top/investment_house.jpg" class="slogon-logo">
					</div>
				</div>
				<?/*<img src="assets/images/sponsors-icm.jpg" class="sponsors_logo">*/ ?>
				<div class="sponsors_logo">
					<div class="logo_container">
						
						<img src="assets/images/menu/top/fulham.png" class="fullham-logo">
						<div class="logo_separator"></div>
						<img src="assets/images/menu/top/polo.png" class="polo-logo">
						<div class="logo_separator"></div>
						<img src="assets/images/menu/top/cycling.png" class="cyclink-logo">
					</div>
				</div>
				<div class="sponsors_logo_mobile">
						<img src="assets/images/menu/top/sponsors_logo_mobile.jpg" class="sponsors_logo_mobile-logo">
				</div>
				<? } ?>
				</a>
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
					<span class="mobile-support floatright relative">
						<a href="tel:+442074425610">
						<span class="">
						<i class="fa fa-phone " ></i> 
						<font class="hide-mobile"  >+44 207 442 5610 </font>
						</span>
						</a>
					</span>
					<span class="email-support floatright relative">
						<a href="mailto:support@icm.com">
						<span class=" ">
						<i class="fa fa-envelope " ></i> 
						<font class="hide-mobile" >support@icm.com</font>
						</span>
						</a>
					</span>
					
				</div>
				
				<div class="header-row links-holder">
					<a href="<?=site_url('icm_access')?>">
					<span class="white_color relative floatright light_blue_bg pointer padding-10 margin-left-10  icm-access transition-5ms ">
					<? echo $this->sm->getword('ICM ACCESS',$this->lg)?></span>
					</a>
					<a href="<?=site_url('account/real')?>" >
					<span class="white_color relative floatright none_tablet_and_mobile margin-left-10 padding-10 background_dark_grey button-amd real-account transition-5ms padding-10-75">
					<? echo $this->sm->getword('CREATE A ACCOUNT ',$this->lg)?></span>
					</a>
					<? /*<a href="<?=site_url('account/real')?>" >
					<span class="white_color relative floatright none_tablet_and_mobile margin-left-10 padding-10 background_dark_grey button-amd real-account transition-5ms ">
					<? echo $this->sm->getword('OPEN REAL ACCOUNT',$this->lg)?></span>
					</a>
					<a href="<?=site_url('account/demo')?>" >
					<span class="white_color relative floatright none_tablet_and_mobile margin-left-10 padding-10 background_light_grey demo-account transition-5ms ">
					<? echo $this->sm->getword('TRY A DEMO',$this->lg)?></span>
					</a> */ ?>
				</div>
				
			 </div>
		</div>
   </div>
   <div class="full_width header_second_row">
      <div  class="header_container">
         <?php /*<div class="header_logo floatleft relative">
            <a href="<?=site_url('home')?>">
            <? if($this->lg == 'ar' || $this->lg== 'fa'){?>
            <img src="assets/images/sponsors-icm.jpg" class="sponsors_logo">
            <img src="assets/images/logo.png" class="margin-top-down-10">
            <? }else{ ?>
            <img src="assets/images/logo.png" class="margin-top-down-10">
            <img src="assets/images/sponsors-icm.jpg" class="sponsors_logo">
            <? } ?>
            </a>
            <div class="none_burger_menu burger_menu" onclick="slide_menu()"></div>
         </div>*/?>
         <div class="header_menu floatright relative">
            <ul class="full-width none_menu main_menu" <? if($this->lg == 'ar' || $this->lg == 'fa'){echo'style="direction:rtl;"';}?>>
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
					<a href="<?=site_url('icm_access')?>">
					<span class="white_color  none_tablet_and_mobile  padding-10 background_dark_grey button-amd real-account transition-5ms ">
					<? echo $this->sm->getword('CREATE A ACCOUNT',$this->lg)?></span>
					
					</a>
			   </li>
            </ul>
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
<script>
	function getACall_popup_choose_country(id,idd,iddd) {

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
function getACall_popup_showcountries(){

	$('.input-field_country').removeClass('input-field_error');
	$('.input-tooltip_country').fadeOut('fast');

	$('#show_countries').fadeIn(function(){
		drawCountryDropdownList('#show_countries');
	});

}

function getACall_popup_choose_country2(id,idd,iddd) {

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

function getACall_popup_showcountries2(){

	$('.input-field_country').removeClass('input-field_error');
	$('.input-tooltip_country').fadeOut('fast');

	$('#show_countries2').fadeIn(function(){
		drawCountryDropdownList('#show_countries2');
	});

}


	function drawCountryDropdownList($id){
		$($id).find('.select2-search__field').val("").trigger('keyup');

	}
	
	$(window).resize(function(){
		if($( window ).width() > 768){
			$('.call-button-block').click(function(){
					showpopup();
			});
		}else{
			hidepopup();
		}
		
	});
   $(document).ready(function(){
	   <? if ( $countrycode != '' ) { ?>
		$('#countyr-selected-<?=strtolower($countrycode)?>').trigger('click');
		$('#countyr-selected2-<?=strtolower($countrycode)?>').trigger('click');
		 <? } else { 
		 if ( $country != '' ) { ?>
		$('#countyr-selected-<?=strtolower($country)?>').trigger('click');
		$('#countyr-selected2-<?=strtolower($country)?>').trigger('click');
		 <? }} ?> 
		 
	   if($( window ).width() > 768){
			$('.call-button-block').click(function(){
					showpopup();
			});
		}else{
			hidepopup();
		}
	
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
	

   	// Get the header
   
   	//var header = $(".header_second_row");
   	var header = $("header");
   	var header2 = $(".header_first_row");
   
   	// Get the offset position of the navbar
   	var sticky = header.offset().top+90;
   	
   	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
   
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
	
	/*$('.language-global-menu').unbind().bind("click", function(t) {
		t.stopPropagation();
        t.preventDefault();
       
    });*/
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
		
	$('.language-global-menu').find('.langs li').each(function(){
		var li = $(this);
		li.click(function(){
			var link = li.find('a');
			var href = link.attr('href');
			location.replace(href);
		});
		
		
		
	});
   });

   
</script>
<? //echo strtotime(date('d-m-y h-m-i')) ?>