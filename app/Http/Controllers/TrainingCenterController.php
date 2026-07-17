<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_Center;

class TrainingCenterController extends Controller
{
    public function index(){
    $trainingCenters = Training_center::all();
    return view('training_center.index', compact('trainingCenters'));
    }

    public function show($id){
    $trainingCenter = Training_center::find($id);
    return view('training_center.show', compact('trainingCenter'));
    }
    //
     public function create(){
        return view('training_center.create');
    }

    public function store(Request $request){
        $center = new Training_Center();
        $center->name     = $request->name;
        $center->location = $request->location;
        $center->save();

        return redirect()->route('training_center.index')
                         ->with('success', 'Centro de formación creado correctamente');
    }
    public function edit(Training_center $training_center)
    {
    return view('training_center.edit', [
        'trainingCenter' => $training_center,
    ]);
    }

    public function update(Request $request, Training_center $training_center)
    {
    $data = $request->validate([
        'name'     => 'required|string|max:255',
        'location' => 'required|string|max:255',
    ]);
    $training_center->update($data);
    return redirect()->route('training_center.create')
                     ->with('success', 'Centro actualizado correctamente.');
    }

    public function destroy(Training_center $training_center)
    {
    $training_center->delete();
    return redirect()->route('training_center.create')
                     ->with('success', 'Centro eliminado correctamente.');
    }
}
