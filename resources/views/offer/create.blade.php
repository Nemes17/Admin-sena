@extends('layouts.App')

@section('content')

<h1>Registro de Oferta</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('offer.store') }}" method="POST">
    @csrf

    <label>Nombre del Programa:</label>
    <input type="text" name="name" class="form-control" placeholder="Ej. Análisis y Desarrollo de Software" value="{{ old('name') }}" required>
    <br>

    <label>Nivel:</label>
    <select name="level" class="form-control" required>
        <option value="">-- Seleccionar --</option>
        <option value="tecnico" @selected(old('level')=='tecnico')>Técnico</option>
        <option value="tecnologo" @selected(old('level')=='tecnologo')>Tecnólogo</option>
    </select>
    <br>

    <label>Área:</label>
    <select name="area_id" class="form-control">
        <option value="">-- Seleccionar --</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}" @selected(old('area_id')==$area->id)>{{ $area->name }}</option>
        @endforeach
    </select>
    <br>

    <label>Duración (meses):</label>
    <input type="number" min="1" name="duration_months" class="form-control" value="{{ old('duration_months') }}">
    <br>

    <label>Descripción:</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    <br>

    <label>Estado:</label>
    <select name="status" class="form-control" required>
        <option value="abierta" selected>Abierta</option>
        <option value="cerrada">Cerrada</option>
    </select>
    <br><br>

    <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">
        Guardar Oferta
    </button>
    <a href="{{ route('offer.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection

