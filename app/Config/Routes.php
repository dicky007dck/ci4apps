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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/home(:any)', 'Home::index');
$routes->get('/pages', 'Pages::index');
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');
$routes->get('/assets/contact', 'Pages::contact');
$routes->get('suratmasuk', 'suratmasuk::index');
$routes->get('/assets/suratmasuk', 'suratmasuk::index');
$routes->get('suratkeluar', 'suratkeluar::index');
$routes->get('/assets/suratkeluar', 'suratkeluar::index');
$routes->get('/suratkeluar/create', 'suratkeluar::create');
$routes->get('export', 'suratkeluar::printexcel');
$routes->get('exports', 'suratmasuk::printexcel');
$routes->get('/exportdis/(:segment)', 'suratmasuk::printexceldis/$1');
$routes->get('printpdf', 'suratkeluar::printpdf');
$routes->get('printpdfs', 'suratmasuk::printpdfs');
$routes->get('/printpdfdis/(:segment)', 'suratmasuk::printpdfdis/$1');
$routes->post('/suratkeluar/save', 'suratkeluar::save');
$routes->get('/suratkeluar/edit/(:num)', 'suratkeluar::edit/$1');
$routes->post('/suratkeluar/update/(:num)', 'suratkeluar::update/$1');
$routes->delete('/suratkeluar/(:num)', 'suratkeluar::delete/$1');
$routes->get('/suratkeluar/(:segment)', 'suratkeluar::index/$1');
$routes->get('/suratmasuk/create', 'suratmasuk::create');
$routes->post('/suratmasuk/save', 'suratmasuk::save');
$routes->get('/suratmasuk/edit/(:num)', 'suratmasuk::edit/$1');
$routes->post('/suratmasuk/update/(:num)', 'suratmasuk::update/$1');
$routes->delete('/suratmasuk/(:num)', 'suratmasuk::delete/$1');
$routes->get('/suratmasuk/(:segment)', 'suratmasuk::index/$1');
$routes->get('/suratmasuk/disposisi/(:segment)', 'suratmasuk::disposisi/$1');
// $routes->get('/disposisi/inputdisposisi', 'suratmasuk::inputdisposisi');
$routes->get('/disposisi/editdisposisi/(:num)', 'suratmasuk::editdisposisi/$1');
$routes->post('/disposisi/save', 'suratmasuk::savedisposisi');
$routes->post('/disposisi/updatedisp/(:segment)', 'suratmasuk::updatedisp/$1');
$routes->delete('/disposisi/hapus(:num)', 'suratmasuk::deletedisposisi/$1');
$routes->get('/disposisi/(:num)', 'suratmasuk::disposisi/$1');

$routes->get('/disposisi/inputdisposisi/(:num)', 'suratmasuk::tampil/$1');







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
