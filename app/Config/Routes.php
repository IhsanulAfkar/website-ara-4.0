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
$routes->set404Override(function () {
    $data['title'] = '404 :(';
    return view('error404', $data);
});
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/olimpiade', 'Home::olimpiade');
// $routes->get('/hmit', 'Home::about_hmit');
$routes->get('/ara', 'Home::about_ara');
$routes->get('/ctf', 'Home::ctf');
$routes->get('/exploit', 'Home::exploit');
$routes->get('/auth/login', 'Home::login');

$routes->add('/home/coba', 'Home::coba');

$routes->get('/register/olimpiade', 'Home::registerOlimpiade');
$routes->get('/register/ctf', 'Home::registerCtf');
$routes->post('/verify-regis-olim', 'VerifyRegistrasi::verify_regis_olim');
$routes->post('/verify-regis-ctf', 'VerifyRegistrasi::verify_regis_ctf');

// 
$routes->get('/register/exploit', 'Home::registerExploit');
$routes->post('/verify-regis-exploit', 'VerifyRegistrasi::verify_regis_exploit');
// 
$routes->match(['get', 'post'], '/verify/login', 'VerifyLogin::login', ["filter" => "noauth"]);
$routes->get('/verify/logout', 'VerifyLogin::logout');

$routes->get('/verify_kupon/(:any)', 'Api::verify_kupon/$1');
$routes->get('/dashboard/admin-ctf/konfirmasi-team', 'dashboard\AdminCTF::konfirmasi_team');
$routes->get('/dashboard/admin-ctf/list-team', 'dashboard\AdminCTF::confirmed_team');
$routes->get('/dashboard/admin-olim/konfirmasi-team', 'dashboard\AdminOlim::konfirmasi_team');
$routes->get('/dashboard/admin-olim/list-team', 'dashboard\AdminOlim::confirmed_team');
//route for verify_konfirmasi_team
$routes->get('/dashboard/admin-olim/verify-konfirmasi-team/(:any)/(:any)', 'dashboard\AdminOlim::verify_konfirmasi_team/$1/$2');
$routes->get('/dashboard/admin-ctf/verify-konfirmasi-team/(:any)/(:any)', 'dashboard\AdminCTF::verify_konfirmasi_team/$1/$2');

$routes->group("dashboard", ["filter" => "auth"], function ($routes) {
    $routes->group("admin-olim", ["filter" => "auth"], function ($routes) {
        $routes->get('konfirmasi-team', 'dashboard\AdminOlim::konfirmasi_team');
        $routes->get('list-team', 'dashboard\AdminOlim::confirmed_team');
        $routes->get('verify-konfirmasi-team/(:any)/(:any)', 'dashboard\AdminOlim::verify_konfirmasi_team/$1/$2');
    });
    $routes->group("admin-exploit", ["filter" => "auth"], function ($routes) {
        // Not finished yet
        $routes->get("konfirmasi-team", 'dashboard/AdminExploit::konfirmasi_team');
    });
    $routes->get('olimpiade', 'dashboard\User::olim');
});
$routes->group("dashboard", ["filter" => "auth"], function ($routes) {
    $routes->group("admin-ctf", ["filter" => "auth"], function ($routes) {
        $routes->get('konfirmasi-team', 'dashboard\AdminCTF::konfirmasi_team');
        $routes->get('list-team', 'dashboard\AdminCTF::confirmed_team');
        $routes->get('verify-konfirmasi-team/(:any)/(:any)', 'dashboard\AdminCTF::verify_konfirmasi_team/$1/$2');
    });
    $routes->get('ctf', 'dashboard\User::ctf');
});
//route for verify_konfirmasi_team

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
