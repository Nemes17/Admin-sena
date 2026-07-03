@extends('layouts.app')

@section('content')


     <h2 mb-4 text-center>Registro de Aprendiz</h2>
     <div class="card shadow p-4">

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('apprentice.store') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name">
        </div>
        <br><br>

        <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email">
        </div>
        <br><br>

        <div class="mb-3">
        <label>Cell Number:</label>
        <input type="text" name="cell_number">
        </div>
        <br><br>

        <div class="mb-3">
        <label>Course:</label>
        <select name="course_id">
            <option value="">-- Seleccionar --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->{'course number'} }}
                </option>
            @endforeach
        </select>
        </div>
        <br><br>

        <div class="mb-3">
        <label>Computer:</label>
        <select name="computer_id">
            <option value="">-- Seleccionar --</option>
            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">
                    {{ $computer->brand }} - {{ $computer->number }}
                </option>
            @endforeach
        </select>
        </div>
        <br><br>

        <button type="submit">Enviar formulario</button>
    </form>
    </div>

@endsection