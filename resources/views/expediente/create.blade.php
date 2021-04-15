@extends('layouts.app')

@section('title', 'Nuevo Expediente')    

@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Nuevo Expediente
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="num_caja">N° Caja</label>
                      <input type="text" class="form-control @error('num_caja') is-invalid @enderror" name="num_caja" id="num_caja" aria-describedby="num_cajaHelp">
                      <div class="invalid-feedback">@error('num_caja') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="tipo_exp">Clasificación</label>
                      <select class="form-control" id="tipo_exp" name="tipo_exp">
                        <option value="0" selected disabled>...</option>
                        @foreach ($tipos as $t)
                            <option value="{{ $t->tipo_expediente_id }}">{{ $t->nombre_tipo_expediente }}</option>  
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="num_exp">N° Expediente</label>
                      <input type="text" class="form-control @error('num_exp') is-invalid @enderror" name="num_exp" id="num_exp" aria-describedby="ncajaHelp">
                      <div class="invalid-feedback">@error('num_exp') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="n_junta">N° Junta</label>
                      <input type="text" class="form-control @error('n_junta') is-invalid @enderror" name="n_junta" id="n_junta" aria-describedby="n_juntaHelp">
                      <div class="invalid-feedback">@error('n_junta') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="ano">Año</label>
                      <input type="text" class="form-control @error('ano') is-invalid @enderror" name="ano" id="ano" aria-describedby="anoHelp">
                      <div class="invalid-feedback">@error('ano') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="adicional">Adicional</label>
                      <input type="text" class="form-control @error('adicional') is-invalid @enderror" name="adicional" id="adicional" aria-describedby="adicionalHelp">
                      <div class="invalid-feedback">@error('adicional') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="actor">Actor</label>
                      <input type="text" class="form-control @error('actor') is-invalid @enderror" name="actor" id="actor" aria-describedby="actorHelp">
                      <div class="invalid-feedback">@error('actor') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="demandado">Demandado</label>
                      <input type="text" class="form-control @error('demandado') is-invalid @enderror" name="demandado" id="demandado" aria-describedby="demandadoHelp">
                      <div class="invalid-feedback">@error('demandado') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="concepto">Concepto</label>
                      <input type="text" class="form-control @error('concepto') is-invalid @enderror" name="concepto" id="concepto" aria-describedby="conceptoHelp">
                      <div class="invalid-feedback">@error('concepto') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="procedencia">Procedencia</label>
                      <input type="text" class="form-control @error('procedencia') is-invalid @enderror" name="procedencia" id="procedencia" aria-describedby="procedenciaHelp">
                      <div class="invalid-feedback">@error('procedencia') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="tiempo_archivo">Tiempo/Archivo</label>
                      <input type="text" class="form-control @error('tiempo_archivo') is-invalid @enderror" name="tiempo_archivo" id="tiempo_archivo" aria-describedby="tiempo_archivoHelp">
                      <div class="invalid-feedback">@error('tiempo_archivo') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="num_legajos">Legajos</label>
                      <input type="text" class="form-control @error('num_legajos') is-invalid @enderror" name="num_legajos" id="num_legajos" aria-describedby="num_legajosHelp">
                      <div class="invalid-feedback">@error('num_legajos') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="num_hojas">Hojas</label>
                      <input type="text" class="form-control @error('num_hojas') is-invalid @enderror" name="num_hojas" id="num_hojas" aria-describedby="num_hojasHelp">
                      <div class="invalid-feedback">@error('num_hojas') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="observaciones">Observaciones</label>
                      <textarea class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones" rows="4">

                      </textarea>
                      <div class="invalid-feedback">@error('observaciones') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                      <label for="fecha_obs">Fecha de referencia</label>
                      <input type="date" class="form-control @error('fecha_obs') is-invalid @enderror" name="fecha_obs" id="fecha_obs" aria-describedby="fecha_obsHelp">
                      <div class="invalid-feedback">@error('fecha_obs') {{ $message }} @enderror</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
