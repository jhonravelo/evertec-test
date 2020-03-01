<?php
use App\Image;
use App\Product;

Auth::routes();
Route::get('/', function () {
    return view('tienda.index');
});
Route::get('/cart', function () {
    return view('tienda.cart');
});




// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', function () {
//     return view('plantilla.admin');
// })->name('admin');
// Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');
// Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');
// Route::get('cancelar/{ruta}', function ($ruta) {
//     return redirect()->route($ruta)->with('cancelar', 'Acción Cancelada!');
// })->name('cancelar');