@extends('layouts.app')

@section('title', 'Nuevo Filtro')

@section('content')
 <!-- DataTales Filter -->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page">
              <a href="{{ route('filter.index') }}">Filtros</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Nuevo Filtro</li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nuevo Filtro</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('filter.store') }}" method="post" class="p-2">
                @csrf
            
                <div class="form-group row">
                    <label for="name">{{ __('Nombre') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="description">{{ __('Descripción') }}</label>
            
                        <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                </div>
            </form>    
        </div>
     </div>
</div>

@endsection
