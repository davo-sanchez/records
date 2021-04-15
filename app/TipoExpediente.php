<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExpediente extends Model
{
    protected $primaryKey = 'tipo_expediente_id';

    protected $table = 'tipos_expedientes';
}
