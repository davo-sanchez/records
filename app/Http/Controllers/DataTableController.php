<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class DataTableController extends Controller
{
    public function records_all(){

        $expedientes = DB::table('expedientes')
        ->select([
            'expedientes.expediente_id',
            'expedientes.num_caja',
            'expedientes.tipo_exp',
            'expedientes.num_exp',
            'expedientes.n_junta',
            'expedientes.ano',
            'expedientes.actor',
            'expedientes.demandado',
            'expedientes.concepto',
            'expedientes.procedencia',
            'expedientes.tiempo_archivo',
            'expedientes.num_legajos',
            'expedientes.num_hojas',
            'expedientes.observaciones',
            'expedientes.fecha_apertura',
            'expedientes.fecha_cierre',
            'expedientes.amparo',
            'tipos_expedientes.tipo_expediente_id',
            'tipos_expedientes.nombre_tipo_expediente'
            ])
        ->join('tipos_expedientes', 'expedientes.tipo_exp', '=', 'tipos_expedientes.tipo_expediente_id')
        ->where('deleted_at','=',null)
        ->get();

        return Datatables::of($expedientes)
        ->addColumn('junta', function ($expedientes) {
            return '<a href="'.route('expediente.view', ['id' => $expedientes->expediente_id]).'">'.$expedientes->n_junta.'</a>';
        })
        ->rawColumns(['junta'])
        ->addColumn('informacion', 'Público')
        ->editColumn('amparo', '{{ $amparo ? "SI" : "NO" }}')
        ->make(true);

    }

    public function current_year(){

        $year = date('Y');

        $expedientes = DB::table('expedientes')
        ->select([
            'expedientes.expediente_id',
            'expedientes.num_caja',
            'expedientes.tipo_exp',
            'expedientes.num_exp',
            'expedientes.n_junta',
            'expedientes.ano',
            'expedientes.actor',
            'expedientes.demandado',
            'expedientes.concepto',
            'expedientes.procedencia',
            'expedientes.tiempo_archivo',
            'expedientes.num_legajos',
            'expedientes.num_hojas',
            'expedientes.observaciones',
            'expedientes.fecha_apertura',
            'expedientes.fecha_cierre',
            'expedientes.amparo',
            'tipos_expedientes.tipo_expediente_id',
            'tipos_expedientes.nombre_tipo_expediente'
            ])
        ->join('tipos_expedientes', 'expedientes.tipo_exp', '=', 'tipos_expedientes.tipo_expediente_id')
        ->where('deleted_at','=',null)
        ->where('ano','=', $year)
        ->get();

        return Datatables::of($expedientes)
        ->addColumn('junta', function ($expedientes) {
            return '<a href="'.route('expediente.view', ['id' => $expedientes->expediente_id]).'">'.$expedientes->n_junta.'</a>';
        })
        ->rawColumns(['junta'])
        ->addColumn('informacion', 'Público')
        ->editColumn('amparo', '{{ $amparo ? "SI" : "NO" }}')
        ->make(true);

    }

    public function alive(){

        $year = date('Y');

        $expedientes = DB::table('expedientes')
        ->select([
            'expedientes.expediente_id',
            'expedientes.num_caja',
            'expedientes.tipo_exp',
            'expedientes.num_exp',
            'expedientes.n_junta',
            'expedientes.ano',
            'expedientes.actor',
            'expedientes.demandado',
            'expedientes.concepto',
            'expedientes.procedencia',
            'expedientes.tiempo_archivo',
            'expedientes.num_legajos',
            'expedientes.num_hojas',
            'expedientes.observaciones',
            'expedientes.fecha_apertura',
            'expedientes.fecha_cierre',
            'expedientes.amparo',
            'tipos_expedientes.tipo_expediente_id',
            'tipos_expedientes.nombre_tipo_expediente'
            ])
        ->join('tipos_expedientes', 'expedientes.tipo_exp', '=', 'tipos_expedientes.tipo_expediente_id')
        ->where('deleted_at','=',null)
        ->where('cerrado','=',0)
        ->get();

        return Datatables::of($expedientes)
        ->addColumn('junta', function ($expedientes) {
            return '<a href="'.route('expediente.view', ['id' => $expedientes->expediente_id]).'">'.$expedientes->n_junta.'</a>';
        })
        ->rawColumns(['junta'])
        ->addColumn('informacion', 'Público')
        ->editColumn('amparo', '{{ $amparo ? "SI" : "NO" }}')
        ->make(true);

    }

    public function dead(){

        $year = date('Y');

        $expedientes = DB::table('expedientes')
        ->select([
            'expedientes.expediente_id',
            'expedientes.num_caja',
            'expedientes.tipo_exp',
            'expedientes.num_exp',
            'expedientes.n_junta',
            'expedientes.ano',
            'expedientes.actor',
            'expedientes.demandado',
            'expedientes.concepto',
            'expedientes.procedencia',
            'expedientes.tiempo_archivo',
            'expedientes.num_legajos',
            'expedientes.num_hojas',
            'expedientes.observaciones',
            'expedientes.fecha_apertura',
            'expedientes.fecha_cierre',
            'expedientes.amparo',
            'tipos_expedientes.tipo_expediente_id',
            'tipos_expedientes.nombre_tipo_expediente'
            ])
        ->join('tipos_expedientes', 'expedientes.tipo_exp', '=', 'tipos_expedientes.tipo_expediente_id')
        ->where('deleted_at','=',null)
        ->where('cerrado','=',1)
        ->get();

        return Datatables::of($expedientes)
        ->addColumn('junta', function ($expedientes) {
            return '<a href="'.route('expediente.view', ['id' => $expedientes->expediente_id]).'">'.$expedientes->n_junta.'</a>';
        })
        ->rawColumns(['junta'])
        ->addColumn('informacion', 'Público')
        ->editColumn('amparo', '{{ $amparo ? "SI" : "NO" }}')
        ->make(true);

    }

    public function type($type){

        $year = date('Y');

        $expedientes = DB::table('expedientes')
        ->select([
            'expedientes.expediente_id',
            'expedientes.num_caja',
            'expedientes.tipo_exp',
            'expedientes.num_exp',
            'expedientes.n_junta',
            'expedientes.ano',
            'expedientes.actor',
            'expedientes.demandado',
            'expedientes.concepto',
            'expedientes.procedencia',
            'expedientes.tiempo_archivo',
            'expedientes.num_legajos',
            'expedientes.num_hojas',
            'expedientes.observaciones',
            'expedientes.fecha_apertura',
            'expedientes.fecha_cierre',
            'expedientes.amparo',
            'tipos_expedientes.tipo_expediente_id',
            'tipos_expedientes.nombre_tipo_expediente'
            ])
        ->join('tipos_expedientes', 'expedientes.tipo_exp', '=', 'tipos_expedientes.tipo_expediente_id')
        ->where('deleted_at','=',null)
        ->where('tipo_exp','=',$type)
        ->get();

        return Datatables::of($expedientes)
        ->addColumn('junta', function ($expedientes) {
            return '<a href="'.route('expediente.view', ['id' => $expedientes->expediente_id]).'">'.$expedientes->n_junta.'</a>';
        })
        ->rawColumns(['junta'])
        ->addColumn('informacion', 'Público')
        ->editColumn('amparo', '{{ $amparo ? "SI" : "NO" }}')
        ->make(true);

    }
}
