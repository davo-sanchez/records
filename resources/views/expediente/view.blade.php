@extends('layouts.app')

@section('title', 'Expediente')    

@section('content')

  @if (session('status'))

  <div class="row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="alert alert-success" role="alert">
        <a href="#" class="alert-link">{{ session('status') }}</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
  @endif

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 p-0">
          @can('expedientes.create')

          <a href="{{ route('expediente.create') }}" class=" mb-3 btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Nuevo</span>
        </a>
          @endcan
            <div class="card">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Expediente creado por: {{ $expediente->creator->name }}</h6>
                </div>
                <div class="card-body">

                  <form id="expformdelete" style="display: none;" action="{{ route('expediente.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="expid" value="{{ $expediente->expediente_id }}">
                  </form>

                  <form action="{{ route('expediente.update') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="expid" value="{{ $expediente->expediente_id }}">
                    <div class="form-group">
                      <label for="num_caja">N° Caja</label>
                      <input type="text" class="form-control @error('num_caja') is-invalid @enderror" name="num_caja" id="num_caja" aria-describedby="num_cajaHelp" value="{{ $expediente->num_caja }}">
                      <div class="invalid-feedback">@error('num_caja') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="tipo_exp">Clasificación</label>
                      <select class="form-control @error('tipo_exp') is-invalid @enderror" id="tipo_exp" name="tipo_exp">
                        <option selected disabled>...</option>
                        @foreach ($tipos as $t)
                            <option value="{{ $t->tipo_expediente_id }}" @if($t->tipo_expediente_id == $expediente->tipo->tipo_expediente_id) selected @endif>{{ $t->nombre_tipo_expediente }}</option>  
                        @endforeach
                      </select>
                      <div class="invalid-feedback">@error('tipo_exp') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="num_exp">N° Expediente</label>
                      <input type="text" class="form-control @error('num_exp') is-invalid @enderror" name="num_exp" id="num_exp" aria-describedby="ncajaHelp" value="{{ $expediente->num_exp }}">
                      <div class="invalid-feedback">@error('num_exp') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="n_junta">N° Junta</label>
                      <input type="text" class="form-control @error('n_junta') is-invalid @enderror" name="n_junta" id="n_junta" aria-describedby="n_juntaHelp" value="{{ $expediente->n_junta }}">
                      <div class="invalid-feedback">@error('n_junta') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="ano">Año</label>
                      <input type="number" min="2000" class="form-control @error('ano') is-invalid @enderror" name="ano" id="ano" aria-describedby="anoHelp" value="{{ $expediente->ano }}">
                      <div class="invalid-feedback">@error('ano') {{ $message }} @enderror</div>
                    </div>
<!--
                    <div class="form-group">
                      <label for="adicional">Adicional</label>
                      <input type="text" class="form-control @error('adicional') is-invalid @enderror" name="adicional" id="adicional" aria-describedby="adicionalHelp" value="{{ $expediente->adicional }}">
                      <div class="invalid-feedback">@error('adicional') {{ $message }} @enderror</div>
                    </div>-->

                    <div class="form-group">
                      <label for="actor">Actor</label>
                      <input type="text" class="form-control @error('actor') is-invalid @enderror" name="actor" id="actor" aria-describedby="actorHelp" value="{{ $expediente->actor }}">
                      <div class="invalid-feedback">@error('actor') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="demandado">Demandado</label>
                      <input type="text" class="form-control @error('demandado') is-invalid @enderror" name="demandado" id="demandado" aria-describedby="demandadoHelp" value="{{ $expediente->demandado }}">
                      <div class="invalid-feedback">@error('demandado') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="concepto">Concepto</label>
                      <input type="text" class="form-control @error('concepto') is-invalid @enderror" name="concepto" id="concepto" aria-describedby="conceptoHelp" value="{{ $expediente->concepto }}">
                      <div class="invalid-feedback">@error('concepto') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="procedencia">Procedencia</label>
                      <input type="text" class="form-control @error('procedencia') is-invalid @enderror" name="procedencia" id="procedencia" aria-describedby="procedenciaHelp" value="{{ $expediente->procedencia }}">
                      <div class="invalid-feedback">@error('procedencia') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="tiempo_archivo">Tiempo/Archivo</label>
                      <input type="text" class="form-control @error('tiempo_archivo') is-invalid @enderror" name="tiempo_archivo" id="tiempo_archivo" aria-describedby="tiempo_archivoHelp" value="{{ $expediente->tiempo_archivo }}">
                      <div class="invalid-feedback">@error('tiempo_archivo') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="num_legajos">Legajos</label>
                      <input type="text" class="form-control @error('num_legajos') is-invalid @enderror" name="num_legajos" id="num_legajos" aria-describedby="num_legajosHelp" value="{{ $expediente->num_legajos }}">
                      <div class="invalid-feedback">@error('num_legajos') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="num_hojas">Hojas</label>
                      <input type="number" min="1" class="form-control @error('num_hojas') is-invalid @enderror" name="num_hojas" id="num_hojas" aria-describedby="num_hojasHelp" value="{{ $expediente->num_hojas }}">
                      <div class="invalid-feedback">@error('num_hojas') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="observaciones">Observaciones</label>
                      <textarea class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones" rows="4">{{ $expediente->observaciones }}</textarea>
                      <div class="invalid-feedback">@error('observaciones') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="fecha_apertura">Fecha de apertura</label>
                      <input type="date" class="form-control @error('fecha_apertura') is-invalid @enderror" name="fecha_apertura" id="fecha_apertura" aria-describedby="fecha_aperturaHelp" value="{{ $expediente->fecha_apertura }}">
                      <div class="invalid-feedback">@error('fecha_apertura') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="fecha_cierre">Fecha de cierre</label>
                      <input type="date" class="form-control @error('fecha_cierre') is-invalid @enderror" name="fecha_cierre" id="fecha_cierre" aria-describedby="fecha_cierreHelp" value="{{ $expediente->fecha_cierre }}">
                      <div class="invalid-feedback">@error('fecha_cierre') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-check pb-3">
                      <input class="form-check-input" type="checkbox" @if($expediente->amparo) checked @endif value="checked" id="amparo" name="amparo">
                      <label class="form-check-label" for="amparo">
                        ¿Tiene Amparo?
                      </label>
                    </div>

                    <div class="form-group">
                      <label for="holder">En posesión de:</label>
                      <select class="form-control @error('holder') is-invalid @enderror" id="holder" name="holder">
                        <option selected disabled>...</option>
                        @foreach ($holders as $holder)
                        <option value="{{ $holder->id }}" @if($holder->id == $expediente->holder->id) selected @endif>{{ $holder->name }}</option>  
                        @endforeach
                      </select>
                      <div class="invalid-feedback">@error('holder') {{ $message }} @enderror</div>
                    </div>

                    <div class="row">
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xs-6">
                        @can('expedientes.create')
                        <button type="submit" class="btn btn-success btn-block">
                          <i class="fas fa-sync"></i>
                          Actualizar
                        </button>
                        @endcan
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xs-6">
                        @can('expedientes.destroy')
                        <button type="submit" form="expformdelete" class="btn btn-outline-danger btn-block">
                          <i class="fas fa-trash"></i>
                          Enviar a papelera </button>
                        @endcan
                      </div>  
                    </div>
                  </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 p-3 mt-4">


        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bitácora de eventos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Evento</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                        </thead>
                        <tbody>
                            @foreach ($history as $h)
                                <tr>
                                    <td>{{ $h->message }}</td>
                                    <td>{{ $h->types->nombre_tipo_expediente }} <br> 
                                    {{ date('d-M-y H:m:s', strtotime($h->created_at)) }}
                                    </td>
                                    <td>{{ $h->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $history->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection
