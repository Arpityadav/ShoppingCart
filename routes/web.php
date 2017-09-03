
<?php


Route::get('/', 'ProductsController@index')->name('home');

Route::get('/add-to-cart/{product}', 'ProductsController@addToCart');
Route::get('/cart', 'ProductsController@cartIndex')->name('cart');

Route::get('/reduce/{id}', 'ProductsController@reduceByOne');
Route::get('/remove/{id}', 'ProductsController@removeItem');

Route::post('/checkout', 'ProductsController@checkout');

Route::get('/signup', 'UsersController@create');
Route::post('/signup', 'UsersController@store')->name('signup');

Route::get('/signin', 'UsersController@getSignIn');
Route::post('/signin', 'UsersController@postSignIn')->name('login');
Route::get('/logout', 'UsersController@logout');

Route::get('/users/profile', 'UsersController@profile')->name('profile');
