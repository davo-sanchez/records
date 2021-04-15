<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilter;
use App\Filter;
use App\Condition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        return view('filter.index',[
            'filters' => Filter::all()
        ]);
    }

    public function create(){

        return view('filter.create');
    }

    public function store(StoreFilter $request){

        $filter = new Filter;

        $filter->name = $request->name;
        $filter->slug = Str::slug($request->name,'-');
        $filter->description = $request->description;
        $filter->creator_id = Auth::user()->id;

        $filter->save();

        return back();

    }

    public function configuration($filter){
        return view('filter.config', [
            'filter' => $filter,
            'values' => Condition::where('filter_id','=',$filter)
        ]);
    }
}
