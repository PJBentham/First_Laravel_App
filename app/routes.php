<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');

Route::post('/', 'HomeController@registerInterest');

Route::post('/', 'HomeController@processLogin');

Route::get('/welcome', 'WelcomeController@welcome');

Route::get('/register', 'RegisterController@home');

Route::post('/register', 'RegisterController@registerUser');

