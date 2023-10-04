<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/api/login','Api\AuthController::userLogin');
$routes->get('/logged-out','Api\AuthController::loggedOut');


$routes->get('/get-users','Api\ApiController::getUsers',['filter'=>'checkApiAuth']);

service('auth')->routes($routes);
