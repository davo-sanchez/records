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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/users','UserController@index')->name('user.index');
Route::get('/user/view/{id}','UserController@view')->name('user.view');
Route::post('/user/update','UserController@update')->name('user.update');

Route::get('/roles','RoleController@index')->name('role.index');
Route::get('/rol/crear','RoleController@create')->name('role.create');
Route::post('/rol/guardar','RoleController@store')->name('role.store');
Route::post('/rol/update/{id}','RoleController@update')->name('role.update');
Route::get('/rol/{id}','RoleController@view')->name('role.view');

Route::get('/expedientes', 'ExpedienteController@index')
->name('expediente.index')
->middleware('permission:expedientes.select');

Route::get('/expedientes/actual', 'ExpedienteController@currentYear')
->name('expediente.current')
->middleware('permission:expedientes.select');

Route::get('/expediente/crear', 'ExpedienteController@create')
->name('expediente.create')
->middleware('permission:expedientes.create');

Route::get('/filtros', 'FilterController@index')->name('filter.index');
Route::get('/filtro/crear', 'FilterController@create')->name('filter.create');
Route::post('/filtro/crear', 'FilterController@store')->name('filter.store');

Route::get('/filtro/{filter}/configuracion', 'FilterController@configuration')->name('filter.config');
