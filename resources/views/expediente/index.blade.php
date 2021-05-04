@extends('layouts.app')

@section('title', $title)

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
<a href="{{ route('expediente.create') }}" class="mb-3 btn btn-primary">Nuevo</a>
@endcan

 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>#Expediente</th>
                        <th>Actor</th>
                        <th>Demandado</th>
                        <th>Concepto</th>
                        <th>Procedencia</th>
                        <th>Fecha Apertura</th>
                        <th>Fecha Cierre</th>
                        <th>#Hojas</th>
                        <th>Carácter de la Información</th>
                        <th>Ubicación</th>
                        <th>Amparo</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px">
                    @foreach ($expedientes as $e)
                        <tr class="table-row">                                                        
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $e->tipo->nombre_tipo_expediente }}</td>
                            <td>{{ $e->num_exp.'/'.$e->n_junta.'/'.$e->ano }}</td>
                            <td>{{ $e->actor }}</td>
                            <td>{{ $e->demandado }}</td>
                            <td>{{ $e->concepto }}</td>
                            <td>{{ $e->procedencia }}</td>
                            <td>{{ $e->fecha_apertura }}</td>
                            <td>{{ $e->fecha_cierre }}</td>                            
                            <td>{{ $e->num_hojas }}</td>                            
                            <td>Pública</td>
                            <td>{{ $e->n_caja }}</td>
                            <td>
                                @if($e->amparo == 0)
                                    NO
                                        @else
                                            SI
                                @endif
                            <a href="{{ route('expediente.view', ['id' => $e->expediente_id]) }}" class="edit-row-btn"> 
                                <i class="far fa-edit"></i>
                            </a>
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