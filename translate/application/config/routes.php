<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['admin'] = "admin";
$route['404_override'] = '';
require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->get( 'tbl_languages' );
$result = $query->result_array();
//print_r($result);
//exit;
foreach( $result as $row )
{
	$route[$row['prefix'].'/home/send_newsletter'] = 'home/send_newsletter';
	$route[$row['prefix'].'/about_us/send_regulations'] = 'about_us/validateSteps';
	$route[$row['prefix'].'/accounts/(:any)'] = 'accounts/index/$1';
	$route[$row['prefix'].'/products/(:any)'] = 'products/index/$1';
	$route[$row['prefix'].'/partners/(:any)'] = 'partners/index/$1';
	$route[$row['prefix'].'/academy/(:any)'] = 'academy/index/$1';
	$route[$row['prefix'].'/account/(:any)'] = 'account/index/$1';
	$route[$row['prefix'].'/promos/(:any)'] = 'promos/index/$1';
	$route[$row['prefix'].'/about_us/(:any)'] = 'about_us/index/$1';
	$route[$row['prefix'].'/platforms/(:any)'] = 'platforms/index/$1';
	$route[$row['prefix'].'/resources/(:any)'] = 'resources/index/$1';
	$route[$row['prefix'].'/pages/(:any)'] = 'pages/index/$1';
	$route[$row['prefix'].'/sponsorships/(:any)'] = 'sponsorships/index/$1';
	$route[$row['prefix'].'/news/details/(:any)'] = 'about_us/getNewsDetails/$1';
	$route[$row['prefix'].'/market-news/details/(:any)'] = 'resources/getMarketNewsDetails/$1';
	$route[$row['prefix'].'/landing_pages/2018/(:any)'] = 'landing_pages/index/$1';
	$route[$row['prefix'].'/market_news/(:any)'] = 'market_news/index/$1';
	$route[$row['prefix'].'/user_form/(:any)'] = 'user_form/index/$1';
	$route[$row['prefix'].'/company_news/(:any)'] = 'company_news/index/$1';
}
$route['^en/(.+)$'] = "$1";
$route['^en$'] = $route['default_controller'];
$route['^ar/(.+)$'] = "$1";
$route['^ar$'] = $route['default_controller'];
$route['^fa/(.+)$'] = "$1";
$route['^fa$'] = $route['default_controller'];
$route['^es/(.+)$'] = "$1";
$route['^es$'] = $route['default_controller'];
$route['^ru/(.+)$'] = "$1";
$route['^ru$'] = $route['default_controller'];
$route['^zh/(.+)$'] = "$1";
$route['^zh$'] = $route['default_controller'];
$route['^pl/(.+)$'] = "$1";
$route['^pl$'] = $route['default_controller'];
//if the backend is multiple languages
$route['en/admin'] = $route['admin'];


/* End of file routes.php */
/* Location: ./application/config/routes.php */