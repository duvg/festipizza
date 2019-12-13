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

Route::get('/home/{miip}', 'HomeController@index')->name('home')->defaults('miip', '0');
Route::get('/results', 'HomeController@results')->name('results');
Route::get('/vote/{id}', 'HomeController@votes')->name('vote');
Route::post('/votes', 'HomeController@vote')->name('votes');
Route::get('/thanks', 'HomeController@thanks')->name('thanks');


Auth::routes();


Route::resource('pizza', 'PizzaController');
Route::resource('restaurant', 'RestaurantController');
