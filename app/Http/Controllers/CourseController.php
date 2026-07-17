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
    public function index(){
    $courses = Course::all();
    return view('course.index', compact('courses'));
    }

    public function show($id){
    $course = Course::find($id);
    return view('course.show', compact('course'));
    }
    
    public function create(){
        $areas           = Area::all();
        $trainingCenters = Training_center::all();
        return view('course.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request){
        $course                     = new Course();
        $course->course_number      = $request->course_number;
        $course->day                = $request->day;
        $course->area_id            = $request->area_id;
        $course->training_center_id = $request->training_center_id;
        $course->save();
        return redirect()->route('course.index')->with('success', 'Curso creado correctamente');
    }
    public function edit(Course $course)
    {
    return view('course.edit', [
        'course'          => $course,
        'areas'           => Area::all(),
        'trainingCenters' => Training_center::all(),
        'teachers'        => Teacher::all(),
    ]);
    }

    public function update(Request $request, Course $course)
    {
    $data = $request->validate([
        'course_number'       => 'required|integer',
        'day'                 => 'required|date',
        'area_id'             => 'nullable|exists:areas,id',
        'training_center_id'  => 'nullable|exists:training_centers,id',
    ]);
    $course->update($data);
    return redirect()->route('course.create')
                     ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Course $course)
    {
    $course->delete();
    return redirect()->route('course.create')
                     ->with('success', 'Curso eliminado correctamente.');
    }
}
