<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    public function consulta1()
    {
        $respuesta = Area::with(['courses', 'teachers'])->get();
        return response()->json($respuesta);
    }

    
    public function index()
    {
        return response()->json(Area::all());
    }

    
    public function show(Area $area)
    {
        return response()->json($area);
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::create($data);

        return response()->json($area, 201);
    }

    
    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area->update($data);

        return response()->json($area);
    }

    
    public function destroy(Area $area)
    {
        $area->delete();

        return response()->json(['message' => 'Área eliminada correctamente']);
    }
}