<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Area;
use App\Models\Training_center;
use App\Models\Course;


class TeacherController extends Controller
{
    //
     public function create(){
        $areas           = Area::all();
        $trainingCenters = Training_center::all();
        $courses         = Course::all();
        return view('teacher.create', compact('areas', 'trainingCenters', 'courses'));
    }

    public function store(Request $request){
        $teacher                     = new Teacher();
        $teacher->name               = $request->name;
        $teacher->email              = $request->email;
        $teacher->area_id            = $request->area_id;
        $teacher->training_center_id = $request->training_center_id;
        $teacher->save();

        
        if($request->course_id){
            $teacher->courses()->attach($request->course_id);
        }

        return redirect()->route('teacher.create')->with('success', 'Instructor creado correctamente');
    }
}
