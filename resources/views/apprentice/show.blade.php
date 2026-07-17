@extends('layouts.App')

@section('content')

<h1>Detalle Aprendiz</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $apprentice->id }}</p>
    <p><strong>Name:</strong> {{ $apprentice->name }}</p>
    <p><strong>Email:</strong> {{ $apprentice->email }}</p>
    <p><strong>Cell Number:</strong> {{ $apprentice->{'cell number'} }}</p>
    <p><strong>Curso:</strong> {{ $apprentice->course->{'course_number'} ?? 'Sin curso' }}</p>
    <p><strong>Computador:</strong> {{ $apprentice->computer->brand ?? 'Sin computador' }}</p>
</div>

<a href="{{ url('/apprentice') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection