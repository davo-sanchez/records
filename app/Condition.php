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

    private $keys = [];

    private $where = [];

    public function get($filter){
        $conditions = Condition::where('filter_id',$filter)->get();

        foreach($conditions as $condition) {

        }
    }
}
