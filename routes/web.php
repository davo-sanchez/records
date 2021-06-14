<?php
use App\Expediente;
use Illuminate\Support\Facades\DB;

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

/****************
 * Expedientes 
 * ****************/

Route::get('/expedientes', 'ExpedienteController@index')->name('expediente.index')->middleware('permission:expedientes.select');
Route::get('/expedientes/actual', 'ExpedienteController@currentYear')->name('expediente.current')->middleware('permission:expedientes.select');
Route::get('/expediente/crear', 'ExpedienteController@create')->name('expediente.create')->middleware('permission:expedientes.create');
Route::post('/expediente/crear', 'ExpedienteController@store')->name('expediente.store')->middleware('permission:expedientes.create');
Route::get('/expediente/ver/{id}', 'ExpedienteController@view')->name('expediente.view')->middleware('permission:expedientes.select');
Route::post('/expediente/update', 'ExpedienteController@update')->name('expediente.update')->middleware('permission:expedientes.edit');
Route::get('/expediente/papelera', 'ExpedienteController@trashbin')->name('expediente.trashbin')->middleware('permission:expedientes.trashbin');
Route::get('/expediente/muerto', 'ExpedienteController@dead')->name('expediente.dead')->middleware('permission:expedientes.select');
Route::get('/expediente/activo', 'ExpedienteController@live')->name('expediente.live')->middleware('permission:expedientes.select');
Route::post('/expediente/restaurar','ExpedienteController@restore')->name('expediente.restore')->middleware('permission:expedientes.restore');
Route::post('/expediente/delete','ExpedienteController@delete')->name('expediente.delete')->middleware('permission:expedientes.trashbin');
Route::post('/expediente/destruir', 'ExpedienteController@destroy')->name('expediente.destroy')->middleware('permission:expedientes.destroy');

Route::get('/expedientes/{tipo}','ExpedienteController@type')->name('expediente.type');

/****************
 * Usuarios 
 * ****************/

 Route::get('/users','UserController@index')->name('user.index')->middleware('role:Administrador');
 Route::post('/user/update','UserController@update')->name('user.update')->middleware('role:Administrador');
 Route::get('/user/view/{id}','UserController@view')->name('user.view')->middleware('role:Administrador');