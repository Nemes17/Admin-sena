<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class CourseTeacherController extends Controller
{
    //
     public function create(){
        $courses  = Course::all();
        $teachers = Teacher::all();
        return view('course_teacher.create', compact('courses', 'teachers'));
    }

    public function store(Request $request){
        $course = Course::find($request->course_id);
        
        
        $course->teachers()->attach($request->teacher_id);

        return redirect()->route('course_teacher.create')->with('success', 'Instructor asignado correctamente');
    }
}
