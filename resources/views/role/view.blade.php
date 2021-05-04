@extends('layouts.app')

@section('title', 'Nuevo Rol')    

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Permisos de Rol: {{ $role->name }}</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="">
                    @csrf

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="nameHelp" value="{{ $role->name }}">
                      <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <div class="row p-3">
                      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-0">
                        <fieldset>
                          <legend>Expedientes</legend> 
  
                          @foreach ($expediente_permissions as $ep)
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="{{ $ep->name }}" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                {{ $ep->display_name }}
                              </label>
                          </div>
                          @endforeach
  
                        </fieldset>
                      </div>
  
                      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-0">
                        <fieldset>
                          <legend>Usuarios</legend> 
  
                          @foreach ($user_permissions as $up)
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="{{ $up->name }}" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                {{ $up->display_name }}
                              </label>
                          </div>
                          @endforeach
  
                        </fieldset>
                      </div>
  
                      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-0">
                        <fieldset>
                          <legend>Roles</legend> 
  
                          @foreach ($role_permissions as $rp)
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="{{ $rp->name }}" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                {{ $rp->display_name }}
                              </label>
                          </div>
                          @endforeach
  
                        </fieldset>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                  </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
