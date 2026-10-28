<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Area;

class OfferController extends Controller
{
    public function index(){
        $offers = Offer::with('area')->withCount('courses')->get();
        return view('offer.index', compact('offers'));
    }

    public function show($id){
        $offer = Offer::with('area', 'courses.training_center', 'courses.environment', 'courses.apprentices')->find($id);
        return view('offer.show', compact('offer'));
    }

    public function create(){
        $areas = Area::all();
        return view('offer.create', compact('areas'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'level'            => 'required|in:tecnico,tecnologo',
            'description'      => 'nullable|string',
            'area_id'          => 'nullable|exists:areas,id',
            'duration_months'  => 'nullable|integer|min:1',
            'status'           => 'required|in:abierta,cerrada',
        ]);

        Offer::create($data);

        return redirect()->route('offer.index')->with('success', 'Oferta creada correctamente');
    }

    public function edit(Offer $offer)
    {
        return view('offer.edit', [
            'offer' => $offer,
            'areas' => Area::all(),
        ]);
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'level'            => 'required|in:tecnico,tecnologo',
            'description'      => 'nullable|string',
            'area_id'          => 'nullable|exists:areas,id',
            'duration_months'  => 'nullable|integer|min:1',
            'status'           => 'required|in:abierta,cerrada',
        ]);
        $offer->update($data);

        return redirect()->route('offer.index')->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offer.index')->with('success', 'Oferta eliminada correctamente.');
    }
}

