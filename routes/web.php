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


////////////////////    Traducciones    ///////////////////
Route::get('locale/{locale}','LanguageController@setLocale')->where('locale','en|es')->name('locale');


////////////////////    Inicio    ///////////////////

Route::get('/', 'IndexController@index')->name('home');



////////////////////    Usuarios    ///////////////////

Auth::routes(['verify' => true]);
Route::get('/perfil', 'UpdateController@index')->name('perfil')->middleware('verified');
Route::post('/perfil/actualizar-cliente/', 'UpdateController@updateCliente')->name('actualizar-cliente')->middleware('verified');
Route::post('/perfil/actualizar-chofer/', 'UpdateController@updateChofer')->name('actualizar-chofer')->middleware('verified');
Route::post('/perfil/borrar', 'UpdateController@destroy')->name('perfil-borrar')->middleware('verified');



////////////////////    Viajes    ///////////////////

Route::get('/viaje', 'ServicioController@index')->name('viaje');
Route::get('/viaje/solicitar', 'ServicioController@create')->name('pedir-viaje')->middleware('verified');
Route::post('/viaje/solicitar', 'ServicioController@store')->name('crear-viaje')->middleware('verified');
Route::get('/viaje/solicitar/chofer/{servicioId}', 'ServicioController@elegirChofer')->name('chofers-disponibles')->middleware('verified');
Route::get('/viaje/solicitar/chofer/{ServicioId}/{choferId}', 'ServicioController@chofer')->name('seleccionar-chofer')->middleware('verified');
Route::get('/mis-viajes', 'ServicioController@verViajes')->name('ver-viajes')->middleware('verified');
Route::get('/mis-viajes/confirmar/{servicioId}', 'ServicioController@confirmar')->name('confirmar-viaje')->middleware('verified');




////////////////////    PayPal    ///////////////////

Route::get('/viaje/pagar/{ServicioId}', 'PaymentController@pagarViaje')->name('pagar-viaje')->middleware('verified');
Route::get('/viaje/pagar/correcto/{ServicioId}', 'PaymentController@pagoRetrun')->name('pago-retrun')->middleware('verified');
Route::get('/viaje/pagar/error/{ServicioId}', 'PaymentController@pagoCancel')->name('pago-cancel')->middleware('verified');







