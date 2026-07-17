<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    // 
    public function create(){
    return view('computer.create');}

    public function index(){
    $computers = Computer::all();
    return view('computer.index', compact('computers'));
    }

    public function show($id){
    $computer = Computer::find($id);
    return view('Computer.show', compact('Computer'));
    }

    public function store(Request $request){
        $computer = new Computer();
        $computer->brand  = $request->brand;
        $computer->number = $request->number;
        $computer->save();

        return redirect()->route('computer.index')
                         ->with('success', 'Computador creado correctamente');
    }
    public function edit(Computer $computer)
    {
    return view('computer.edit', [
        'computer' => $computer,
    ]);
    }

    public function update(Request $request, Computer $computer)
    {
    $data = $request->validate([
        'brand'  => 'required|string|max:255',
        'number' => 'required|integer',
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
