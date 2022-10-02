<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');

$routes->get('/principal/index', 'Principal::index');
$routes->get('/principal/createRequest', 'Principal::createRequest');
$routes->get('/principal/edit/(:num)', 'Principal::edit/$1');
$routes->get('/principal/submitrequest/(:num)', 'Principal::submitRequest/$1');
$routes->get('/principal/submitted', 'Request::submitted');

$routes->get('/principal/test', 'Principal::test');

$routes->get('/principal/questionnaire/index', 'Questionnaire::index');

$routes->get('/questionnaire/index', 'Questionnaire::index');
$routes->get('/questionnaire/edit/(:num)', 'Questionnaire::edit/$1');
$routes->post('/questionnaire/update/(:num)', 'Questionnaire::update/$1');
$routes->get('/questionnaire','Questionnaire::index');
$routes->post('/questionnaire/save', 'Questionnaire::save');

$routes->get('/request/index', 'Request::index');
$routes->get('/request/add', 'Request::add');
$routes->get('/request/edit/(:num)', 'Request::edit/$1');
$routes->post('/request/update/(:num)', 'Request::update/$1');
$routes->post('/request/create', 'Request::create');
$routes->get('/request/list/(:num)', 'Request::list/$1');
$routes->get('/request/show/(:num)', 'Request::show/$1');

$routes->get('/request/submitted', 'Request::submitted');

$routes->get('/corporate', 'Corporate::index');
$routes->get('/corporate/index', 'Corporate::index');
$routes->get('/corporate/show/(:num)', 'Corporate::show/$1');

$routes->get('/director', 'Director::index');
$routes->get('/director/index', 'Director::index');
$routes->get('/director/show/(:num)', 'Director::show/$1');
$routes->post('/director/processrequest/(:num)', 'Director::processRequest/$1');

$routes->get('/data/importcsv', 'Data::importcsv');
$routes->get('/timestamp', 'Migrate::timestamp');
$routes->get('/migrate', 'Migrate::index');
$routes->get('/seed', 'Seed::index');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
