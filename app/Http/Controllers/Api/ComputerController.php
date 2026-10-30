<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function consulta1()
    {
        return response()->json(Computer::with(['environment.training_center'])->get());
    }

    public function index()
    {
        return response()->json(Computer::with('environment')->get());
    }

    public function show(Computer $computer)
    {
        return response()->json($computer->load('environment'));
    }

    public function store(Request $request)
    {
        return response()->json(Computer::create($request->all()), 201);
    }

    public function update(Request $request, Computer $computer)
    {
        $computer->update($request->all());

        return response()->json($computer);
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();

        return response()->json($computer);
    }
}
