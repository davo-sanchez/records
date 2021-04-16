@extends('layouts.app')

@section('title', 'Roles')

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
        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
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