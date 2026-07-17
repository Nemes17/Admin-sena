<?php
//no debe tener nada
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\CourseTeacher;

class CourseTeacherController extends Controller
{
    //
     public function index(){
        $assignments = CourseTeacher::all();
        return view('course_teacher.index', compact('assignments'));
    }

    public function create(){
        $courses  = Course::all();
        $teachers = Teacher::all();
        return view('course_teacher.create', compact('courses', 'teachers'));
    }

    public function store(Request $request){
        $assignment = new CourseTeacher();
        $assignment->course_id  = $request->course_id;
        $assignment->teacher_id = $request->teacher_id;
        $assignment->save();

        return redirect()->route('course_teacher.index')
                         ->with('success', 'Instructor asignado correctamente');
    }

    public function destroy($id){
        $assignment = CourseTeacher::find($id);
        $assignment->delete();

        return redirect()->route('course_teacher.index')
                         ->with('success', 'Asignación eliminada correctamente');
    }
}
