<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    public function consulta1()
    {
        return response()->json(Environment::with(['training_center', 'computers'])->get());
    }

    public function index()
    {
        return response()->json(Environment::with('training_center')->get());
    }

    public function show(Environment $environment)
    {
        return response()->json($environment->load('training_center'));
    }

    public function store(Request $request)
    {
        return response()->json(Environment::create($request->all()), 201);
    }

    public function update(Request $request, Environment $environment)
    {
        $environment->update($request->all());

        return response()->json($environment);
    }

    public function destroy(Environment $environment)
    {
        $environment->delete();

        return response()->json($environment);
    }
}
