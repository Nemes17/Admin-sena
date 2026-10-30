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
        $attendance = Attendance::create($request->all());

        return response()->json($attendance, 201);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($request->all());

        return response()->json($attendance);
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return response()->json($attendance);
    }
}
