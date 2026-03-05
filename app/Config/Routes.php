<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');       // halaman pertama langsung ke login

$routes->get('/login', 'Auth::login');  // menampilkan form login
$routes->post('/login', 'Auth::loginProcess'); // memproses login

$routes->get('/logout', 'Auth::logout'); // logout user