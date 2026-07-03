<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

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
        $center = new TrainingCenter();
        $center->name     = $request->name;
        $center->location = $request->location;
        $center->save();

        return redirect()->route('training_center.create')
                         ->with('success', 'Centro de formación creado correctamente');
    }
}
