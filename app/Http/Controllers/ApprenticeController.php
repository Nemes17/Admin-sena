<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class ApprenticeController extends Controller
{
    //
    // Muestra el panel personalizado del aprendiz autenticado
    public function home(){
        $apprentice = Apprentice::with('course.area', 'course.training_center', 'computer')
            ->where('user_id', Auth::id())
            ->first();

        return view('apprentice.home', compact('apprentice'));
    }

    // Catálogo de ofertas (programas) abiertas para que el aprendiz vea y se inscriba
    public function ofertas(){
        $apprentice = Apprentice::where('user_id', Auth::id())->first();

        $offers = Offer::with(['area', 'courses.training_center', 'courses.environment'])
            ->where('status', 'abierta')
            ->get();

        return view('apprentice.ofertas', compact('offers', 'apprentice'));
    }

    // Inscribe al aprendiz autenticado en una ficha (curso) puntual de una oferta
    public function inscribirse(Course $course){
        $apprentice = Apprentice::where('user_id', Auth::id())->first();

        if (!$apprentice) {
            return back()->with('error', 'Tu usuario aún no está vinculado a un registro de Aprendiz.');
        }

        // Regla de negocio: solo se puede estar inscrito en un curso a la vez
        if ($apprentice->course_id) {
            return back()->with('error', 'Ya estás inscrito en un curso. Debes retirarte antes de inscribirte a otro.');
        }

        // Regla de negocio: respetar el cupo máximo de la ficha
        $cupos = $course->cuposDisponibles();
        if (!is_null($cupos) && $cupos <= 0) {
            return back()->with('error', 'Esta ficha ya no tiene cupos disponibles.');
        }

        $apprentice->course_id = $course->id;
        $apprentice->save();

        return redirect()->route('apprentice.home')->with('success', 'Te inscribiste correctamente al curso.');
    }

    // Permite al aprendiz retirarse de su curso actual, para poder inscribirse a otro
    public function retirarme(){
        $apprentice = Apprentice::where('user_id', Auth::id())->first();

        if ($apprentice) {
            $apprentice->course_id = null;
            $apprentice->save();
        }

        return back()->with('success', 'Te retiraste del curso correctamente.');
    }

    public function index(){
    $apprentices = Apprentice::all();
    return view('apprentice.index', compact('apprentices'));
    }

    public function show($id){
    $apprentice = Apprentice::find($id);
    return view('apprentice.show', compact('apprentice'));
    }
    
    public function create(){
        $courses   = Course::all();
        $computers = Computer::all();
        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request){
        $apprentice                = new Apprentice();
        $apprentice->name          = $request->name;
        $apprentice->email         = $request->email;
        $apprentice->cell_number = $request->cell_number;
        $apprentice->course_id     = $request->course_id;
        $apprentice->computer_id   = $request->computer_id;
        $apprentice->save();

        return redirect()->route('apprentice.index')
                         ->with('success', 'Aprendiz creado correctamente');
    }

    public function edit(Apprentice $apprentice)
    {
    return view('apprentice.edit', [
        'apprentice' => $apprentice,
        'courses'    => Course::all(),
        'computers'  => Computer::all(),
    ]);
    }
  

    public function update(Request $request, Apprentice $apprentice)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id'   => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        $apprentice->update($data);

        return redirect()->route('apprentice.index')
                         ->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Apprentice $apprentice)
    {
    $apprentice->delete();
    return redirect()->route('apprentice.create')
                     ->with('success', 'Aprendiz eliminado correctamente.');
    }
}
