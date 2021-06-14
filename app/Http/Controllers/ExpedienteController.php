<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpedienteCreateRequest;
use App\Http\Requests\ExpedienteUpdateRequest;
use App\Expediente;
use App\TipoExpediente;
use App\Log;
use App\Holder;

class ExpedienteController extends Controller
{
 
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
        $expedientes = Expediente::all(); 

        $title = 'Historial Completo';

        return view('expediente.index', compact('expedientes','title'));
    }

    public function currentYear(){

        $year = date('Y');
        
        $expedientes = Expediente::Where('ano','=', $year)->get();

        $title = 'Año Actual';

        return view('expediente.index', compact('expedientes','title'));
    }

    public function create(){

        $tipos = TipoExpediente::all();

        $holders = Holder::all();

        return view('expediente.create', compact('tipos','holders'));
    }

    public function store(ExpedienteCreateRequest $request){

        $amparo = $request->amparo == 'checked' ? 1 : 0;

        $expediente = DB::table('expedientes')->insertGetId([
            'num_caja' => ucwords($request->num_caja),
            'tipo_exp' => $request->tipo_exp,
            'num_exp' => $request->num_exp,
            'n_junta' => 'XVI',
            'ano' => $request->ano,
            'adicional' => '.',
            'actor' => ucwords($request->actor),
            'demandado' => ucwords($request->demandado),
            'concepto' => ucwords($request->concepto),
            'procedencia' => ucwords($request->procedencia),
            'tiempo_archivo' => ucwords($request->tiempo_archivo),
            'num_legajos' => $request->num_legajos,
            'num_hojas' => $request->num_hojas,
            'observaciones' => ucwords($request->observaciones),
            'fecha_apertura' => $request->fecha_apertura,
            'fecha_cierre' => $request->fecha_cierre,
            'creator_id' => Auth::user()->id,
            'holder_id' => $request->holder,
            'amparo' => $amparo,
            'cerrado' => !empty($request->fecha_cierre) ? 1 : 0
            ]);

            if($expediente) {
                Log::create([
                    'expediente' => $expediente,
                    'user_id' => Auth::user()->id,
                    'message' => 'Creación de expediente '.$request->num_exp.'/XVI/'.$request->ano,
                    'type' => $request->tipo_exp
                ]);

                DB::table('tipos_expedientes')->where('tipo_expediente_id','=',$request->tipo_exp)->increment('count');
                
            }       
            return redirect()->route('expediente.create')->with('status', $expediente);
    }

    public function view($id){

        $expediente = Expediente::find($id);

        $tipos = TipoExpediente::all();

        $holders = Holder::all();

        $history = Log::where('expediente','=',$id)->orderBy('created_at', 'desc')->paginate(10);

        return view('expediente.view', compact('expediente','tipos','holders','history'));

    }

    public function update(ExpedienteUpdateRequest $request){

        $expediente = Expediente::find($request->expid);

        $amparo = $request->amparo == 'checked' ? 1 : 0;

        $expediente->num_caja = $request->num_caja;
        $expediente->tipo_exp = $request->tipo_exp;
        $expediente->num_exp = $request->num_exp;
        $expediente->n_junta = $request->n_junta;
        $expediente->ano = $request->ano;
        $expediente->adicional = '.';
        $expediente->actor = $request->actor;
        $expediente->demandado = $request->demandado;
        $expediente->concepto = $request->concepto;
        $expediente->procedencia = $request->procedencia;
        $expediente->tiempo_archivo = $request->tiempo_archivo;
        $expediente->num_legajos = $request->num_legajos;
        $expediente->num_hojas = $request->num_hojas;
        $expediente->observaciones = $request->observaciones;
        $expediente->fecha_apertura = $request->fecha_apertura;
        $expediente->fecha_cierre = $request->fecha_cierre;
        $expediente->cerrado = !empty($request->fecha_cierre) ? 1 : 0;
        $expediente->amparo = $amparo;
        $expediente->holder_id = $request->holder;

        $update = $expediente->save();

        if($update) {
            Log::create([
                'user_id' => Auth::user()->id,
                'message' => 'Actualizzación del expediente. '.$expediente->num_exp.'/XVI/'.$expediente->ano,
                'expediente' => $request->expid,
                'type' => $request->tipo_exp
            ]);
    
            return redirect()->route('expediente.view', ['id' => $request->expid])->with('status', '¡Expediente Actualizado!');
    
        }
        
    }

    public function delete(Request $request){

        $expediente = Expediente::findOrFail($request->expid);


        if($expediente->delete()){
            
            Log::create([
                'user_id' => Auth::user()->id,
                'message' => 'Envío a la papelera del expediente '.$expediente->num_exp.'/XVI/'.$expediente->ano
            ]);
    
            DB::table('tipos_expedientes')->where('tipo_expediente_id','=',$expediente->tipo_exp)->decrement('count');
    
        }
        
        return redirect()->route('expediente.create')->with('status_delete','¡Expediente Enviado a la Papelera!');

    }

    public function trashbin(){
        $expedientes = Expediente::onlyTrashed()->get();

        return view('expediente.trashbin', compact('expedientes'));
    }

    public function dead(){
        $expedientes = Expediente::where('cerrado','=',1)->get();

        $title = 'Archivo Muerto';

        return view('expediente.index', compact('expedientes','title'));
    }

    public function live(){
        $expedientes = Expediente::where('cerrado','=',0)->get();

        $title = 'Archivo Activo';

        return view('expediente.index', compact('expedientes','title'));
    }

    public function restore(Request $request){

        Expediente::withTrashed()->where('expediente_id', $request->expid)->restore();

        $expediente = Expediente::findOrFail($request->expid);

        DB::table('tipos_expedientes')->where('tipo_expediente_id','=',$expediente->tipo_exp)->increment('count');

        Log::create([
            'user_id' => Auth::user()->id,
            'message' => 'Restauración del expediente '.$expediente->num_exp.'/XVI/'.$expediente->ano
        ]);

        return back();

    }

    public function destroy(Request $request){

        $expediente = Expediente::withTrashed()->find($request->expid);

        DB::table('expedientes')->where('expediente_id','=',$request->expid)->delete();

        Log::create([
            'user_id' => Auth::user()->id,
            'message' => 'Eliminación permanente del expediente '.$expediente->num_exp.'/XVI/'.$expediente->ano
        ]);

        return back();

    }

    public function type($tipo){

        $tipo_exp = TipoExpediente::findOrFail($tipo);

        $title = 'Expedientes: '.$tipo_exp->nombre_tipo_expediente;

        $expedientes = Expediente::where('tipo_exp','=',$tipo)->get();
        
        return view('expediente.index', compact('expedientes','title'));

    }

}
