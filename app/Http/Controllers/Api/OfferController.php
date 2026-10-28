<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function consulta1()
    {
        $respuesta = Offer::with(['area', 'courses.training_center', 'courses.environment'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Offer::with('area')->withCount('courses')->get());
    }

    public function show(Offer $offer)
    {
        return response()->json($offer->load(['area', 'courses']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:255',
            'level'           => 'required|string',
            'description'     => 'nullable|string',
            'area_id'         => 'nullable',
            'duration_months' => 'nullable|integer',
            'status'          => 'nullable|string',
        ]);

        $offer = Offer::create($data);

        return response()->json($offer, 201);
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:255',
            'level'           => 'required|string',
            'description'     => 'nullable|string',
            'area_id'         => 'nullable',
            'duration_months' => 'nullable|integer',
            'status'          => 'nullable|string',
        ]);

        $offer->update($data);

        return response()->json($offer);
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return response()->json(['message' => 'Oferta eliminada correctamente']);
    }
}
