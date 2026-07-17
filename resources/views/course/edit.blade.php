@extends('layouts.App')

@section('content')

<h1>Editar Curso</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('course.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Course Number:
        <br>
        <input type="number" name="course_number" class="form-control"
               value="{{ $course->course_number }}">
    </label>
    <br>

    <label>Day:
        <br>
        <input type="date" name="day" class="form-control"
               value="{{ $course->day }}">
    </label>
    <br>

    <label for="area_id">Área</label>
    <select name="area_id" class="form-control">
        <option value="">-- Seleccionar Área --</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}"
                {{ $course->area_id == $area->id ? 'selected' : '' }}>
                {{ $area->name }}
            </option>
        @endforeach
    </select>
    <br>

    <label for="training_center_id">Centro de Formación</label>
    <select name="training_center_id" class="form-control">
        <option value="">-- Seleccionar Centro --</option>
        @foreach($trainingCenters as $center)
            <option value="{{ $center->id }}"
                {{ $course->training_center_id == $center->id ? 'selected' : '' }}>
                {{ $center->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Curso
    </button>

    <a href="{{ route('course.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection