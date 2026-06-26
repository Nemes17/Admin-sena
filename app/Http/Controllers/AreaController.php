<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
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
