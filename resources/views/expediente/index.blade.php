@extends('layouts.app')

@section('title', 'Historial Completo de Expedientes')

@section('css-datatables')
    @include('layouts.css.css-datatables')
@endsection

@section('content')

 
<!-- DataTales Example -->
@can('expedientes.create', User::class)
    <a href="{{ route('expediente.create') }}" class="mb-3 btn btn-primary">
        Nuevo
    </a>
@endcan

 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Historial Completo</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="font-size: 15px">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Caja</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Periodo</th>
                        <th>Tiempo/Archivo</th>
                        <th>Legajos</th>
                        <th>Hojas</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expedientes as $e)
                        <tr>
                            <td>{{ $e->nombre_tipo_expediente }}</td>
                            <td>{{ $e->num_caja }}</td>
                            <td>{{ $e->num_exp.'-'.$e->ano."/XVI/".$e->adicional }}</td>
                            <td>{{ $e->actor.' - VS - '.$e->demandado.' - '.$e->concepto.' - '.$e->procedencia }}</td>
                            <td>{{ $e->ano }}</td>
                            <td>{{ $e->tiempo_archivo }}</td>
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

@endsection

@section('js-datatables')
    @include('layouts.js.js-datatables')
@endsection