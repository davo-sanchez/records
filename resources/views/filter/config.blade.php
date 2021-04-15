@extends('layouts.app')

@section('title', 'Configuración de filtro')

@section('content')
 <!-- DataTales Filter -->
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Configurar Filtro</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('filter.store') }}" method="post" class="p-2">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="campo">{{ __('Campo') }}</label>
                            <select name="campo" id="campo" class="form-control @error('campo') is-invalid @enderror">
                                <option value="..." selected disabled>...</option>
                                <option value="year">Año</option>
                            </select>
                                @error('campo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="name">{{ __('Condición') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="name">{{ __('Valor') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                            
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                </div>
            </form>    
        </div>
     </div>
</div>

@endsection
