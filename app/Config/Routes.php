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

$routes->group('principal', static function ($routes) {
    $routes->get('index', 'Principal::index');
    $routes->get('/', 'Principal::index');
    $routes->get('createRequest', 'Principal::createRequest');
    $routes->get('edit/(:num)', 'Principal::edit/$1');
    $routes->get('submitrequest/(:num)', 'Principal::submitRequest/$1');
    $routes->get('submitted', 'Request::submitted');
    $routes->get('test', 'Principal::test');
    $routes->get('questionnaire/index', 'Questionnaire::index');
});

$routes->group('questionnaire', static function ($routes) {
    $routes->get('index', 'Questionnaire::index');
    $routes->get('edit/(:num)', 'Questionnaire::edit/$1');
    $routes->post('update/(:num)', 'Questionnaire::update/$1');
    $routes->get('/','Questionnaire::index');
    $routes->post('save', 'Questionnaire::save');
});

$routes->group('request', static function ($routes) {
    $routes->get('index', 'Request::index');
    $routes->get('add', 'Request::add');
    $routes->get('edit/(:num)', 'Request::edit/$1');
    $routes->post('update/(:num)', 'Request::update/$1');
    $routes->post('create', 'Request::create');
    $routes->get('list/(:num)', 'Request::list/$1');
    $routes->get('show/(:num)', 'Request::show/$1');
    $routes->get('submitted', 'Request::submitted');
});

$routes->group('director', static function ($routes) {
    $routes->get('index', 'Director::index');
    $routes->get('show/(:num)', 'Director::show/$1');
    $routes->get('delSignOff/(:num)', 'Director::delSignOff/$1');
    $routes->get('principalQuestionResponses/(:num)', 'Questionnaire::getQuestionResponsesByPrincipalRequestId/$1');
    $routes->get('schoolsListByDirectorate', 'Director::getSchoolsListByDirectorate');
    $routes->post('processrequest/(:num)', 'Director::processRequest/$1');
});

$routes->group('corporate', static function ($routes) {
    $routes->get('index', 'Corporate::index');
    $routes->get('show/(:num)', 'Corporate::show/$1');
    $routes->get('requestList/(:num)', 'Corporate::requestList/$1');
});

$routes->get('/schoolsinfo', 'SchoolsInformation::index');

// miscellaneous routes
$routes->get('/data/importcsv', 'Data::importSchoolsInformationFromCSV');
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
