@extends('layouts.App')

@section('content')

<h1>Detalle Centro de Formación</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $trainingCenter->id }}</p>
    <p><strong>Name:</strong> {{ $trainingCenter->name }}</p>
    <p><strong>Location:</strong> {{ $trainingCenter->location }}</p>
</div>

<a href="{{ url('/training_center') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection