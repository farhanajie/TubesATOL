<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('register', 'User::register');
$routes->post('register/process', 'User::register_process');
$routes->get('login', 'User::login');
$routes->post('login/process', 'User::login_process');