<?php

namespace Config;

use App\Controllers\Home;
use App\Controllers\Producto;
use App\Controllers\Usuario;

// Cargar las rutas generales
$routes = Services::routes();

// Ruta para la página principal (Home)
$routes->get('/', 'Home::index');

// Ruta para ver el detalle de un producto
$routes->get('producto/detalle/(:num)', 'Producto::detalle/$1');

// Rutas para registro y login de usuario
$routes->get('usuario/registro', 'Usuario::registro');
$routes->get('usuario/login', 'Usuario::login');
$routes->post('usuario/registro', 'Usuario::registro');
$routes->post('usuario/login', 'Usuario::login');
$routes->get('usuario/logout', 'Usuario::logout');
$routes->get('/registro', 'AuthController::registro');
$routes->post('/auth/registrar', 'AuthController::registro');

