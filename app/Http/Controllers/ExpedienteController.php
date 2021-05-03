<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpedienteCreateRequest;
use App\Http\Requests\ExpedienteUpdateRequest;
use App\Expediente;
use App\TipoExpediente;

class ExpedienteController extends Controller
{
 
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        /*$expedientes = DB::table('expedientes')
                        ->join('tipos_expedientes','expedientes.tipo_exp','=','tipos_expedientes.tipo_expediente_id')
                        ->get();*/
        
        $expedientes = Expediente::all();                

        return view('expediente.index', [
            'expedientes' => $expedientes
        ]);
    }

    public function currentYear(){

        $year = date('Y');
        
        $expedientes = Expediente::Where('ano','=', $year)->get();

        return view('expediente.index', [
            'expedientes' => $expedientes
        ]);
    }

    public function create(){

        $tipos_expedientes = TipoExpediente::all();

        return view('expediente.create',[
            'tipos' => $tipos_expedientes
        ]);
    }

    public function store(ExpedienteCreateRequest $request){

        $expediente = DB::table('expedientes')->insertGetId([
            'num_caja' => ucwords($request->num_caja),
            'tipo_exp' => ucwords($request->tipo_exp),
            'num_exp' => ucwords($request->num_exp),
            'n_junta' => mb_strtoupper($request->n_junta),
            'ano' => $request->ano,
            'adicional' => mb_strtoupper($request->adicional),
            'actor' => ucwords($request->actor),
            'demandado' => ucwords($request->demandado),
            'concepto' => ucwords($request->concepto),
            'procedencia' => ucwords($request->procedencia),
            'tiempo_archivo' => ucwords($request->tiempo_archivo),
            'num_legajos' => $request->num_legajos,
            'num_hojas' => $request->num_hojas,
            'observaciones' => ucwords($request->observaciones),
            'fecha_obs' => $request->fecha_obs,
            'creator_id' => Auth::user()->id
            ]);

        return redirect()->route('expediente.create')->with('status', $expediente);

    }

    public function view($id){

        $expediente = Expediente::find($id);

        $tipos = TipoExpediente::all();

        return view('expediente.view', compact('expediente','tipos'));

    }

    public function update(ExpedienteUpdateRequest $request){

        $expediente = Expediente::find($request->expid);

        $expediente->num_caja = $request->num_caja;
        $expediente->tipo_exp = $request->tipo_exp;
        $expediente->num_exp = $request->num_exp;
        $expediente->n_junta = $request->n_junta;
        $expediente->ano = $request->ano;
        $expediente->adicional = $request->adicional;
        $expediente->actor = $request->actor;
        $expediente->demandado = $request->demandado;
        $expediente->concepto = $request->concepto;
        $expediente->procedencia = $request->procedencia;
        $expediente->tiempo_archivo = $request->tiempo_archivo;
        $expediente->num_legajos = $request->num_legajos;
        $expediente->num_hojas = $request->num_hojas;
        $expediente->observaciones = $request->observaciones;
        $expediente->fecha_obs = $request->fecha_obs;

        $expediente->save();

        return redirect()->route('expediente.view', ['id' => $request->expid])->with('status', '¡Expediente Actualizado!');

    }

    public function delete(Request $request){

        Expediente::findOrFail($request->expid)->delete();

        return redirect()->route('expediente.index')->with('status','¡Expediente Eliminado!');

    }

    public function trashbin(){
        $expedientes = Expediente::withTrashed()->get();

        return view('expediente.index', compact('expedientes'));
    }

}
