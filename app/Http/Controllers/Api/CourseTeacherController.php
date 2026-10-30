<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseTeacher;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    public function consulta1()
    {
        $respuesta = CourseTeacher::with(['course', 'teacher'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(CourseTeacher::with(['course', 'teacher'])->get());
    }

    public function show(CourseTeacher $course_teacher)
    {
        return response()->json($course_teacher->load(['course', 'teacher']));
    }

    public function store(Request $request)
    {
        $assignment = CourseTeacher::create($request->all());

        return response()->json($assignment, 201);
    }

    public function update(Request $request, CourseTeacher $course_teacher)
    {
        $course_teacher->update($request->all());

        return response()->json($course_teacher);
    }

    public function destroy(CourseTeacher $course_teacher)
    {
        $course_teacher->delete();

        return response()->json($course_teacher);
    }
}
