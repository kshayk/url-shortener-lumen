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

$router->get('/', function () use ($router) {
    return view('main');
});

$router->get('/404', function() use ($router) {
    return view('404');
});

$router->get('/{uri}', "ShortUrlController@redirect");
$router->post('/shorten', "ShortUrlController@shorten");
