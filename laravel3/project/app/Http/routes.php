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
//Route za home page, funkcija se nahaja v PageController ime funkcije je pa home
Route::get('/', 'PageController@home'); //controller v http/controllers
//Route za about page, funkcija se nahaja v PageController ime funkcije je pa about
Route::get('/about', 'PageController@about');
//Route za rules page
Route::get('/rules', 'PageController@rules');
//Route za login
Route::get('/login', 'AccountController@login');
//Route za register
Route::get('/register', 'AccountController@register');
