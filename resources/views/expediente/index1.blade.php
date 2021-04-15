@extends('layouts.app')

@section('title', 'Listado de Expedientes')    

@section('content')
<div class="container-fluid">
    <div class="row">
                <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Listado de expedientes
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%; overflow-x: scroll;">
                        <thead>
                            <tr>
                                <th>Caja</th>
                                <th>Clave de Exp.</th>
                                <th>Nombre del Expediente</th>
                                <th>Periodo</th>
                                <th>Tiempo/Archivo</th>
                                <th>No. Legajos</th>
                                <th>No. Hojas</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expedientes as $e)
                                <tr>
                                    <td>{{ $e->num_caja }}</td>
                                    <td>{{ $e->num_exp.'-'.$e->ano."/XVI/".$e->adicional }}</td>
                                    <td>{{ $e->actor.' - VS - '.$e->demandado.' - '.$e->concepto.' - '.$e->procedencia }}</td>
                                    <td>{{ $e->ano }}</td>
                                    <td>{{ $e->tiempo_archivado }}</td>
                                    <td>{{ $e->num_legajos }}</td>
                                    <td>{{ $e->num_hojas }}</td>
                                    <td>{{ $e->observaciones }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
