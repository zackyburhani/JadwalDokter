<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'ControllerList';
$route['404_override'] = 'ControllerLogin/not_found';
$route['translate_uri_dashes'] = FALSE;

//login
$route['login'] = 'ControllerLogin';
$route['login/auth'] = 'ControllerLogin/login';
$route['login/logout'] = 'ControllerLogin/logout';

//poli
$route['poli'] = 'ControllerPoli';
$route['poli/simpan'] = 'ControllerPoli/simpan';
$route['poli/ubah'] = 'ControllerPoli/ubah';
$route['poli/hapus/(:any)'] = 'ControllerPoli/hapus/$1';

//dokter
$route['dokter'] = 'ControllerDokter';
$route['dokter/simpan'] = 'ControllerDokter/simpan';
$route['dokter/ubah'] = 'ControllerDokter/ubah';
$route['dokter/hapus/(:any)'] = 'ControllerDokter/hapus/$1';

//jadwal
$route['jadwal'] = 'ControllerJadwal';
$route['jadwal/simpan'] = 'ControllerJadwal/simpan';
$route['jadwal/hapus/(:any)'] = 'ControllerJadwal/hapus/$1';
$route['jadwal/ubah/(:any)'] = 'ControllerJadwal/ubah/$1';

//absensi
$route['absensi'] = 'ControllerAbsensi';
$route['absensi/simpan'] = 'ControllerAbsensi/simpan';
$route['absensi/hapus/(:any)'] = 'ControllerAbsensi/hapus/$1';
$route['absensi/ubah/(:any)'] = 'ControllerAbsensi/ubah/$1';
$route['absensi/kehadiran'] = 'ControllerAbsensi/status_hadir';

//user
$route['user'] = 'ControllerUser';
$route['ubah/ubah'] = 'ControllerUser/ubah';

//list
$route['list/kehadiran'] = 'ControllerList/kehadiran';


