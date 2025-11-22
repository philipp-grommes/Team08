<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tables', 'Tables::index');
$routes->get('tables/add', 'Add::index');