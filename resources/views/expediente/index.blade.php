@extends('layouts.app')

@section('title', $title)

@section('css-datatables')
    @include('layouts.css.css-datatables')
@endsection

@section('content')

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
        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Caja</th>
                        <th>#Expediente</th>
                        <th>Actor</th>
                        <th>Demandado</th>
                        <th>Concepto</th>
                        <th>Fecha Cierre</th>
                        <th>#Hojas</th>
                        <th>Carácter de la Información</th>
                        <th>Amparo</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js-datatables')
    @include('layouts.js.js-datatables')
@endsection