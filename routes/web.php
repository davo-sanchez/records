<?php
use App\Expediente;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/expedientes', 'ExpedienteController@index')->name('expediente.index');
Route::get('/expedientes/actual', 'ExpedienteController@currentYear')->name('expediente.current');
Route::get('/expediente/crear', 'ExpedienteController@create')->name('expediente.create');
Route::post('/expediente/crear', 'ExpedienteController@store')->name('expediente.store');
Route::get('/expediente/ver/{id}', 'ExpedienteController@view')->name('expediente.view');
Route::post('/expediente/update', 'ExpedienteController@update')->name('expediente.update');
Route::post('/expediente/delete', 'ExpedienteController@delete')->name('expediente.delete');