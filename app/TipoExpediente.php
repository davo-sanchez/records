<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expediente;

class TipoExpediente extends Model
{
    protected $primaryKey = 'tipo_expediente_id';

    protected $table = 'tipos_expedientes';

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}
