<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'AuthController::home');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/profile', 'AuthController::profile', ['filter' => 'auth']);
$routes->post('/auth/update_profile', 'AuthController::update_profile');



$routes->post('/register', 'AuthController::process_register');
$routes->post('/login', 'AuthController::process_login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'TaskController::dashboard', ['filter' => 'auth']);
$routes->get('/newtask', 'TaskController::newtask', ['filter' => 'auth']);

$routes->post('/process_newtask', 'TaskController::process_newtask');
$routes->get('/update/(:num)', 'TaskController::update/$1');
$routes->post('/process_update/(:num)', 'TaskController::process_update/$1');
$routes->get('/delete/(:num)', 'TaskController::delete/$1');

// Admin Router
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('users', 'AdminController::listUsers');
    $routes->get('edit_user/(:num)', 'AdminController::editUser/$1');
    $routes->post('update_user/(:num)', 'AdminController::updateUser/$1');
    $routes->get('delete_user/(:num)', 'AdminController::deleteUser/$1');
});
