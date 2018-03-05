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
/*
Route::get('/', function () {
        return View::make('welcome');
})
*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/catproducts', 'HomeController@categoryproductlist')->name('home.catproducts');
Route::get('/catproducts/{id}', 'HomeController@categoryproductlist')->name('home.catproducts');
Route::get('/productdetail/{id}', 'HomeController@productdetail')->name('home.productdetail');







Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function()
{
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('auth.admin-login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('auth.admin-login.submit');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::get('/', 'AdminController@index')->name('admin');
});

Route::prefix('products')->group(function()
{
    Route::get('/manage', 'ProductController@manage')->name('product.manage');
    Route::put('/status', 'ProductController@updateStatus')->name('product.status');    

});

Route::prefix('category')->group(function()
{
    Route::get('/manage', 'ProductCategoryController@manage')->name('category.manage');
    Route::put('/status', 'ProductCategoryController@updateStatus')->name('category.status');        
    
});

Route::prefix('variants')->group(function()
{
    Route::get('/manage', 'VariantsController@manage')->name('variants.manage');
    Route::put('/status', 'VariantsController@updateStatus')->name('variants.status');        
    
});

Route::get('/cart', 'UserController@cartview')->name('user.cart');
Route::get('/checkout', 'UserController@checkout')->name('user.checkout');
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::get('/wishlist', 'UserController@wishlist')->name('user.wishlist');



Route::resource('products', 'ProductController');
Route::resource('category', 'ProductCategoryController');
Route::resource('variants', 'VariantsController');


