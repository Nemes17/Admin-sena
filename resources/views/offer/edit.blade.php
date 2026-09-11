@extends('layouts.App')

@section('content')

<h1>Editar Oferta</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('offer.update', $offer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre del Programa:</label>
    <input type="text" name="name" class="form-control" value="{{ $offer->name }}">
    <br>

    <label>Nivel:</label>
    <select name="level" class="form-control">
        <option value="tecnico" @selected($offer->level=='tecnico')>Técnico</option>
        <option value="tecnologo" @selected($offer->level=='tecnologo')>Tecnólogo</option>
    </select>
    <br>

    <label>Área:</label>
    <select name="area_id" class="form-control">
        <option value="">-- Seleccionar --</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}" @selected($offer->area_id==$area->id)>{{ $area->name }}</option>
        @endforeach
    </select>
    <br>

    <label>Duración (meses):</label>
    <input type="number" min="1" name="duration_months" class="form-control" value="{{ $offer->duration_months }}">
    <br>

    <label>Descripción:</label>
    <textarea name="description" class="form-control" rows="3">{{ $offer->description }}</textarea>
    <br>

    <label>Estado:</label>
    <select name="status" class="form-control">
        <option value="abierta" @selected($offer->status=='abierta')>Abierta</option>
        <option value="cerrada" @selected($offer->status=='cerrada')>Cerrada</option>
    </select>
    <br><br>

    <button type="submit" class="btn btn-warning" onclick="this.disabled=true; this.form.submit();">
        Actualizar Oferta
    </button>
    <a href="{{ route('offer.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection

