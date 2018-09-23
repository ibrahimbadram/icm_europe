<?
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
				case "continent":
                    $output = @$ipdat->geoplugin_continent;
                    break;
				case "continent_code":
                    $output = @$ipdat->geoplugin_continent_code;
                    break;
            }
        }
    }
    


function getClientIP(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$ipaddress = getClientIP();

function ip_details($ip) {
  $json = get_url_contents("http://ipinfo.io/{$ip}/geo");
 // echo $json;
  $details = json_decode($json, true);
//print_r($details);
  return $details;
}

$details = ip_details($ipaddress);
//print_r($details);
//exit;

if ( isset($output['continent_code'])) {
if ( strtoupper ($output['continent_code']) == 'EU') {
 //redirect('http://www.icmcapital.co.uk');   
}
}
if ( isset($output['continent'])) {
if ( strtoupper ($output['continent']) == 'EUROPE') {
// redirect('http://www.icmcapital.co.uk');   
}
}
if ( isset($output['countrycode'])) {
$countrycode = strtoupper ($output['countrycode']);
} else if ( isset($details['countrycode'])) {
$countrycode = strtoupper ($details['countrycode']);
}
if ( isset($countrycode) ) {
if ( $countrycode == 'UK') {
//redirect('http://www.icmcapital.co.uk');    
}
}
if ( isset($output['country'])) {
if ( $output['country'] == 'United Kingdom' ) {	
//redirect('http://www.icmcapital.co.uk');  
}
}
if ( isset($countrycode) ) {
if ( $countrycode == 'AR' || $countrycode == 'BO' || $countrycode == 'CL' || $countrycode == 'CR' || $countrycode == 'CO' || $countrycode == 'CU' || $countrycode == 'EC' || $countrycode == 'SV' || $countrycode == 'ES' || $countrycode == 'GT' || $countrycode == 'GQ' || $countrycode == 'CR' || $countrycode == 'HN' || $countrycode == 'MX' || $countrycode == 'NI' || $countrycode == 'PA' || $countrycode == 'PY' || $countrycode == 'PE' || $countrycode == 'DO' || $countrycode == 'UY' || $countrycode == 'VE'   ) {
if ( $this->lang->lang() ==  'es' ) {
} else {
redirect(base_url().'es');
}
}
}
?>
<!doctype html>
<html>
<head>
<title><?php echo $this->template->title->default("ICM"); ?> | <? if ( isset($output['country'])) echo $output['country'].' | '; ?> <? if ( isset($output['countrycode'])) echo $output['countrycode'].' | '; ?> <? if ( isset($output['continent'])) echo $output['continent'].' | '; ?> <? if ( isset($output['continent_code'])) echo $output['continent_code'].' | '; ?> <? if ( isset($details['country'])) echo $details['country']; ?></title>
<!--<title><?php echo $this->template->title->default("ICM"); ?></title>-->

<base href="<?=base_url()?>" >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $this->template->description; ?>">
<meta name="author" content="">
<link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<?php echo $this->template->meta; ?>
<?php echo $this->template->stylesheet; ?>
<script src="//code.jquery.com/jquery-latest.min.js"></script>
</head>
<body class="cbp-spmenu-push">
<input type="hidden" id="siteurl" value="<?=site_url()?>" >
<input type="hidden" id="baseurl" value="<?=base_url()?>" >
<div id="maincontainer" >
<?php 
// This is an example to show that you can load stuff from inside the template file
echo $this->template->widget("navigation",$output);
?><div id="content">
<?php
// This is the main content partial
echo $this->template->content;
?></div>
<?php 
// Show the footer partial, and prepend copyright message
echo $this->template->widget("footer");
?>

<?php echo $this->template->javascript; ?>
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5YevlfmAPGeQDZfMMcQo9TxCZn4GqmkC";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
  
</div>
</body>
</html>