@extends('layouts.App')

@section('content')

<h1>Detalle Instructor</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $teacher->id }}</p>
    <p><strong>Name:</strong> {{ $teacher->name }}</p>
    <p><strong>Email:</strong> {{ $teacher->email }}</p>
    <p><strong>Área:</strong> {{ $teacher->area->name ?? 'Sin área' }}</p>
    <p><strong>Centro:</strong> {{ $teacher->training_center->name ?? 'Sin centro' }}</p>
</div>

<a href="{{ url('/teacher') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection