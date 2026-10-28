<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Area;
use App\Models\Training_center;
use App\Models\Course;
use App\Models\Apprentice;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
   
    public function home(){
        $teacher = Teacher::where('user_id', Auth::id())->first();
        $courses = $teacher
            ? $teacher->courses()->with('area', 'training_center')->get()
            : collect();

        return view('teacher.home', compact('teacher', 'courses'));
    }

    
    public function misAprendices(Course $course){
        $teacher = Teacher::where('user_id', Auth::id())->first();

        
        if (!$teacher || !$teacher->courses->contains($course->id)) {
            abort(403, 'No tienes permiso para ver los aprendices de este curso.');
        }

        $apprentices = Apprentice::where('course_id', $course->id)->with('computer')->get();

        return view('teacher.students', compact('course', 'apprentices'));
    }

    public function index(){
    $teachers = Teacher::all();
    return view('teacher.index', compact('teachers'));
    }

    public function show($id){
        $teacher = Teacher::findOrFail($id);
        return view('teacher.show', compact('teacher'));
    }
    
     public function create(){
        $areas           = Area::all();
        $trainingCenters = Training_center::all();
        return view('teacher.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request){
        $teacher                     = new Teacher();
        $teacher->name               = $request->name;
        $teacher->email              = $request->email;
        $teacher->area_id            = $request->area_id;
        $teacher->training_center_id = $request->training_center_id;
        $teacher->save();
        return redirect()->route('teacher.index')->with('success', 'Instructor creado correctamente');
    }
    public function edit(Teacher $teacher)
    {
    return view('teacher.edit', [
        'teacher'         => $teacher,
        'areas'           => Area::all(),
        'trainingCenters' => Training_center::all(),
        'courses'         => Course::all(),
    ]);
    }
 
    public function update(Request $request, Teacher $teacher)
    {
    $data = $request->validate([
        'name'               => 'required|string|max:255',
        'email'              => 'required|email|max:255',
        'area_id'            => 'nullable|exists:areas,id',
        'training_center_id' => 'nullable|exists:training_centers,id',
    ]);
    $teacher->update($data);
    return redirect()->route('teacher.create')
                     ->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(Teacher $teacher)
    {
    $teacher->delete();
    return redirect()->route('teacher.create')
                     ->with('success', 'Instructor eliminado correctamente.');
    }
}
