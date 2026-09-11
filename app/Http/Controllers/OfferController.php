<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Area;

class OfferController extends Controller
{
    // Lista todas las ofertas con su área y número de fichas
    public function index(){
        $offers = Offer::with('area')->withCount('courses')->get();
        return view('offer.index', compact('offers'));
    }

    // Muestra el detalle de una oferta con sus fichas
    public function show($id){
        $offer = Offer::with('area', 'courses.training_center', 'courses.environment', 'courses.apprentices')->find($id);
        return view('offer.show', compact('offer'));
    }

    // Muestra el formulario de creación
    public function create(){
        $areas = Area::all();
        return view('offer.create', compact('areas'));
    }

    // Guarda la nueva oferta en la base de datos
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

    // Muestra el formulario de edición
    public function edit(Offer $offer)
    {
        return view('offer.edit', [
            'offer' => $offer,
            'areas' => Area::all(),
        ]);
    }

    // Actualiza los datos de la oferta
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

    // Elimina la oferta
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offer.index')->with('success', 'Oferta eliminada correctamente.');
    }
}

