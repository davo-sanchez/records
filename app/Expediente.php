<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $primaryKey = 'id_exp';

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
        'fecha_obs',
        'fecha_alta',
        'fecha_ult_mod'
    ];

    public $timestamps = false;
}
