@extends('layouts.app')

@section('content')
    <h2>Formulario Computador</h2>
<div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('computer.store') }}" method="POST">
        @csrf
        <label>Marca del Equipo:</label>
        <input type="text" name="brand">
        <br><br>
        <label>Numero del Equipo:</label>
        <input type="number" name="number">
        <br><br>
        <button type="submit" class="btn btn-success" 
        onclick="this.disabled=true; this.form.submit();">
        Guardar Computador
        </button>
    </form>
    </div>
  @endsection