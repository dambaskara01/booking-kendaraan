<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');       // halaman pertama langsung ke login

$routes->get('/login', 'Auth::login');  // menampilkan form login
$routes->post('/login', 'Auth::loginProcess'); // memproses login

$routes->get('/logout', 'Auth::logout'); // logout user

$routes->get('/admin/dashboard', 'Dashboard::admin');
$routes->get('/approvals', 'Approval::index');

$routes->group('', ['filter' => 'auth'], static function($routes) {
    // admin
    $routes->get('/admin/bookings', 'Booking::index', ['filter' => 'auth:admin']);
    $routes->get('/admin/bookings/create', 'Booking::create', ['filter' => 'auth:admin']);
    $routes->post('/admin/bookings/store', 'Booking::store', ['filter' => 'auth:admin']);
    $routes->get('/admin/bookings/export', 'Booking::export', ['filter' => 'auth:admin']);

    // approver
    $routes->get('/approvals', 'Approval::index', ['filter' => 'auth:approver']);
    $routes->get('/approvals/approve/(:num)', 'Approval::approve/$1', ['filter' => 'auth:approver']);
    $routes->get('/approvals/reject/(:num)', 'Approval::reject/$1', ['filter' => 'auth:approver']);

    // dashboard
    $routes->get('/admin/dashboard', 'Dashboard::admin', ['filter' => 'auth:admin']);
});