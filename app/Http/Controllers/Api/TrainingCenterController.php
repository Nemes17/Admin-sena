<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Training_center;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    
    public function consulta1()
    {
        $respuesta = Training_center::with(['courses', 'environments'])->get();
        return response()->json($respuesta);
    }

    
    public function index()
    {
        return response()->json(Training_center::all());
    }

    
    public function show(Training_center $training_center)
    {
        return response()->json($training_center);
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $trainingCenter = Training_center::create($data);

        return response()->json($trainingCenter, 201);
    }

    
    public function update(Request $request, Training_center $training_center)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $training_center->update($data);

        return response()->json($training_center);
    }

    
    public function destroy(Training_center $training_center)
    {
        $training_center->delete();

        return response()->json(['message' => 'Centro de formación eliminado correctamente']);
    }
}
