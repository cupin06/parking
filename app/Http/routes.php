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

$router->get('test/sms', ['uses' => 'Api\SMSController@index']);

$router->get('api/v1/user/register', ['uses' => 'Api\RegisterController@create']);

$router->post('/auth/token', ['uses' => 'Auth\OAuth2Controller@token']);

// Get Refresh Token
$router->get('/refresh_token/list/{accessToken}', ['uses' => 'Api\TokenController@getRefreshToken']);

//all api route goes inside here
$router->group(['prefix' => 'api/v1/', 'middleware' => 'oauth'] , function($router){

    $router->get('test', function(){return 'this is private';});

    // Default url to test Access Token Expired
    $router->get('check/token', function(){});

    /* Vehicle Information */
    $router->get('vehicle/list', ['uses' => 'Api\VehicleController@index']);
    $router->post('vehicle/create', ['uses' => 'Api\VehicleController@create']);
    $router->patch('vehicle/update/{id}', ['uses' => 'Api\VehicleController@update']);
    $router->delete('vehicle/delete/{id}', ['uses' => 'Api\VehicleController@destroy']);

    /* Parking  */
    $router->get('parking/list', ['uses' => 'Api\ParkingController@getAll']);
    $router->get('parking/list/active', ['uses' => 'Api\ParkingController@getAllActive']);
    $router->get('parking/list/inactive', ['uses' => 'Api\ParkingController@getAllInactive']);
    $router->get('parking/list/{id}', ['uses' => 'Api\ParkingController@getWithID']);
    $router->get('parking/list/active/{id}', ['uses' => 'Api\ParkingController@getByIDActive']);
    $router->get('parking/list/inactive/{id}', ['uses' => 'Api\ParkingController@getByIDInactive']);
    $router->post('parking/store', ['uses' => 'Api\ParkingController@store']);
    $router->patch('parking/update/{id}', ['uses' => 'Api\ParkingController@update']);
    $router->patch('parking/update_status/{id}', ['uses' => 'Api\ParkingController@updateStatus']);
    $router->delete('parking/delete/{id}', ['uses' => 'Api\ParkingController@destroy']);

    /* User Information */
    $router->get('user/info/', ['uses' => 'Api\UserController@getAll']);
    $router->get('user/info/{email}', ['uses' => 'Api\UserController@getByEmail']);

});


//all route that need to have csrf protection goes inside this group
$router->group(['middleware' => 'csrf'] , function($router){

});
