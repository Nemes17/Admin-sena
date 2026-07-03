@extends('layouts.app')

@section('content')
    <h2>Formulario Computador</h2>
<div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('computer.store') }}" method="POST">
        @csrf
        <label>Brand:</label>
        <input type="text" name="brand">
        <br><br>
        <label>Number:</label>
        <input type="number" name="number">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
    </div>
  @endsection