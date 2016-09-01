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

    $api->get('posts', 'App\Http\Controllers\PostsController@all');
    $api->get('posts/{id}', 'App\Http\Controllers\PostsController@get');
    $api->post('posts', 'App\Http\Controllers\PostsController@add');
    $api->put('posts/{id}', 'App\Http\Controllers\PostsController@put');
    $api->delete('posts/{id}', 'App\Http\Controllers\PostsController@remove');

    $api->get('tags', 'App\Http\Controllers\TagsController@all');
    $api->get('tags/{id}', 'App\Http\Controllers\TagsController@get');
    $api->post('tags', 'App\Http\Controllers\TagsController@add');
    $api->put('tags/{id}', 'App\Http\Controllers\TagsController@put');
    $api->delete('tags/{id}', 'App\Http\Controllers\TagsController@remove');
});

/*
//rate limiting example
//could not fig out how to apply limit, expires when multiple middlewares
// $api->version('v1', ['middleware' => 'api.throttle', 'limit' => 2, 'expires' => .5], function ($api) {
//     $api->get('tags', 'App\Http\Controllers\TagsController@all');
// });
$api->version('v1', ['middleware' => ['api.throttle', 'api.auth']], function ($api) {
   $api->get('tags', 'App\Http\Controllers\TagsController@all');
});
*/

// Publicly accessible routes
$api->version('v1', [], function ($api) {
    $api->post('/sessions', 'App\Http\Controllers\AuthenticateController@create'); //login
    $api->delete('/sessions', 'App\Http\Controllers\AuthenticateController@destroy'); //logout
});
