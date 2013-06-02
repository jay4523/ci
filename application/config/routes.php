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

$route['auth'] = 'auth';
$route['auth/(:any)'] = 'auth/$1';
$route['posts/view/(:any)'] = 'posts/view/$1';
$route['posts/get_new'] = 'posts/get_new';
$route['posts'] = 'posts';
$route['profile/view/(:any)'] = 'profile/view/$1';
$route['profile/edit'] = 'profile/edit';
$route['profile/list'] = 'profile/list_profiles';
$route['profile/update'] = 'profile/update';
$route['profile'] = 'profile/list_profiles';
$route['comments/(:any)'] = 'comments/$1';
$route['(:any)'] = 'posts';
$route['default_controller'] = 'posts';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */