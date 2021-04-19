@extends('layouts.app')

@section('title', 'Listado de Filtros')

@section('css-datatables')
    @include('layouts.css.css-datatables')
@endsection

@section('content')

<a href="{{ route('filter.create') }}" class="mb-3 btn btn-primary">
    Nuevo
</a>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
          Filtros
      </li>
    </ol>
  </nav>

 <!-- DataTales Filter -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Filtros</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Creado por</th>
                        <th>Fecha de Creación</th>
                        <th>Última de Modificación</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filters as $f)
                        <tr class='table-row'>
                            <td>{{ $f->name }}</td>
                            <td>{{ $f->description }}</td>
                            <td>{{ $f->creator->name }}</td>
                            <td>{{ $f->created_at }}</td>
                            <td>{{ $f->updated_at }}</td>
                            <td>
                                <a class="edit-row-btn" href="{{ route('filter.config',['filter' => $f->id]) }}"><i class="fas fa-cogs"></i></a>
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