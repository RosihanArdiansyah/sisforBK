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
$routes->get('/admin/dataGuru', 'AdminController::dataGuru');

// user CRUD
$routes->post('createUser', 'AdminController::createUser');
$routes->post('updateUser', 'AdminController::updateUser');
$routes->get('/admin/dataUser/(:num)', 'AdminController::show/$1');
$routes->delete('deleteUser/(:num)', 'AdminController::deleteUser/$1');

// jadwal CRUD
$routes->post('createJadwal', 'AdminController::createJadwal');
$routes->post('updateJadwal', 'AdminController::updateJadwal');
$routes->post('userCreateJadwal', 'UserController::createJadwal');
$routes->post('userUpdateJadwal', 'UserController::updateJadwal');
$routes->get('showJadwal(:num)', 'AdminController::showJadwal/$1');
$routes->get('printJadwal/(:num)', 'AdminController::printJadwal/$1');
$routes->delete('deleteJadwal/(:num)', 'AdminController::deleteJadwal/$1');

// rule CRUD
$routes->post('createRule', 'AdminController::createRule');
$routes->post('updateRule', 'AdminController::updateRule');
$routes->post('createReport', 'AdminController::createReport');
$routes->get('showReport(:num)', 'AdminController::showReport/$1');
$routes->get('showRule(:num)', 'AdminController::showRule/$1');
$routes->delete('deleteRule/(:num)', 'AdminController::deleteRule/$1');
