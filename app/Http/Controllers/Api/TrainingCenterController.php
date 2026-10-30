<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Training_center;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class TrainingCenterController extends Controller
{
    public function consulta1()
    {
        $respuesta = Training_center::with(['courses', 'environments'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Training_center::all());
    }

    public function show(Training_center $training_center)
    {
        return response()->json($training_center);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'training_centers',
                'resource_type' => 'image',
            ]
        );

        $trainingCenter = Training_center::create([
            'name' => $request->name,
            'location' => $request->location,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Centro de formación creado correctamente',
            'data' => $trainingCenter,
        ], 201);
    }

    public function update(Request $request, Training_center $training_center)
    {
        $training_center->update($request->all());

        return response()->json($training_center);
    }

    public function destroy(Training_center $training_center)
    {
        $training_center->delete();

        return response()->json($training_center);
    }
}
