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
/*
Route::get('/test', function(){

   

    $nuevos = DB::table('nuevos')->get();

    foreach($nuevos as $n){

        $datos = explode('/', $n->EXPEDIENTES_EN_TR_MITE_EN_LAS_JUNTAS_ESPECIALES);

        $expediente = $datos[0];
        $ano = trim($datos[1], ' ');

        $datos2 = explode('VS', $n->Column_3);

        $actor = $datos2[0];
        $demandado = $datos2[1];

        DB::table('expedientes')->insertGetId([
            'num_caja' => 'CAJA',
            'tipo_exp' => $n->Column_4,
            'num_exp' => ucwords($expediente),
            'n_junta' => mb_strtoupper('XVI'),
            'ano' => $ano,
            'adicional' => '/',
            'actor' => ucwords($actor),
            'demandado' => ucwords($demandado),
            'concepto' => '.',
            'procedencia' => '.',
            'tiempo_archivo' => 1,
            'num_legajos' => 1,
            'num_hojas' => 1,
            'observaciones' => '...',
            'fecha_obs' => $ano.'-01-01',
            'creator_id' => 1,
            'cerrado' => 0,
            'amparo' => $n->Column_5
            ]);

    }

});
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
Route::get('/expediente/papelera', 'ExpedienteController@trashbin')->name('expediente.trashbin');