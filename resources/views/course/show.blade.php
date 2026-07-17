@extends('layouts.App')

@section('content')

<h1>Detalle Curso</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Course Number:</strong> {{ $course->{'course_number'} }}</p>
    <p><strong>Day:</strong> {{ $course->day }}</p>
    <p><strong>Área:</strong> {{ $course->area->name ?? 'Sin área' }}</p>
    <p><strong>Centro:</strong> {{ $course->training_center->name ?? 'Sin centro' }}</p>
</div>

<a href="{{ url('/course') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection