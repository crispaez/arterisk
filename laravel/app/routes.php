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


Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
Route::post('login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logOut'));
Route::get('/', array('as' => 'index', function(){
    return View::make('hello');
}
));


Route::group(['before' => 'auth'], function()
{
    Route::get('/clientes/admin', array('as' => 'homeClientes', 'uses' => 'Clientes@home'));

    Route::get('/clientes/{id?}', array('as' => 'infoClientes', 'uses' => 'Clientes@index'));
    Route::post('/clientes', array('as' => 'guardarCliente', 'uses' => 'Clientes@store'));
    Route::post('/clientes/{id}', array('as' => 'editarCliente', 'uses' => 'Clientes@update'));
    Route::delete('/clientes/{id}', array('as' => 'eliminarCliente', 'uses' => 'Clientes@destroy'));
});