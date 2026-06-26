<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Area;
use App\Models\Training_center;
use App\Models\Teacher;
use App\Models\Apprentice;

class CourseController extends Controller
{
    //
    public function create(){
        $areas           = Area::all();
        $trainingCenters = Training_center::all();
        $teachers        = Teacher::all();
        return view('course.create', compact('areas', 'trainingCenters', 'teachers'));
    }

    public function store(Request $request){
        $course                     = new Course();
        $course->{'course_number'}  = $request->course_number;
        $course->day                = $request->day;
        $course->area_id            = $request->area_id;
        $course->training_center_id = $request->training_center_id;
        $course->save();

        // Relación muchos a muchos con teachers
        if($request->teacher_id){
            $course->teachers()->attach($request->teacher_id);
        }

        return redirect()->route('course.create')->with('success', 'Curso creado correctamente');
    }
}
