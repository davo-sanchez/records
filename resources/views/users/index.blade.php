@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('css-datatables')
    @include('layouts.css.css-datatables')
@endsection

@section('content')

<a href="{{ route('register') }}" class="mb-3 btn btn-primary">
    Nuevo
</a>

 <!-- DataTales Filter -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $user_role)
                                    {{ $user_role->name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('user.view' ,['id' => $user->id]) }}"><i class="fas fa-edit"></i></a>
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