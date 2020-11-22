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
$route['default_controller'] = 'C_Login';
$route['user-add'] = 'C_User/add';
$route['user-setting'] = 'C_User/setting';
$route['user'] = 'C_User';
$route['user-edit/(:any)'] = 'C_User/edit/$1';
$route['user-view/(:any)'] = 'C_User/view/$1';
$route['user-konfirm/(:any)'] = 'C_User/konfirmasi/$1';
$route['user-nonaktif/(:any)'] = 'C_User/nonaktif/$1';
$route['user-aktif/(:any)'] = 'C_User/aktif/$1';
$route['user-resign/(:any)'] = 'C_User/resign/$1';
$route['user-karyatulis'] = 'C_User/karyatulis';
$route['user-sort/(:any)'] = 'C_User/sort/$1';
$route['user-send/(:any)'] = 'C_User/send/$1';

$route['view-karyatulis'] = 'C_User/viewkaryatulis';
$route['edit-karyatulis/(:any)/(:any)'] = 'C_User/editkt/$1/$2';



$route['Korwil'] = 'C_Korwil';
$route['korwil-add'] = 'C_Korwil/add';
$route['korwil-view/(:any)'] = 'C_Korwil/view/$1';
$route['korwil-edit/(:any)'] = 'C_Korwil/edit/$1';
$route['korwil-p/(:any)'] = 'C_Korwil/pengurus/$1';
$route['korwil-pe/(:any)'] = 'C_Korwil/penguruse/$1';
$route['korwil-ph/(:any)/(:any)'] = 'C_Korwil/pengurush/$1/$2';


$route['pengurus'] = 'C_Pengurus';
$route['pengurus-add'] = 'C_Pengurus/add';
$route['pengurus-view/(:any)'] = 'C_Pengurus/view/$1';
$route['pengurus-edit/(:any)'] = 'C_Pengurus/edit/$1';


$route['laporan-anggota'] = 'C_User/laporan';
$route['laporan-korwil'] = 'C_Korwil/laporan';


$route['login'] = 'C_Login';
$route['login-1'] = 'C_Login/login/0';
$route['qrcode'] = 'C_Login/qrcode';
$route['hasilqr'] = 'C_Login/hasilcek';


$route['registrasi'] = 'C_User/registrasi';
$route['daftarulang'] = 'C_User/daftarulang';
$route['daftarulang-cek/(:any)'] = 'C_User/daftarulangcek/$1';


$route['cekanggota'] = 'C_Login/cekanggota';
$route['setting'] = 'C_Setting/setting';
$route['mutasi'] = 'C_Mutasi';
$route['setting-status/(:any)'] = 'C_Setting/statusanggota/$1';


$route['informasi'] = 'C_Informasi';
$route['informasi-add'] = 'C_Informasi/add';
$route['informasi-edit/(:any)'] = 'C_Informasi/edit/$1';
$route['informasi-view/(:any)'] = 'C_Informasi/view/$1';

$route['mutasi-add'] = 'C_Mutasi/add';


$route['Profil'] = 'C_Profil';

$route['cetak'] = 'C_KTA';
$route['cetak-kta/(:any)'] = 'C_KTA/kta/$1';
$route['cetak-sort/(:any)'] = 'C_KTA/sort/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
