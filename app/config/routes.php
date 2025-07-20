<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'welcome';
/*$route['default_controller'] = 'testcontroller';
$route['enviar'] = 'testcontroller/send';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;*/

$route['default_controller'] = 'homecontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['login'] = 'authcontroller/index';

//$route['logon'] = 'authcontroller/login';

//$route['logout'] = 'homecontroller/logout';

/**AppController - Estudiantes - Docentes */
//$route['users'] = 'appcontroller/view_cards';
//$route['users'] = 'appcontroller/searchBookCards';
$route['users'] = 'appcontroller/index';
$route['users/index'] = 'appcontroller/index';

$route['users/encuesta'] = 'appcontroller/view_encuesta';

$route['users/perfil'] = 'appcontroller/viewPerfil';
$route['users/credenciales'] = 'appcontroller/viewCredenciales';

$route['users/view/(:num)'] = 'appcontroller/viewpdf/$1';

$route['users/addview']['post'] = 'appcontroller/addViewEbook';


/**AdminController - Administrador */
$route['admin'] = 'admincontroller/index';
$route['admin/index'] = 'admincontroller/index';

$route['admin/users'] = 'admincontroller/verEstudiantes';
$route['admin/newegresado'] = 'admincontroller/nuevoEstudiante';
$route['admin/egresado/(:num)'] = 'admincontroller/editaEstudiante/$1';

$route['admin/enviaPassword'] = 'admincontroller/enviaPassword';
$route['admin/activaUsuario'] = 'admincontroller/activaEstudiante';
$route['admin/desactivaUsuario'] = 'admincontroller/desactivaEstudiante';

$route['admin/programas'] = 'admincontroller/verProgramas';
$route['admin/newprograma'] = 'admincontroller/nuevoPrograma';
$route['admin/programa/(:num)'] = 'admincontroller/editaPrograma/$1';

$route['admin/custom'] = 'admincontroller/personalizar';
$route['admin/infosistema'] = 'admincontroller/infosistema';
$route['admin/soporte'] = 'admincontroller/soporte';

$route['admin/perfil'] = 'admincontroller/viewPerfil';
$route['admin/claves'] = 'admincontroller/viewClave';

$route['admin/info'] = 'admincontroller/viewClientInfo';

$route['admin/encuestas'] = 'admincontroller/view_encuestas';

$route['admin/enviaEncuesta'] = 'admin/envia_encuesta';

//Acceso
$route['login'] = 'homecontroller/login';

$route['auth'] = 'homecontroller/auth';

$route['logout'] = 'homecontroller/logout';
