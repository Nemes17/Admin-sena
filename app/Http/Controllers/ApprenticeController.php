<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    //
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
        $apprentice->{'cell_number'} = $request->cell_number;
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
    {$data = $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'cell number' => 'required|string|max:255',
        'course_id'   => 'nullable|exists:courses,id',
        'computer_id' => 'nullable|exists:computers,id',
    ]);
    $apprentice->update($data);
    return redirect()->route('apprentice.create')
                     ->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Apprentice $apprentice)
    {
    $apprentice->delete();
    return redirect()->route('apprentice.create')
                     ->with('success', 'Aprendiz eliminado correctamente.');
    }
}
