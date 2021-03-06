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

Route::post('/login', 'Auth\LoginController@login');
//Route::group(['middleware' => 'jwt.auth'], function () {
Route::get('/categorylist', 'HomeController@categorylist');
Route::get('/productslist', 'HomeController@productslist');
Route::get('/productslist/{id}', 'HomeController@productslist');
Route::get('/categorydetail/{id}', 'HomeController@categorydetail');

Route::get('/categoryproduct', 'HomeController@categoryProduct');
Route::get('/homeproducts/{id}', 'HomeController@homeproducts');
Route::post('/homeproductsfilter', 'HomeController@productFilter');
Route::post('/searchitems', 'HomeController@searchItems');
Route::post('/updateCart', 'OrderController@store');
Route::post('/updateWishList', 'WishlistController@store');
Route::post('/cartlist', 'UserController@cartlist');
Route::post('/wishlist', 'UserController@wishlisting');

Route::delete('cart/{id}', 'OrderController@destroy');
Route::delete('wishlist/{id}', 'WishlistController@destroy');


Route::get('userprofile/{id}', 'UserController@userProfile');
Route::put('updateprofile/{id}', 'UserController@update');
//});


Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::put('products/{id}', 'ProductController@update');
Route::put('products/status/{id}', 'ProductController@updateStatus');
Route::delete('products/{id}', 'ProductController@delete');

Route::get('category/categorylist', 'ProductCategoryController@categorylist');
Route::get('category', 'ProductCategoryController@index');
Route::get('category/{id}', 'ProductCategoryController@show');
Route::post('category', 'ProductCategoryController@store');
Route::put('category/{id}', 'ProductCategoryController@update');
Route::delete('category/{id}', 'ProductCategoryController@delete');
Route::put('category/status/{id}', 'ProductCategoryController@updateStatus');


Route::get('variants', 'VariantsController@index');
Route::get('variants/{id}', 'VariantsController@show');
Route::post('variants', 'VariantsController@store');
Route::put('variants/{id}', 'VariantsController@update');
Route::delete('variants/{id}', 'VariantsController@delete');
Route::put('variants/status/{id}', 'VariantsController@updateStatus');





