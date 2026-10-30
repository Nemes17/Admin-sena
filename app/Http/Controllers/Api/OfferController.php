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
        $offer = Offer::create($request->all());

        return response()->json($offer, 201);
    }

    public function update(Request $request, Offer $offer)
    {
        $offer->update($request->all());

        return response()->json($offer);
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return response()->json($offer);
    }
}
