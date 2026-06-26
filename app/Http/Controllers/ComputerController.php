<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    //
    public function create(){
        return view('computer.create');
    }

    public function store(Request $request){
        $computer = new Computer();
        $computer->brand  = $request->brand;
        $computer->number = $request->number;
        $computer->save();

        return redirect()->route('computer.create')
                         ->with('success', 'Computador creado correctamente');
    }
}
