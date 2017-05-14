<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'namespace' => 'Api',
        'middleware' => 'auth:api'
    ],
    function ($route) {
        $route->get('user', function (Request $request) {
            return $request->user();
        });

       	$route->resource('goodses', 'GoodsController');
    }
);
