<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// untuk user siswa
$routes->get('/user', 'UserController::index');
$routes->get('/user/profile', 'UserController::profile');
$routes->get('/user/konseling', 'UserController::konseling');

// untuk user admin
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/profile', 'AdminController::profile');
$routes->get('/admin/konseling', 'AdminController::konseling');
$routes->get('/admin/dataRules', 'AdminController::dataRules');
$routes->get('/admin/dataUser', 'AdminController::dataUser');
