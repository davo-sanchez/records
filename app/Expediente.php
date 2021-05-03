<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoExpediente;

class Expediente extends Model
{
    protected $primaryKey = 'expediente_id';

    protected $table = 'expedientes';

    protected $fillable = [
        'num_caja',
        'tipo_exp',
        'num_exp',
        'n_junta',
        'ano',
        'adicional',
        'actor',
        'demandado',
        'concepto',
        'procedencia',
        'tiempo_archivo',
        'num_legajos',
        'num_hojas',
        'observaciones',
        'fecha_obs'
    ];

    public function tipo(){
        return $this->hasOne('App\TipoExpediente','tipo_expediente_id','tipo_exp');
    }
}
