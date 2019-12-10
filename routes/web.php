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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vote/{id}', 'HomeController@votes')->name('vote');
Route::get('/thanks', 'HomeController@thanks')->name('thanks');


Auth::routes();


Route::resource('pizza', 'PizzaController');
Route::resource('restaurant', 'RestaurantController');
