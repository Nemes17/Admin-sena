<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Environment;
use App\Models\Computer;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    
    public function index(){
        $rol = Auth::user()->rol;

        $incidents = $rol === 'admin'
            ? Incident::with('environment', 'computer', 'reportedBy')->latest()->get()
            : Incident::with('environment', 'computer')->where('reported_by', Auth::id())->latest()->get();

        return view('incident.index', compact('incidents', 'rol'));
    }

    public function create(){
        $environments = Environment::all();
        $computers    = Computer::all();
        return view('incident.create', compact('environments', 'computers'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'environment_id' => 'nullable|exists:environments,id',
            'computer_id'    => 'nullable|exists:computers,id',
            'description'    => 'required|string|max:1000',
        ]);

        if (empty($data['environment_id']) && empty($data['computer_id'])) {
            return back()->withInput()->with('error', 'Selecciona al menos un Ambiente o un Computador.');
        }

        Incident::create([
            'environment_id' => $data['environment_id'] ?? null,
            'computer_id'    => $data['computer_id'] ?? null,
            'reported_by'    => Auth::id(),
            'description'    => $data['description'],
            'status'         => 'pendiente',
        ]);

        return redirect()->route('incident.index')->with('success', 'Novedad reportada correctamente.');
    }

    public function resolve(Incident $incident){
        if (Auth::user()->rol !== 'admin') {
            abort(403, 'Solo un administrativo puede resolver novedades.');
        }

        $incident->update([
            'status'      => 'resuelto',
            'resolved_at' => now(),
        ]);

        return redirect()->route('incident.index')->with('success', 'Novedad marcada como resuelta.');
    }
}

