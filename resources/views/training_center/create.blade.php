@extends('layouts.app')

@section('content')

     <h2>Formulario Centro de Formación</h2>
    <div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('training_center.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <br><br>
        <label>Location:</label>
        <input type="text" name="location">
        <br><br>
        <button type="submit" class="btn btn-success" 
        onclick="this.disabled=true; this.form.submit();">
        Guardar Centro
        </button>
    </form>
    </div>
@endsection