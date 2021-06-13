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
Route::get('/viaje/solicitar/chofer/{servicioId}', 'ServicioController@elegirChofer')->name('chofers-disponibles')->middleware('auth');
Route::get('/viaje/solicitar/chofer/{ServicioId}/{choferId}', 'ServicioController@chofer')->name('seleccionar-chofer')->middleware('auth');



////////////////////    PayPal    ///////////////////

Route::get('/viaje/pagar/{ServicioId}', 'PaymentController@pagarViaje')->name('pagar-viaje')->middleware('auth');
Route::get('/viaje/pagar/correcto/{ServicioId}', 'PaymentController@pagoRetrun')->name('pago-retrun')->middleware('auth');
Route::get('/viaje/pagar/error/{ServicioId}', 'PaymentController@pagoCancel')->name('pago-cancel')->middleware('auth');







