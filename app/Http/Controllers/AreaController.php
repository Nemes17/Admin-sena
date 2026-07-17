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

        return redirect()->route('area.index')
                         ->with('success', 'Área creada correctamente');
    }
    public function edit(Area $area)
    {
    return view('area.edit', [
        'area' => $area,
    ]);
    }

    public function update(Request $request, Area $area)
    {
    $data = $request->validate([
        'name' => 'required|string|max:255',
    ]);
    $area->update($data);
    return redirect()->route('area.create')
                     ->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(Area $area)
    {
    $area->delete();
    return redirect()->route('area.create')
                     ->with('success', 'Área eliminada correctamente.');
    }
}
