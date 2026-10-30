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
        $incident = Incident::create($request->all());

        return response()->json($incident, 201);
    }

    public function update(Request $request, Incident $incident)
    {
        $incident->update($request->all());

        return response()->json($incident);
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return response()->json($incident);
    }
}
