@extends('layouts.App')

@section('content')

<h1>Editar Aprendiz</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('apprentice.update', $apprentice->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:
        <br>
        <input type="text" name="name" class="form-control"
               value="{{ $apprentice->name }}">
    </label>
    <br>

    <label>Email:
        <br>
        <input type="email" name="email" class="form-control"
               value="{{ $apprentice->email }}">
    </label>
    <br>

    <label>Cell Number:
        <br>
        <input type="text" name="cell_number" class="form-control"
               value="{{ $apprentice->cell_number }}">
    </label>
    <br>

    <label for="course_id">Curso</label>
    <select name="course_id" class="form-control">
        <option value="">-- Seleccionar Curso --</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}"
                {{ $apprentice->course_id == $course->id ? 'selected' : '' }}>
                {{ $course->course_number }}
            </option>
        @endforeach
    </select>
    <br>

    <label for="computer_id">Computador</label>
    <select name="computer_id" class="form-control">
        <option value="">-- Seleccionar Computador --</option>
        @foreach($computers as $computer)
            <option value="{{ $computer->id }}"
                {{ $apprentice->computer_id == $computer->id ? 'selected' : '' }}>
                {{ $computer->brand }} - {{ $computer->number }}
            </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Aprendiz
    </button>

    <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection