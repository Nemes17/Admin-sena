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
        

        <button type="submit" class="btn btn-success" 
        onclick="this.disabled=true; this.form.submit();">
        Guardar Instructor
        </button>
    </form>
    </div>
@endsection