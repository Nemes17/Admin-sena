<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function consulta1()
    {
        $respuesta = Teacher::with(['area', 'training_center', 'courses', 'user'])->get();
        return response()->json($respuesta);
    }

    public function home($user)
    {
        $teacher = Teacher::with(['area', 'training_center', 'courses.area', 'courses.training_center'])
            ->where('user_id', $user)
            ->first();

        return response()->json($teacher);
    }

    public function aprendices($course)
    {
        $course = Course::with(['area', 'training_center', 'apprentices.computer'])->find($course);

        return response()->json($course);
    }

    public function index()
    {
        return response()->json(Teacher::with(['area', 'training_center'])->get());
    }

    public function show(Teacher $teacher)
    {
        return response()->json($teacher->load(['area', 'training_center', 'courses', 'user']));
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());

        return response()->json($teacher, 201);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());

        return response()->json($teacher);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json($teacher);
    }
}
