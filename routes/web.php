<?php

Auth::routes();

Route::get('/', 'Shop\OrderController@index');
Route::get('/order/create', 'Shop\OrderController@create');
Route::get('/order/{id}', 'Shop\OrderController@show');
Route::get('/order/{id}/edit', 'Shop\OrderController@edit');
Route::get('/order/{id}/cart', 'Shop\OrderController@cart');



// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', function () {
//     return view('plantilla.admin');
// })->name('admin');
// Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');
// Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');
// Route::get('cancelar/{ruta}', function ($ruta) {
//     return redirect()->route($ruta)->with('cancelar', 'Acción Cancelada!');
// })->name('cancelar');