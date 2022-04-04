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

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['session'] = 'session/index';

$route['produtos'] = 'produto/index';

//*------------------------------------------*/
$route['dashboard'] = 'main/dashboard';
//*------------------------------------------*/

$route['register'] = 'Account/register';

$route['store'] = 'Account/store';

$route['logout'] = 'login/logout';

//$route['main'] = 'Account/main';

$route['save'] = 'Account/save';

$route['password'] = 'Account/password';

$route['changePassword/(:any)'] = 'Account/changePassword/$1';

/*------------------------------------------*/

$route['index'] = 'provider/provider';

$route['edit/(:any)'] = 'provider/edit/$1';

$route['conta/(:any)'] = 'conta_bancaria/show/$1';

$route['delete/(:any)'] = 'provider/delete/$1';

$route['update/(:any)'] = 'provider/update/$1';

$route['store'] = 'provider/store';

$route['create'] = 'provider/create';

/*------------------- PRODUTOS -----------------------*/

$route['index'] = 'produto/produtoss';

$route['edit/(:any)'] = 'produto/edit/$1';

$route['conta/(:any)'] = 'conta_bancaria/show/$1';

$route['delete/(:any)'] = 'produto/delete/$1';

$route['update/(:any)'] = 'produto/update/$1';

$route['store'] = 'produto/store';

$route['create'] = 'produto/create';

/*------------------- COLABORADORES -------------------*/

$route['colaboradores'] = 'colaborador/index';

$route['edit/(:any)'] = 'colaborador/edit/$1';

$route['conta/(:any)'] = 'conta_bancaria/show/$1';

$route['delete/(:any)'] = 'colaborador/delete/$1';

$route['update/(:any)'] = 'colaborador/update/$1';

$route['store'] = 'colaborador/store';

$route['create'] = 'colaborador/create';

/*------------------- Provider API Router ------------*/

$route['API'] = 'Rest_server';

// Fornecedores API Routes
$route['api:v1:fornecedor'] = 'Fornecedor/index';
$route['api:v1:fornecedor:register'] = 'Fornecedor/register';

// Produtos API Routes
#$route['api:v1:produtos'] = 'Produto/index';
#$route['api:v1:produtos:register'] = 'Produto/register';
$route['api:v1:produtos/deletar/(:num)']["DELETE"] = 'Produto/deletar';
$route['api:v1:produtos/update/(:num)']["PUT"] = 'Produto/update';

// Conta API Routes
$route['api:v1:conta'] = 'Conta/index';
$route['api:v1:conta:register'] = 'Conta/register';
$route['api:v1:conta:login'] = 'Conta/login';

$route['api:v1:conta/(:num)/delete']["DELETE"] = 'Conta/delete';

// Conta Bancária API Routes
$route['api:v1:conta-bancaria:register'] = 'Conta_bancaria/register';
