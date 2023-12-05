<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('lang/{locale}', 'Language::index');
$routes->get('/login', 'Login::index');
$routes->post('/home/sendEmail', 'Home::sendEmail');
