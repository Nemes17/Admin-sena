<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
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
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|max:255',
            'area_id'            => 'nullable',
            'training_center_id' => 'nullable',
            'user_id'            => 'nullable',
        ]);

        $teacher = Teacher::create($data);

        return response()->json($teacher, 201);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|max:255',
            'area_id'            => 'nullable',
            'training_center_id' => 'nullable',
            'user_id'            => 'nullable',
        ]);

        $teacher->update($data);

        return response()->json($teacher);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json(['message' => 'Instructor eliminado correctamente']);
    }
}
