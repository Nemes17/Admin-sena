<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function consulta1()
    {
        $respuesta = Incident::with(['environment', 'computer', 'reportedBy'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Incident::with(['environment', 'computer', 'reportedBy'])->get());
    }

    public function show(Incident $incident)
    {
        return response()->json($incident->load(['environment', 'computer', 'reportedBy']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description'    => 'required|string',
            'status'         => 'nullable|string',
            'environment_id' => 'nullable',
            'computer_id'    => 'nullable',
            'reported_by'    => 'nullable',
            'resolved_at'    => 'nullable',
        ]);

        $incident = Incident::create($data);

        return response()->json($incident, 201);
    }

    public function update(Request $request, Incident $incident)
    {
        $data = $request->validate([
            'description'    => 'required|string',
            'status'         => 'nullable|string',
            'environment_id' => 'nullable',
            'computer_id'    => 'nullable',
            'reported_by'    => 'nullable',
            'resolved_at'    => 'nullable',
        ]);

        $incident->update($data);

        return response()->json($incident);
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return response()->json(['message' => 'Novedad eliminada correctamente']);
    }
}
