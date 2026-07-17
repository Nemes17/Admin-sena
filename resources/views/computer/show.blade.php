@extends('layouts.App')

@section('content')

<h1>Detalle Computador</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $computer->id }}</p>
    <p><strong>Brand:</strong> {{ $computer->brand }}</p>
    <p><strong>Number:</strong> {{ $computer->number }}</p>
</div>

<a href="{{ url('/computer') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection