<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::resources([
    'category' => 'CategoryController',
    'product' => 'ProductController',
]);

Route::group(['middleware' => ['auth']], function () {
    Route::resources([
        'order' => 'OrderController',
    ]);
});

Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::delete('cart/delete', 'CartController@destroy')->name('cart.destroy');
