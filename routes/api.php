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
    Route::post('order', 'Shop\OrderController@store')->name('api.order');
    Route::put('order/{product}', 'Shop\OrderController@update')->name('api.order.update');
    Route::post('order/{order}/buy', 'Shop\BuyController@store')->name('api.order.store');
    Route::post('order/{order}/buy/status', 'Shop\BuyController@infoOrder')->name('api.order.buy.status');
    Route::get('product', 'Shop\ProductController@index')->name('api.product');
    Route::get('product/{product}', 'Shop\ProductController@show')->name('api.product.show');