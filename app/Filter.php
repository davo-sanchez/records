<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'creator_id'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }
}
