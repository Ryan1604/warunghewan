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
$route['default_controller'] = 'HomeController';

$route['auth'] = 'Auth';

// ------------------------------------------------------------------------
// Admin
// ------------------------------------------------------------------------
$route['admin/dashboard']                                   = 'Admin/DashboardController';

$route['admin/customer']                                    = 'Admin/CustomerController';

$route['admin/category']                                    = 'Admin/CategoryController';
$route['admin/category/create']                             = 'Admin/CategoryController/create';
$route['admin/category/store']                              = 'Admin/CategoryController/store';
$route['admin/category/edit/(:any)']                        = 'Admin/CategoryController/edit/$1';
$route['admin/category/update']                             = 'Admin/CategoryController/update';
$route['admin/category/delete/(:any)']                      = 'Admin/CategoryController/delete/$1';

$route['admin/satuan']                                      = 'Admin/SatuanController';
$route['admin/satuan/create']                               = 'Admin/SatuanController/create';
$route['admin/satuan/store']                                = 'Admin/SatuanController/store';
$route['admin/satuan/edit/(:any)']                          = 'Admin/SatuanController/edit/$1';
$route['admin/satuan/update']                               = 'Admin/SatuanController/update';
$route['admin/satuan/delete/(:any)']                        = 'Admin/SatuanController/delete/$1';

$route['admin/produk']                                      = 'Admin/ProdukController';
$route['admin/produk/create']                               = 'Admin/ProdukController/create';
$route['admin/produk/store']                                = 'Admin/ProdukController/store';
$route['admin/produk/edit/(:any)']                          = 'Admin/ProdukController/edit/$1';
$route['admin/produk/update']                               = 'Admin/ProdukController/update';
$route['admin/produk/delete/(:any)']                        = 'Admin/ProdukController/delete/$1';
$route['admin/produk/search']                               = 'Admin/ProdukController/search';
$route['produk/(:any)']                                     = 'Admin/ProdukController/detail/$1';

$route['admin/transaksi']                                   = 'Admin/TransaksiController';
$route['admin/transaksi/detail/(:any)']                     = 'Admin/TransaksiController/detail/$1';
$route['admin/transaksi/gagal/(:any)']                      = 'Admin/TransaksiController/gagal/$1';
$route['admin/transaksi/confirm/(:any)']                    = 'Admin/TransaksiController/confirm/$1';

$route['admin/laporan']                                     = 'Admin/LaporanController';

// ------------------------------------------------------------------------
// Landing Page
// ------------------------------------------------------------------------
$route['/']                                                 = 'HomeController';

$route['login']                                             = 'LoginController';
$route['register']                                          = 'LoginController/register';
$route['logout']                                            = 'LoginController/logout';

$route['add_cart/(:any)']                                   = 'CartController/add_cart/$1';
$route['delete_cart/(:any)']                                = 'CartController/delete_cart/$1';
$route['update_cart']                                       = 'CartController/update_cart';
$route['checkout']                                          = 'CartController/checkout';
$route['cart']                                              = 'CartController/cart';
$route['konfirmasi']                                        = 'CartController/konfirmasi';

// ------------------------------------------------------------------------
// User
// ------------------------------------------------------------------------
$route['user/transaksi']                                    = 'User/DashboardController';
$route['user/transaksi/detail/(:any)']                      = 'User/TransaksiController/detail/$1';


$route['profile/edit']                                      = 'ProfileController/edit';
$route['profile/update']                                    = 'ProfileController/update';
$route['profile/changepassword']                            = 'ProfileController/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
