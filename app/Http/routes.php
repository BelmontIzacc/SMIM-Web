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

Route::get('/test', 'welcomeController@test');

Route::get('/error', 'welcomeController@error404');