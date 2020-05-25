<?php

use Illuminate\Support\Facades\Redis;
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
    Log::info('GET /');
    Redis::set('test', 'OK');
    return Redis::get('test');
});

$router->get('/tables', function () use ($router) {
    Log::info('GET /tables');
    return DB::select("show tables");
});
