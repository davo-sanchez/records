<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use App\Filter;
use App\Condition;
use App\TipoExpediente;

class ExpedienteController extends Controller
{
 
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

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

    public function filter($filter_slug){

        $filter = Filter::where('slug',$filter_slug)->first();

        $conditions = Condition::where('filter_id',$filter->id)->get();

        $expedientes = Expediente::where()->get();

        return view('expediente.index', [
            'expedientes' => $expedientes
        ]);

    }

}
