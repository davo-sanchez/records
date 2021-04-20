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



/*Route::get('/', function () {

    $erecords = DB::table('e4')->get();

    foreach($erecords as $er){

        $expediente = Expediente::updateOrCreate(
            [
            'num_caja' => $er->num_caja,
            'tipo_exp' => $er->tipo_exp,
            'num_exp' => $er->num_exp,
            'n_junta' => $er->n_junta,
            'ano' => $er->ano,
            'adicional' => $er->adicional,
            'actor' => $er->actor,
            'demandado' => $er->demandado,
            'concepto' => $er->concepto,
            'procedencia' => $er->procedencia,
            'tiempo_archivo' => $er->tiempo_archivo,
            'num_legajos' => $er->num_legajos,
            'num_hojas' => $er->num_hojas,
            'observaciones' => $er->observaciones,
            'fecha_alta' => $er->fecha_alta,
            'fecha_ult_mod' => $er->fecha_ult_mod
        ],

            [
            'num_caja' => $er->num_caja,
            'tipo_exp' => $er->tipo_exp,
            'num_exp' => $er->num_exp,
            'n_junta' => $er->n_junta,
            'ano' => $er->ano,
            'adicional' => $er->adicional,
            'actor' => $er->actor,
            'demandado' => $er->demandado,
            'concepto' => $er->concepto,
            'procedencia' => $er->procedencia,
            'tiempo_archivo' => $er->tiempo_archivo,
            'num_legajos' => $er->num_legajos,
            'num_hojas' => $er->num_hojas,
            'observaciones' => $er->observaciones,
            'fecha_obs' => $er->fecha_obs,
            'fecha_alta' => $er->fecha_alta,
            'fecha_ult_mod' => $er->fecha_ult_mod,
            'creator_id' => 1
            ]
        );

        $expediente->save();

    }
});*/

Auth::routes();

Route::get('/users','UserController@index')->name('user.index');

Route::get('/roles','RoleController@index')->name('role.index');
Route::get('/role/{id}','RoleController@view')->name('role.view');
Route::get('/rol/crear','RoleController@create')->name('role.create');
Route::post('/rol/guardar','RoleController@store')->name('role.store');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/expedientes', 'ExpedienteController@index')
->name('expediente.index')
->middleware('permission:expedientes.index');

Route::get('/expedientes/actual', 'ExpedienteController@currentYear')
->name('expediente.current')
->middleware('permission:expedientes.index');

Route::get('/expediente/crear', 'ExpedienteController@create')
->name('expediente.create')
->middleware('permission:expedientes.create');

Route::get('/filtros', 'FilterController@index')->name('filter.index');
Route::get('/filtro/crear', 'FilterController@create')->name('filter.create');
Route::post('/filtro/crear', 'FilterController@store')->name('filter.store');

Route::get('/filtro/{filter}/configuracion', 'FilterController@configuration')->name('filter.config');