<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->get('/', function () {
    return view('welcome');
});


$router->post('/auth/token', ['uses' => 'Auth\OAuth2Controller@token']);

$router->group(['prefix' => 'api', 'middleware' => 'oauth'] , function($router){

    $router->get('test', function(){
        return 'this is private';
    });

});
