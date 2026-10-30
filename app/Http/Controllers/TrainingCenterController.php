<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_Center;
use Cloudinary\Cloudinary;

class TrainingCenterController extends Controller
{
    public function index(){
    $trainingCenters = Training_center::all();
    return view('training_center.index', compact('trainingCenters'));
    }

    public function show($id){
    $trainingCenter = Training_center::find($id);
    return view('training_center.show', compact('trainingCenter'));
    }
     public function create(){
        return view('training_center.create');
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
    public function edit(Training_center $training_center)
    {
    return view('training_center.edit', [
        'trainingCenter' => $training_center,
    ]);
    }

    public function update(Request $request, Training_center $training_center)
    {
    $data = $request->validate([
        'name'     => 'required|string|max:255',
        'location' => 'required|string|max:255',
    ]);
    $training_center->update($data);
    return redirect()->route('training_center.create')
                     ->with('success', 'Centro actualizado correctamente.');
    }

    public function destroy(Training_center $training_center)
    {
    $training_center->delete();
    return redirect()->route('training_center.create')
                     ->with('success', 'Centro eliminado correctamente.');
    }
}
