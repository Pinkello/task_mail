<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->set404Override(function () {
    return view('templates/404');
});

$routes->get('lang/{locale}', 'Language::index');
$routes->get('/startingPage', 'Starting::index');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->post('/home/sendEmail', 'Home::sendEmail');
    $routes->get('/logout', 'Login::logout');
});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('/login', 'Login::index');
    $routes->post('/login/check', 'Login::check');
});
