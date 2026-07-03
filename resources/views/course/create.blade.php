@extends('layouts.app')

@section('content')

<h2>Formulario Curso</h2>
<div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        <label>Course Number:</label>
        <input type="number" name="course_number">
        <br><br>

        <label>Day:</label>
        <input type="date" name="day">
        <br><br>

        <label>Area:</label>
        <select name="area_id">
            <option value="">-- Seleccionar --</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Training Center:</label>
        <select name="training_center_id">
            <option value="">-- Seleccionar --</option>
            @foreach($trainingCenters as $center)
                <option value="{{ $center->id }}">{{ $center->name }}</option>
            @endforeach
        </select>
        <br><br>
        
        <label>Teacher:</label>
        <select name="teacher_id">
        <option value="">-- Seleccionar Instructor --</option>
        @foreach($teachers as $teacher)
        <option value="{{ $teacher->id }}">
            {{ $teacher->name }}
        </option>
        @endforeach
        </select>
        <br><br>

        <button type="submit">Guardar</button>
    </form>
 </div>
@endsection