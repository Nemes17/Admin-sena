<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index(){
    $areas = Area::all();
    return view('area.index', compact('areas'));
    }

    public function show($id){
    $area = Area::find($id);
    return view('area.show', compact('area'));
    }
    //GET
    public function create(){
        return view('area.create');
    }

    // POST - guarda en la tabla areas
    public function store(Request $request){
        $area = new Area();
        $area->name = $request->name;
        $area->save();

        return redirect()->route('area.create')
                         ->with('success', 'Área creada correctamente');
    }
}
