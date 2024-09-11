<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'AuthController::home');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/profile', 'AuthController::profile', ['filter' => 'auth']);



$routes->post('/register', 'AuthController::process_register');
$routes->post('/login', 'AuthController::process_login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'TaskController::dashboard', ['filter' => 'auth']);
$routes->get('/newtask', 'TaskController::newtask', ['filter' => 'auth']);

$routes->post('/process_newtask', 'TaskController::process_newtask');
$routes->get('/update/(:num)', 'TaskController::update/$1');
$routes->post('/process_update/(:num)', 'TaskController::process_update/$1');
