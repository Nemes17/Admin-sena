<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Apprentice;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // Muestra el formulario de asistencia de un curso para una fecha dada (el instructor)
    public function create(Course $course, Request $request){
        $teacher = Teacher::where('user_id', Auth::id())->first();

        // Seguridad: solo el instructor asignado a este curso puede tomar asistencia
        if (!$teacher || !$teacher->courses->contains($course->id)) {
            abort(403, 'No tienes permiso para tomar asistencia de este curso.');
        }

        $date = $request->input('date', now()->toDateString());

        // Aprendices matriculados actualmente en este curso
        $apprentices = Apprentice::where('course_id', $course->id)->get();

        // Asistencias ya registradas ese día, indexadas por aprendiz para prellenar el formulario
        $existing = Attendance::where('course_id', $course->id)
            ->where('date', $date)
            ->get()
            ->keyBy('apprentice_id');

        return view('attendance.create', compact('course', 'apprentices', 'existing', 'date'));
    }

    // Guarda o actualiza la asistencia de todos los aprendices de un curso en una fecha
    public function store(Course $course, Request $request){
        $teacher = Teacher::where('user_id', Auth::id())->first();

        if (!$teacher || !$teacher->courses->contains($course->id)) {
            abort(403, 'No tienes permiso para tomar asistencia de este curso.');
        }

        $data = $request->validate([
            'date'      => 'required|date',
            'status'    => 'required|array',
            'status.*'  => 'required|in:presente,ausente,tarde',
        ]);

        foreach ($data['status'] as $apprenticeId => $status) {
           
            Attendance::updateOrCreate(
                [
                    'course_id'     => $course->id,
                    'apprentice_id' => $apprenticeId,
                    'date'          => $data['date'],
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect()->route('attendance.create', ['course' => $course->id, 'date' => $data['date']])
                         ->with('success', 'Asistencia guardada correctamente.');
    }

    
    public function historial(){
        $apprentice = Apprentice::where('user_id', Auth::id())->first();

        $attendances = $apprentice
            ? Attendance::where('apprentice_id', $apprentice->id)->orderByDesc('date')->get()
            : collect();

        return view('apprentice.attendance', compact('apprentice', 'attendances'));
    }
}

