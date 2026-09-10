@extends('layouts.App')

@section('content')

<h1>Detalle Ambiente</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $environment->id }}</p>
    <p><strong>Nombre:</strong> {{ $environment->name }}</p>
    <p><strong>Capacidad:</strong> {{ $environment->capacity ?? '-' }}</p>
    <p><strong>Centro de Formación:</strong> {{ $environment->training_center->name ?? 'Sin asignar' }}</p>
    <p><strong>Computadores en este ambiente:</strong> {{ $environment->computers->count() }}</p>
</div>

<a href="{{ url('/environment') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection

