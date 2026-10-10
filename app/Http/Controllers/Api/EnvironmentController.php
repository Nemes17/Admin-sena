<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    //

     public function consulta1()
    {
        return response()->json(Environment::with(['training_center', 'computers'])->get());
    }

    public function index()
    {
        return response()->json(Environment::with('training_center')->get());
    }

    public function show(Environment $environment)
    {
        return response()->json($environment->load('training_center'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'capacity'           => 'nullable|integer',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        return response()->json(Environment::create($data), 201);
    }

    public function update(Request $request, Environment $environment)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'capacity'           => 'nullable|integer',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $environment->update($data);

        return response()->json($environment);
    }

    public function destroy(Environment $environment)
    {
        $environment->delete();

        return response()->json(['message' => 'Ambiente eliminado correctamente']);
    }
    
}
