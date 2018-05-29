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


Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::get('/faq', 'PagesController@faq');
Route::get('/404', 'PagesController@error404');

Route::get('/search_page','PagesController@search_page');

// User
Route::get('/users/{id}','UsersController@profile')->name('profile');
Route::post('/users/{id}/update','UsersController@update')->name('update_user');
Route::delete('/users/{id}/delete','UsersController@delete')->name('delete_user');

// Cart
Route::post('/cart/products/{id}/remove','ProductController@deleteOrder');
Route::get('/users/cart/{id}','UsersController@cart')->name('cart');
Route::post('/cart/products/{id}/remove','CartController@remove');
Route::post('/cart/products/{id}/inc','CartController@incQuantity');
Route::post('/cart/products/{id}/sub','CartController@subQuantity');
Route::post('/cart/products/{id}/add','CartController@add');

// Authentication
Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Google Auth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Product
Route::get('/products/search','ProductController@searchProducts')->name('search');
Route::get('/products/{id}','ProductController@page')->name('page');
Route::post('/products/{id}/favorite','ProductController@favorite');
Route::post('/products/{id}/unfavorite','ProductController@unfavorite');

Route::get('/products/search','ProductController@searchProducts')->name('search');
Route::delete('products/{id}/delete','ProductController@delete')->name('delete_product');
/*Route::delete('/products/{id_product}/reviews/{id_review}/delete', 'ReviewController@delete')->name('delete_review');*/
//Reviews
Route::post('/products/reviews/{id_review}/delete','ReviewController@delete');
Route::put('/products/{id}/reviews', 'ReviewController@create');

//Admin
Route::get('/admin/users', 'AdminController@getAllUsers');
Route::get('/admin/users/search', 'AdminController@searchUsers')->name('searchUsers');
Route::get('/admin/editProduct/{id}', 'AdminController@editProduct')->name('editProduct');
