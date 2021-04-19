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

        $filter_id = Filter::where('slug',$filter->slug)->first()->id;

        return redirect()->route('filter.config',['filter' => Filter::where()]);

    }

    public function configuration($filter){
        return view('filter.config', [
            'filter' => Filter::findOrFail($filter),
            'values' => Condition::where('filter_id','=',$filter)
        ]);
    }
}
