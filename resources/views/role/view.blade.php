@extends('layouts.app')

@section('title', 'Editar Rol')    

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Permisos</h6>
                </div>
                <div class="card-body">
                  {!! Form::model($role, ['method' => 'POST','route' => ['role.update', $role->id]]) !!}
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Nombre:</strong>
                              {!! Form::text('name', null, array('placeholder' => 'Nombre del rol','class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Permisos:</strong>
                              <br/>
                              @foreach($permission as $value)
                                  <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                  {{ $value->display_name }}</label>
                              <br/>
                              @endforeach
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                      </div>
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
