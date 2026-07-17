@extends('layouts.app')

@section('content')

     <h2>Asignar Instructor a Curso</h2>
    <div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('course_teacher.store') }}" method="POST">
        @csrf

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

        <button type="submit" class="btn btn-success" 
        onclick="this.disabled=true; this.form.submit();">
        Asignar
        </button>
    </form>
    </div>
@endsection