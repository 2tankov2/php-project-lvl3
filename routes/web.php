<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
    //return $router->app->version();
//});

$router->get('/', ['uses' => 'AppController@index', 'as' => 'main']);

$router->get('/domains', ['uses' => 'DomainController@index', 'as' => 'domain.index']);

$router->get('/domains/{id}', [
    'uses' => 'DomainController@show',
    'as' => 'domain.show'
]);

$router->post('/domains', [
    'uses' => 'DomainController@store',
    'as' => 'domain.store'
]);
