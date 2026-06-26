@extends('layouts.app')

@section('content')

     <h2>Formulario Área</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('area.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
    @endsection
