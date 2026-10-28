<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apprentice;
use App\Models\Offer;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function consulta1()
    {
        $respuesta = Apprentice::with(['course.area', 'course.training_center', 'computer', 'user'])->get();
        return response()->json($respuesta);
    }

    public function home($user)
    {
        $apprentice = Apprentice::with(['course.area', 'course.training_center', 'computer'])
            ->where('user_id', $user)
            ->first();

        return response()->json($apprentice);
    }

    public function ofertas()
    {
        $offers = Offer::with(['area', 'courses.training_center', 'courses.environment', 'courses.apprentices'])
            ->where('status', 'abierta')
            ->get();

        return response()->json($offers);
    }

    public function inscribirse($user, $course)
    {
        $apprentice = Apprentice::where('user_id', $user)->first();
        $apprentice->course_id = $course;
        $apprentice->save();

        return response()->json($apprentice);
    }

    public function retirarme($user)
    {
        $apprentice = Apprentice::where('user_id', $user)->first();
        $apprentice->course_id = null;
        $apprentice->save();

        return response()->json($apprentice);
    }

    public function index()
    {
        return response()->json(Apprentice::with(['course', 'computer'])->get());
    }

    public function show(Apprentice $apprentice)
    {
        return response()->json($apprentice->load(['course', 'computer', 'user', 'attendances']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id'   => 'nullable',
            'computer_id' => 'nullable',
            'user_id'     => 'nullable',
        ]);

        $apprentice = Apprentice::create($data);

        return response()->json($apprentice, 201);
    }

    public function update(Request $request, Apprentice $apprentice)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id'   => 'nullable',
            'computer_id' => 'nullable',
            'user_id'     => 'nullable',
        ]);

        $apprentice->update($data);

        return response()->json($apprentice);
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return response()->json(['message' => 'Aprendiz eliminado correctamente']);
    }
}
