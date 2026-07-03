@extends('layouts.app')

@section('content')

     <h2>Formulario Área</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <div class="card shadow p-4">

    <form action="{{ route('area.store') }}" method="POST">
        @csrf
         <div class="mb-3">

            <label class="form-label">Nombre del Área:</label>
            <input type="text" name="name" class="form-control" required>

        </div>
        <br><br>
        <button type="submit">Guardar</button>
    </form>
</div>
    @endsection