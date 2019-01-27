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
    return view('welcome');
});

Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cjenik','CjenikController');
Route::resource('user','UserController');

 
Route::get('stavke', 'KosaricaController@index');
 
Route::get('kosarica', 'KosaricaController@cart');
 
Route::get('dodajukosaricu/{id}', 'KosaricaController@addToCart');

Route::patch('update-cart', 'ProductsController@update');
 
Route::delete('remove-from-cart', 'ProductsController@remove');