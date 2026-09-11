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
        

        <label>Ambiente:</label>
        <select name="environment_id">
            <option value="">-- Seleccionar --</option>
            @foreach($environments as $environment)
                <option value="{{ $environment->id }}">{{ $environment->name }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Oferta (Programa):</label>
        <select name="offer_id">
            <option value="">-- Seleccionar --</option>
            @foreach($offers as $offer)
                <option value="{{ $offer->id }}">
                    {{ $offer->name }} ({{ $offer->level === 'tecnologo' ? 'Tecnólogo' : 'Técnico' }})
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Cupo máximo de aprendices:</label>
        <input type="number" min="0" name="quota" placeholder="Ej. 30">
        <br><br>

        <button type="submit" class="btn btn-success" 
        onclick="this.disabled=true; this.form.submit();">
        Guardar Curso
        </button>
    </form>
 </div>
@endsection