<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when thSat URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/planet[/{planetID}]', 'PlanetController@getPlanet');
$router->post('/newPlanet', 'PlanetController@newPlanet');
$router->put('/updatePlanet', 'PlanetController@updatePlanet');
$router->get('/get-swapi-data', 'SWAPIController@getAllData');

