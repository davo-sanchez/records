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

use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/expedientes', 'ExpedienteController@index')->name('expediente.index');
Route::get('/expedientes/actual', 'ExpedienteController@currentYear')->name('expediente.current');
Route::get('/expediente/crear', 'ExpedienteController@create')->name('expediente.create');
Route::post('/expediente/crear', 'ExpedienteController@store')->name('expediente.store');
Route::get('/expediente/ver/{id}', 'ExpedienteController@view')->name('expediente.view');
Route::post('/expediente/update', 'ExpedienteController@update')->name('expediente.update');

Route::get('/filtros', 'FilterController@index')->name('filter.index');
Route::get('/filtro/crear', 'FilterController@create')->name('filter.create');
Route::post('/filtro/crear', 'FilterController@store')->name('filter.store');

Route::get('/filtro/{filter}/configuracion', 'FilterController@configuration')->name('filter.config');