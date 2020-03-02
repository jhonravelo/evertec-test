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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['cors']], function () {
    Route::post('order', 'Shop\OrderController@store')->name('api.order');
    Route::put('order', 'Shop\OrderController@update')->name('api.order');
    Route::get('product', 'Shop\ProductController@store')->name('api.order');
    Route::get('product/{product}', 'Shop\ProductController@show')->name('api.order');
});