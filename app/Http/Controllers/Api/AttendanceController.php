<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function consulta1()
    {
        $respuesta = Attendance::with(['course', 'apprentice'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Attendance::with(['course', 'apprentice'])->get());
    }

    public function show(Attendance $attendance)
    {
        return response()->json($attendance->load(['course', 'apprentice']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id'     => 'required',
            'apprentice_id' => 'required',
            'date'          => 'required',
            'status'        => 'required|string',
            'observations'  => 'nullable|string',
        ]);

        $attendance = Attendance::create($data);

        return response()->json($attendance, 201);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'course_id'     => 'required',
            'apprentice_id' => 'required',
            'date'          => 'required',
            'status'        => 'required|string',
            'observations'  => 'nullable|string',
        ]);

        $attendance->update($data);

        return response()->json($attendance);
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return response()->json(['message' => 'Registro de asistencia eliminado correctamente']);
    }
}
