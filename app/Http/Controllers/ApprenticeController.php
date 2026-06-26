<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    //
     public function create(){
        $courses   = Course::all();
        $computers = Computer::all();
        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request){
        $apprentice                = new Apprentice();
        $apprentice->name          = $request->name;
        $apprentice->email         = $request->email;
        $apprentice->{'cell_number'} = $request->cell_number;
        $apprentice->course_id     = $request->course_id;
        $apprentice->computer_id   = $request->computer_id;
        $apprentice->save();

        return redirect()->route('apprentice.create')
                         ->with('success', 'Aprendiz creado correctamente');
    }
}
