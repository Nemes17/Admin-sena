<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function consulta1()
    {
        $respuesta = Course::with(['area', 'training_center', 'environment', 'offer', 'teachers', 'apprentices'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Course::with(['area', 'training_center', 'environment', 'offer'])->get());
    }

    public function show(Course $course)
    {
        return response()->json($course->load(['area', 'training_center', 'environment', 'offer', 'teachers', 'apprentices']));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());

        return response()->json($course, 201);
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return response()->json($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json($course);
    }
}
