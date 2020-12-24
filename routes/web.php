<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/product')->group(function () {
    Route::get('{id}', 'ProductController@detail');
    Route::get('add-to-cart/{id}', 'CartController@showCart');
    Route::post('add-to-cart/{id}', 'CartController@addToCart');
});

Route::prefix('/cart')->group(function () {
    Route::get('/', 'CartController@index');
    Route::get('/remove/{id}', 'CartController@destroy');
    Route::post('/', 'CartController@update');
    Route::post('/checkout', 'TransactionController@checkout');
});

Route::prefix('/transaction-history')->group(function() {
    Route::get('/', 'TransactionController@index');
    Route::get('/{id}','TransactionController@detail');
});

Route::group(['prefix' => '/admin',  'middleware' => 'admin'], function()
{
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/add-product', 'Admin\ProductController@add');
    Route::post('/add-product','Admin\ProductController@input');
    Route::get('/list-product', 'Admin\ProductController@showimage');
    Route::post('/delete','Admin\ProductController@delete');
    Route::post('/add-category', 'Admin\CategoryController@input');
    Route::get('/add-category', function(){
        return view('admin/addcategory');
    });
    Route::get('/show-category','Admin\CategoryController@showcategory');      
    Route::get('/show-category/{category}','Admin\CategoryController@showproduct');
});
