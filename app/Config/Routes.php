<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('login', 'Home::authenticate'); // Route to handle the login form submission
$routes->get('logout', 'Home::logout');

// untuk user siswa
$routes->get('/user', 'UserController::index' , ['filter' => 'auth']);
$routes->get('/user/profile', 'UserController::profile');
$routes->get('/user/konseling', 'UserController::konseling');

// untuk user admin
$routes->get('/admin', 'AdminController::index', ['filter' => 'auth']);
$routes->get('/admin/profile', 'AdminController::profile');
$routes->get('/admin/konseling', 'AdminController::konseling');
$routes->get('/admin/dataRules', 'AdminController::dataRules');
$routes->get('/admin/dataUser', 'AdminController::dataUser');
$routes->post('createUser', 'AdminController::createUser');
