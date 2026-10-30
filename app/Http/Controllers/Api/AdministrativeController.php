<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrative;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{
    public function consulta1()
    {
        $respuesta = Administrative::with('user')->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Administrative::with('user')->get());
    }

    public function show(Administrative $administrative)
    {
        return response()->json($administrative->load('user'));
    }

    public function store(Request $request)
    {
        $administrative = Administrative::create($request->all());

        return response()->json($administrative, 201);
    }

    public function update(Request $request, Administrative $administrative)
    {
        $administrative->update($request->all());

        return response()->json($administrative);
    }

    public function destroy(Administrative $administrative)
    {
        $administrative->delete();

        return response()->json($administrative);
    }
}
