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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product','ProductController@index')->name('product');

Route::get('api/products','ProductController@getProducts');
Route::get('api/categorys','CategoryController@getCategorys');
Route::post('api/products/filter','ProductController@filterProduct');

Route::get('api/getminpriceproduct','ProductController@getMinPriceProduct');
Route::get('api/getmaxpriceproduct','ProductController@getMaxPriceProduct');

Route::post('/api/products', 'ProductController@testProductCreate');