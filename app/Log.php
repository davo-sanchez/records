<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id',
        'message',
        'expediente',
        'type'
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function expedientes(){
        return $this->hasOne('App\Expediente','expediente_id','expediente');
    }

    public function types(){
        return $this->hasOne('App\TipoExpediente','tipo_expediente_id','type');
    }
}
