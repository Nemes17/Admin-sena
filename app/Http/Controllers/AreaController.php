<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Cloudinary\Cloudinary;

class AreaController extends Controller
{
    public function index(){
    $areas = Area::all();
    return view('area.index', compact('areas'));
    }

    public function show($id){
    $area = Area::find($id);
    return view('area.show', compact('area'));
    }
    
    public function create(){
        return view('area.create');
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
    public function edit(Area $area)
    {
    return view('area.edit', [
        'area' => $area,
    ]);
    }

    public function update(Request $request, Area $area)
    {
    $data = $request->validate([
        'name' => 'required|string|max:255',
    ]);
    $area->update($data);
    return redirect()->route('area.create')
                     ->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(Area $area)
    {
    $area->delete();
    return redirect()->route('area.create')
                     ->with('success', 'Área eliminada correctamente.');
    }
}
