<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Environment;
use App\Models\Training_center;

class EnvironmentController extends Controller
{
    //
    
    public function index(){
        $environments = Environment::with('training_center')->get();
        return view('environment.index', compact('environments'));
    }

    
    public function show($id){
        $environment = Environment::with('training_center', 'computers')->find($id);
        return view('environment.show', compact('environment'));
    }

    
    public function create(){
        $trainingCenters = Training_center::all();
        return view('environment.create', compact('trainingCenters'));
    }

    
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

    
    public function edit(Environment $environment)
    {
        return view('environment.edit', [
            'environment'     => $environment,
            'trainingCenters' => Training_center::all(),
        ]);
    }

    
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

    
    public function destroy(Environment $environment)
    {
        $environment->delete();

        return redirect()->route('environment.index')
                         ->with('success', 'Ambiente eliminado correctamente.');
    }
}
