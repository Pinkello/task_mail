<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('lang/{locale}', 'Language::index');
$routes->get('/startingPage', 'Starting::index');
$routes->post('/home/sendEmail', 'Home::sendEmail');

$routes->get('/login', 'Login::index');
$routes->post('/login/check', 'Login::check');
$routes->get('/logout', 'Login::logout');
