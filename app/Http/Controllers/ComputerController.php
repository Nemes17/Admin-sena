<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Environment;

class ComputerController extends Controller
{
    public function create(){
        $environments = Environment::all();
        return view('computer.create', compact('environments'));}

    public function index(){
    $computers = Computer::all();
    return view('computer.index', compact('computers'));
    }

    public function show($id){
    $computer = Computer::find($id);
    return view('computer.show', compact('computer'));
    }

    public function store(Request $request){
        $computer = new Computer();
        $computer->brand  = $request->brand;
        $computer->number = $request->number;
        $computer->environment_id = $request->environment_id;
        $computer->save();

        return redirect()->route('computer.index')
                         ->with('success', 'Computador creado correctamente');
    }

    public function edit(Computer $computer)
    {
    return view('computer.edit', [
        'computer' => $computer,
        'environments' => Environment::all(),
    ]);
    }

    public function update(Request $request, Computer $computer)
    {
    $data = $request->validate([
        'brand'  => 'required|string|max:255',
        'number' => 'required|integer',
        'environment_id' => 'nullable|exists:environments,id',
    ]);
    $computer->update($data);
    return redirect()->route('computer.create')
                     ->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy(Computer $computer)
    {
    $computer->delete();
    return redirect()->route('computer.create')
                     ->with('success', 'Computador eliminado correctamente.');
    }
}
