<?php

Route::get('/', 'Shop\OrderController@index');
Route::get('/order/create', 'Shop\OrderController@create');
Route::get('/order/{order}/cart', 'Shop\OrderController@cart');

Auth::routes();

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/admin', 'Admin\OrderController@index');
});