@extends('layouts.app')

@section('title', 'Historial Completo de Expedientes')

@section('css-datatables')
    @include('layouts.css.css-datatables')
@endsection

@section('content')

@if (session('status'))

  <div class="row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="alert alert-danger" role="alert">
        <a href="#" class="alert-link">{{ session('status') }}</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
@endif

@can('expedientes.create')
<a href="{{ route('expediente.create') }}" class=" mb-3 btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Nuevo</span>
</a>
@endcan

 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Elementos Eliminados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" width="100%" cellspacing="0" style="font-size: 15px">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Caja</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Periodo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expedientes as $e)
                        <tr class="table-row">
                            <td>{{ $e->tipo->nombre_tipo_expediente }}</td>
                            <td>{{ $e->num_caja }}</td>
                            <td>{{ $e->num_exp.'-'.$e->ano."/XVI/".$e->adicional }}</td>
                            <td>{{ $e->actor.' - VS - '.$e->demandado.' - '.$e->concepto.' - '.$e->procedencia }}</td>
                            <td>{{ $e->ano }}</td>                            
                            <td>
                                <form action="{{ route('expediente.restore') }}" method="POST" class="form-delete-restore">
                                    @csrf
                                    <input type="hidden" name="expid" value="{{ $e->expediente_id }}">
                                    <button class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('expediente.destroy') }}" method="POST" class="form-delete-restore">
                                    @csrf
                                    <input type="hidden" name="expid" value="{{ $e->expediente_id }}">
                                    <button class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
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