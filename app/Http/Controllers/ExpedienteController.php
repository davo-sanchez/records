<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
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

    public function create(){

        $tipos_expedientes = TipoExpediente::all();

        return view('expediente.create',[
            'tipos' => $tipos_expedientes
        ]);
    }
}
