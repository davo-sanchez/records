<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TipoExpediente;

class Expediente extends Model
{
    use SoftDeletes;

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
        'fecha_apertura',
        'fecha_cierre',
        'creator_id',
        'holder',
        'amparo',
        'cerrado'
    ];

    protected $dates = ['deleted_at'];

    public function tipo(){
        return $this->hasOne('App\TipoExpediente','tipo_expediente_id','tipo_exp');
    }

    public function creator(){
        return $this->hasOne('App\User','id','creator_id');
    }

    public function holder(){
        return $this->hasOne('App\Holder','id','holder_id');
    }
}
