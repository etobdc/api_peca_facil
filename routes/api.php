<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
**Basic Routes for a RESTful service:
**Route::get($uri, $callback);
**Route::post($uri, $callback);
**Route::put($uri, $callback);
**Route::delete($uri, $callback);
**
*/
 
//Produtos
Route::get('products', 'ProductsController@index');
 
Route::get('products/{product}', 'ProductsController@show');
 
Route::post('products','ProductsController@store');
 
Route::put('products/{product}','ProductsController@update');
 
Route::delete('products/{product}', 'ProductsController@delete');

//Usuarios
Route::get('usuarios', 'UsuariosController@index');
 
Route::get('usuarios/{usuario}', 'UsuariosController@show');
 
Route::post('usuarios','UsuariosController@store');
 
Route::put('usuarios/{usuario}','UsuariosController@update');
 
Route::delete('usuarios/{usuario}', 'UsuariosController@delete');