<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Environment;
use App\Models\Training_center;

class EnvironmentController extends Controller
{
    //
    // Lista todos los ambientes con su centro de formación
    public function index(){
        $environments = Environment::with('training_center')->get();
        return view('environment.index', compact('environments'));
    }

    // Muestra el detalle de un ambiente con sus computadores
    public function show($id){
        $environment = Environment::with('training_center', 'computers')->find($id);
        return view('environment.show', compact('environment'));
    }

    // Muestra el formulario de creación
    public function create(){
        $trainingCenters = Training_center::all();
        return view('environment.create', compact('trainingCenters'));
    }

    // Guarda el nuevo ambiente en la base de datos
    public function store(Request $request){
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'capacity'            => 'nullable|integer|min:0',
            'training_center_id'  => 'nullable|exists:training_centers,id',
        ]);

        Environment::create($data);

        return redirect()->route('environment.index')
                         ->with('success', 'Ambiente creado correctamente');
    }

    // Muestra el formulario de edición
    public function edit(Environment $environment)
    {
        return view('environment.edit', [
            'environment'     => $environment,
            'trainingCenters' => Training_center::all(),
        ]);
    }

    // Actualiza los datos del ambiente
    public function update(Request $request, Environment $environment)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'capacity'            => 'nullable|integer|min:0',
            'training_center_id'  => 'nullable|exists:training_centers,id',
        ]);
        $environment->update($data);

        return redirect()->route('environment.index')
                         ->with('success', 'Ambiente actualizado correctamente.');
    }

    // Elimina el ambiente
    public function destroy(Environment $environment)
    {
        $environment->delete();

        return redirect()->route('environment.index')
                         ->with('success', 'Ambiente eliminado correctamente.');
    }
}
