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
        

        <button type="submit" class="btn btn-success" 
        onclick="this.disabled=true; this.form.submit();">
        Guardar Curso
        </button>
    </form>
 </div>
@endsection