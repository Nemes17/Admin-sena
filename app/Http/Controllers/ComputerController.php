<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    //
    public function index(){
    $computers = Computer::all();
    return view('Computer.index', compact('Computers'));
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

        return redirect()->route('Computer.create')
                         ->with('success', 'Computador creado correctamente');
    }
}
