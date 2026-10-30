<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class AreaController extends Controller
{
    public function consulta1()
    {
        $respuesta = Area::with(['courses', 'teachers'])->get();
        return response()->json($respuesta);
    }

    public function index()
    {
        return response()->json(Area::all());
    }

    public function show(Area $area)
    {
        return response()->json($area);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
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
                'folder' => 'areas',
                'resource_type' => 'image',
            ]
        );

        $area = Area::create([
            'name' => $request->name,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Área creada correctamente',
            'data' => $area,
        ], 201);
    }

    public function update(Request $request, Area $area)
    {
        $area->update($request->all());

        return response()->json($area);
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return response()->json($area);
    }
}