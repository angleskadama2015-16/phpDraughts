<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Routi za akcije na kontrolerje
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/rules', 'HomeController@rules');

Route::get('/play', 'HomeController@play');

Route::get('/users', 'HomeController@users');
Route::get('/onlineUsers', 'HomeController@onlineUsers');
Route::get('/onlineGet', 'HomeController@onlineGet');
Route::get('/edit', 'HomeController@edit');
Route::post('/change', 'HomeController@change');
Route::put('/update', 'HomeController@update');
