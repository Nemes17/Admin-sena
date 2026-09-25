@extends('layouts.App')

@section('content')

<h1>Reportar Novedad</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('incident.store') }}" method="POST">
    @csrf

    <label>Ambiente (opcional):</label>
    <select name="environment_id" class="form-control">
        <option value="">-- Ninguno --</option>
        @foreach($environments as $environment)
            <option value="{{ $environment->id }}" @selected(old('environment_id')==$environment->id)>{{ $environment->name }}</option>
        @endforeach
    </select>
    <br>

    <label>Computador (opcional):</label>
    <select name="computer_id" class="form-control">
        <option value="">-- Ninguno --</option>
        @foreach($computers as $computer)
            <option value="{{ $computer->id }}" @selected(old('computer_id')==$computer->id)>
                {{ $computer->brand }} (No. {{ $computer->number }})
            </option>
        @endforeach
    </select>
    <br>

    <label>Descripción del problema:</label>
    <textarea name="description" class="form-control" rows="4" placeholder="Ej. El proyector no enciende" required>{{ old('description') }}</textarea>
    <br><br>

    <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">
        Reportar Novedad
    </button>
    <a href="{{ route('incident.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection

