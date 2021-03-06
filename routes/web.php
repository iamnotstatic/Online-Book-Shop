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

Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/product/{id}', [
    'uses' => 'FrontendController@singleProduct',
    'as' => 'product.single'
]);

Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::post('/cart/add', [
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);


Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('cart/decr/{id}/{qty}', [
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

Route::get('cart/incr/{id}/{qty}', [
    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as' => 'checkout'
]);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::resource('products', 'ProductsController');

    //Users Route

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@make_admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@user_not_admin',
        'as' => 'user.not.admin'
    ]);


});

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
