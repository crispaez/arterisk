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

Route::get('/', array('as' => 'index', 'uses' => 'AuthController@index'));

Route::filter('perfil', function()
{
    if(Auth::user()->perfil_id != 1)
    {
        $permiso = Permiso::where(['perfil_id'=>Auth::user()->perfil_id, 'ruta'=>Route::current()->getName()])->first();
        if (empty($permiso))
        {
            return Redirect::route('index');
        }
    }
});

Route::group(['before' => 'auth|perfil'], function()
{

    Route::group(array('prefix' => 'clientes'), function()
    {
        Route::get('/admin', array('as' => 'homeClientes', 'uses' => 'Clientes@home'));
        Route::get('/{id?}', array('as' => 'infoClientes', 'uses' => 'Clientes@index'));
        Route::post('/', array('as' => 'guardarCliente', 'uses' => 'Clientes@store'));
        Route::post('/{id}', array('as' => 'editarCliente', 'uses' => 'Clientes@update'));
        Route::delete('/{id}', array('as' => 'eliminarCliente', 'uses' => 'Clientes@destroy'));
    });

    Route::group(array('prefix' => 'productos'), function()
    {
        Route::get('/admin', array('as' => 'homeProductos', 'uses' => 'Productos@home'));
        Route::get('/{id?}', array('as' => 'infoProductos', 'uses' => 'Productos@index'));
        Route::post('/', array('as' => 'guardarProducto', 'uses' => 'Productos@store'));
        Route::post('/{id}', array('as' => 'editarProducto', 'uses' => 'Productos@update'));
        Route::delete('/{id}', array('as' => 'eliminarProducto', 'uses' => 'Productos@destroy'));
    });

    Route::group(array('prefix' => 'ciudades'), function()
    {
        Route::get('/admin', array('as' => 'homeCiudades', 'uses' => 'Ciudades@home'));
        Route::get('/{id?}', array('as' => 'infoCiudades', 'uses' => 'Ciudades@index'));
        Route::post('/', array('as' => 'guardarCiudad', 'uses' => 'Ciudades@store'));
        Route::post('/{id}', array('as' => 'editarCiudad', 'uses' => 'Ciudades@update'));
        Route::delete('/{id}', array('as' => 'eliminarCiudad', 'uses' => 'Ciudades@destroy'));
    });

    Route::group(array('prefix' => 'departamentos'), function()
    {
        Route::get('/admin', array('as' => 'homeDepartamentos', 'uses' => 'Departamentos@home'));
        Route::get('/{id?}', array('as' => 'infoDepartamentos', 'uses' => 'Departamentos@index'));
        Route::post('/', array('as' => 'guardarDepartamento', 'uses' => 'Departamentos@store'));
        Route::post('/{id}', array('as' => 'editarDepartamento', 'uses' => 'Departamentos@update'));
        Route::delete('/{id}', array('as' => 'eliminarDepartamento', 'uses' => 'Departamentos@destroy'));
    });

    Route::group(array('prefix' => 'paises'), function()
    {
        Route::get('/admin', array('as' => 'homePaises', 'uses' => 'Paises@home'));
        Route::get('/{id?}', array('as' => 'infoPaises', 'uses' => 'Paises@index'));
        Route::post('/', array('as' => 'guardarPais', 'uses' => 'Paises@store'));
        Route::post('/{id}', array('as' => 'editarPais', 'uses' => 'Paises@update'));
        Route::delete('/{id}', array('as' => 'eliminarPais', 'uses' => 'Paises@destroy'));
    });

    Route::group(array('prefix' => 'marcas'), function()
    {
        Route::get('/admin', array('as' => 'homeMarcas', 'uses' => 'Marcas@home'));
        Route::get('/{id?}', array('as' => 'infoMarcas', 'uses' => 'Marcas@index'));
        Route::post('/', array('as' => 'guardarMarca', 'uses' => 'Marcas@store'));
        Route::post('/{id}', array('as' => 'editarMarca', 'uses' => 'Marcas@update'));
        Route::delete('/{id}', array('as' => 'eliminarMarca', 'uses' => 'Marcas@destroy'));
    });

    Route::group(array('prefix' => 'usuarios'), function()
    {
        Route::get('/admin', array('as' => 'homeAuth', 'uses' => 'AuthController@home'));
        Route::get('/{id?}', array('as' => 'infoAuth', 'uses' => 'AuthController@indexUsuarios'));
        Route::post('/', array('as' => 'guardarAuth', 'uses' => 'AuthController@store'));
        Route::post('/{id}', array('as' => 'editarAuth', 'uses' => 'AuthController@update'));
        Route::delete('/{id}', array('as' => 'eliminarAuth', 'uses' => 'AuthController@destroy'));
    });
});