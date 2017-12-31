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

Route::resource('/products', 'ProductsController');



Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as'   => 'cart',
]);




Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'   => 'index',
]);

Route::get('/{id}', [
    'uses' => 'FrontEndController@singleElement',
    'as'   => 'product.index',
]);



Route::post('/cart/add/{id}',[
    'uses' => 'ShoppingController@add_to_cart',
    'as'   => 'cart.add',
]);

Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@delete',
    'as'   => 'cart.delete',
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
