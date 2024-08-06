<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Movie::index');
$routes->post('search', 'Movie::search');
$routes->get('movie/(:num)', 'Movie::movie/$1');
$routes->get('person/(:num)', 'Movie::person/$1');

$routes->get('register', 'User::register');
$routes->post('register/process', 'User::register_process');
$routes->get('login', 'User::login');
$routes->post('login/process', 'User::login_process');
$routes->get('logout', 'User::logout');

$routes->get('favorite', 'Favorite::index');
$routes->post('favorite/add', 'Favorite::favButton');

$routes->get('/profile', 'User::profile');
$routes->post('/profile/update/', 'User::update');
