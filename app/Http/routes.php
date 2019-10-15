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

//-----------------------------------------------------------------------------------//
Route::get('/', 'welcomeController@index');
Route::post('/', 'welcomeController@buscar');
Route::get('/resultados/palabra={palabra}/{tipo}', 'welcomeController@buscarIndi');

Route::get('/proyecto/{id}','welcomeController@proyecto');
Route::get('/proyecto/{id}/galeria','welcomeController@galeria');

Route::get('/biblioteca', 'welcomeController@biblioteca');

//-----------------------------------------------------------------------------------//
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout','Auth\AuthController@getLogout');
//-----------------------------------------------------------------------------------//
Route::get('/admin', 'adminController@index');
// Password reset link request routes...
Route::get('/password/email', 'Auth\PasswordController@getEmail');
Route::post('/password/email', 'Auth\PasswordController@postEmail');
// Password reset routes...
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');

Route::get('/extra', 'welcomeController@creditos');
Route::get('/error', 'welcomeController@error404');