<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
 // Auth Routes
$routes->post('/api/login','Api\AuthController::userLogin');
$routes->get('/api/logged-out','Api\AuthController::loggedOut');

// Tasks Routes
$routes->group('api', ['filter' => 'checkApiAuth'], static function ($routes) {
    $routes->post('tasks','Api\TaskController::create');
    $routes->put('tasks/update/(:num)', 'Api\TaskController::update/$1');
    $routes->delete('tasks/delete/(:num)', 'Api\TaskController::delete/$1');
    $routes->get('tasks','Api\TaskController::index');
    $routes->get('tasks/(:num)','Api\TaskController::show/$1');
});




// $routes->get('/get-users','Api\ApiController::getUsers',['filter'=>'checkApiAuth']);

service('auth')->routes($routes);
