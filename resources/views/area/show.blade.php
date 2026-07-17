@extends('layouts.App')

@section('content')

<h1>Detalle Área</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $area->id }}</p>
    <p><strong>Name:</strong> {{ $area->name }}</p>
</div>

<a href="{{ url('/area') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection