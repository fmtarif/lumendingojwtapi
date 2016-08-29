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

$api = app('Dingo\Api\Routing\Router');

// JWT Protected routes
$api->version('v1', ['middleware' => 'api.auth', 'providers' => 'jwt'], function ($api) {
    $api->get('/index', 'App\Http\Controllers\BackendController@index');
});

// Publicly accessible routes
$api->version('v1', [], function ($api) {
    $api->post('/sessions', 'App\Http\Controllers\AuthenticateController@create'); //login
    $api->delete('/sessions', 'App\Http\Controllers\AuthenticateController@destroy'); //logout
});

/**
 * Routes for resource posts
 */
$app->get('posts', 'PostsController@all');
$app->get('posts/{id}', 'PostsController@get');
$app->post('posts', 'PostsController@add');
$app->put('posts/{id}', 'PostsController@put');
$app->delete('posts/{id}', 'PostsController@remove');
