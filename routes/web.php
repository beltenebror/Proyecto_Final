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


////////////////////    Inicio    ///////////////////

Route::get('/', 'IndexController@index')->name('home');



////////////////////    Usuarios    ///////////////////


Auth::routes();
Route::get('/perfil', 'UpdateController@index')->name('perfil')->middleware('auth');
Route::post('/perfil/actualizar-cliente/', 'UpdateController@updateCliente')->name('actualizar-cliente')->middleware('auth');
Route::post('/perfil/actualizar-chofer/', 'UpdateController@updateChofer')->name('actualizar-chofer')->middleware('auth');
Route::post('/perfil/borrar', 'UpdateController@destroy')->name('perfil-borrar')->middleware('auth');




////////////////////    Viajes    ///////////////////

Route::get('/viaje', 'ServicioController@index')->name('viaje');
Route::get('/viaje/solicitar', 'ServicioController@create')->name('pedir-viaje')->middleware('auth');
Route::post('/viaje/solicitar', 'ServicioController@store')->name('crear-viaje')->middleware('auth');




