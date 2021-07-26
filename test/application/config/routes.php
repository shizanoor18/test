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
/////////////// ADMIN PAGES ////////////////
	$route['default_controller'] = 'front';
	$route['admin/login/submit_login'] = "login/submit_login";
	$route['admin'] = "login";
	$route['admin/logout'] = "login/logout";
	$route['admin/(.+)'] = "$1/$1";

	$folder="front/";
	$route['login']=$folder.'login';
	$route['register']=$folder.'register';
	

	$route['login_form']=$folder.'login_form';
	$route['register_form']=$folder.'registration_form';

	$route['about-us']=$folder.'about_us';
	$route['index']=$folder.'index_1';
	$route['index-2']=$folder.'index_2';
	$route['index-3']=$folder.'index_3';
	$route['index-4']=$folder.'index_4';
	$route['portfolio-grid-full']=$folder.'portfolio_grid_full';
	$route['docly_1']=$folder.'docly_1';
	$route['index-7']=$folder.'index_7';

	$strHost = $_SERVER['SERVER_NAME'];
	$strHost = preg_replace('/www./', '', $strHost, 1);
	$route['([a-zA-Z-]+)'] = $folder."page/$1";
	$route['404_override'] = '';
	

	
