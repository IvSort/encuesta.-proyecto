<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'login::index');
$routes->get('/login', 'login::index');
$routes->post('/login/auth', 'login::auth');
$routes->get('/login/logout', 'login::logout');
$routes->get('/principal', 'Principal::index'); 

// $routes->get('/productos', 'productos::index');
// $routes->post('productos/guardarProducto', 'Productos::guardarProducto');
// $routes->post('productos/actualizarProducto/(:num)', 'Productos::actualizarProducto/$1');
// $routes->get('productos/eliminarProducto/(:num)', 'Productos::eliminarProducto/$1');

$routes->get('clientes', 'Clientes::index');
// $routes->post('clientes/store', 'Clientes::store');
// $routes->post('clientes/update', 'Clientes::update');
// $routes->get('clientes/delete/(:segment)', 'Clientes::delete/$1');

$routes->get('usuarios', 'Usuarios::index');
$routes->post('usuarios/store', 'Usuarios::store');
$routes->post('usuarios/update', 'Usuarios::update');
$routes->get('usuarios/delete/(:segment)', 'Usuarios::delete/$1');

$routes->get('ventas', 'Ventas::create');
// $routes->get('ventas/create', 'Ventas::create');
$routes->get('ventas/create','Formulario::index');
$routes->post('ventas/store', 'Ventas::store');
$routes->post('respuestas/registrar','Respuestas::registrar');
// $routes->get('rproductos/reporte', 'Rproductos::reporte');
// $routes->get('rproductos/generarPdf', 'Rproductos::generarPdf');
// $routes->get('rproductos/generarExcel', 'Rproductos::generarExcel');

$routes->get('rclientes/reporte', 'Rclientes::reporte');
$routes->get('rclientes/generarPdf', 'Rclientes::generarPdf');
$routes->get('rclientes/generarExcel', 'Rclientes::generarExcel');

$routes->get('rventas/reporte', 'Rventas::reporte');
$routes->get('rventas/generarPdf', 'Rventas::generarPdf');
$routes->get('rventas/generarExcel', 'Rventas::generarExcel');

$routes->get('rhistorial', 'Rhistorial::index');
$routes->get('rhistorial/exportPdf', 'Rhistorial::exportPdf');
$routes->get('rhistorial/exportExcel', 'Rhistorial::exportExcel');

$routes->get('topclientes', 'Topclientes::index');
$routes->get('topventas', 'Topventas::index');

$routes->get('/registro', 'Registro::crear');
$routes->get('/login', 'Registro::index');
$routes->post('/registro', 'Registro::registrar');

$routes->get('ventas/generarPdf', 'VentasController::generarPdf');

// $routes->get('formulario','Formulario::index');

// Routes del formulario
$routes->get('ventas/sql_server','Formulario::sql');

$routes->get('ventas/microsoft','Formulario::microsoft');
$routes->get('ventas/movil','Formulario::movil');