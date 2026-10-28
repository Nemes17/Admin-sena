<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrative;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{
    public function consulta1()
    {
        $respuesta = Administrative::with('user')->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Administrative::with('user')->get());
    }

    public function show(Administrative $administrative)
    {
        return response()->json($administrative->load('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'document_type'   => 'required|string|max:20',
            'document_number' => 'required|string|max:30',
            'names'           => 'required|string|max:60',
            'last_names'      => 'required|string|max:60',
            'position'        => 'required|string|max:50',
            'user_id'         => 'nullable',
        ]);

        $administrative = Administrative::create($data);

        return response()->json($administrative, 201);
    }

    public function update(Request $request, Administrative $administrative)
    {
        $data = $request->validate([
            'document_type'   => 'required|string|max:20',
            'document_number' => 'required|string|max:30',
            'names'           => 'required|string|max:60',
            'last_names'      => 'required|string|max:60',
            'position'        => 'required|string|max:50',
            'user_id'         => 'nullable',
        ]);

        $administrative->update($data);

        return response()->json($administrative);
    }

    public function destroy(Administrative $administrative)
    {
        $administrative->delete();

        return response()->json(['message' => 'Administrativo eliminado correctamente']);
    }
}
