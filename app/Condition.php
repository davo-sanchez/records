<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [
        'filter_id',
        'field',
        'operator',
        'value'
    ];
}
