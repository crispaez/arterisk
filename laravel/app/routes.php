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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('/', function () {
    return View::make('index');
});

Route::get('/clientes/{id?}', 'Clientes@index');
Route::post('/clientes', 'Clientes@store');
Route::post('/clientes/{id}', 'Clientes@update');
Route::delete('/clientes/{id}', 'Clientes@destroy');
