@extends('layouts.app')

@section('title', 'Nuevo Rol')    

@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Rol: {{ $role->name }}</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('role.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="nameHelp">
                      <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Permisos</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('role.store') }}">
                    @csrf

                    <fieldset>
                        <legend>Expedientes</legend> 

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Consultar
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Consultar
                            </label>
                        </div>

                    </fieldset>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
