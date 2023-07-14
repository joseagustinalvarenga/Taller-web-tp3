<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('mostrar_login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::mostrar_login');
$routes->match(['get','post'],'verificaremail', 'User::verificaremail');
$routes->match(['get','post'],'insert', 'User::insert');
$routes->match(['get','post'],'update', 'User::update');
$routes->match(['get','post'],'obtener_datos_usuario', 'User::obtener_datos_usuario');
$routes->match(['get','post'],'iniciar_sesion', 'User::iniciar_sesion');
$routes->match(['get','post'],'guardar_categoria','HomePage::guardar_categoria');
$routes->get('User/validar_cuenta/(:any)', 'User::validar_cuenta/$1');
$routes->get('trakt', 'TraktController::index');
$routes->get('trakt/verComentarios/(:any)', 'TraktController::verComentarios/$1');
$routes->post('/buscar-pelicula', 'TraktController::buscarPelicula');
$routes->post('guardarPelicula/(:segment)', 'TraktController::guardarPelicula/$1');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
