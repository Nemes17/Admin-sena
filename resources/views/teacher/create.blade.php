@extends('layouts.app')

@section('content')

    <h2>Formulario Instructor</h2>
    <div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email">
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
        
        <label>Course:</label>
        <select name="course_id">
        <option value="">-- Seleccionar Curso --</option>
        @foreach($courses as $course)
        <option value="{{ $course->id }}">
            {{ $course->{'course_number'} }}
        </option>
        @endforeach
        </select>
        <br><br>

        <button type="submit">Guardar</button>
    </form>
    </div>
@endsection