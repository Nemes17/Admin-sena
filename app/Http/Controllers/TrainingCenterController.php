<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
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
