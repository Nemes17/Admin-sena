@extends('layouts.App')

@section('content')

<h1>Editar Instructor</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:
        <br>
        <input type="text" name="name" class="form-control"
               value="{{ $teacher->name }}">
    </label>
    <br>

    <label>Email:
        <br>
        <input type="email" name="email" class="form-control"
               value="{{ $teacher->email }}">
    </label>
    <br>

    <label for="area_id">Área</label>
    <select name="area_id" class="form-control">
        <option value="">-- Seleccionar Área --</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}"
                {{ $teacher->area_id == $area->id ? 'selected' : '' }}>
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
                {{ $teacher->training_center_id == $center->id ? 'selected' : '' }}>
                {{ $center->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Instructor
    </button>

    <a href="{{ route('teacher.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection