@extends('layouts.App')

@section('content')

<h1>Editar Centro de Formación</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('training_center.update', $trainingCenter->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:
        <br>
        <input type="text" name="name" class="form-control"
               value="{{ $trainingCenter->name }}">
    </label>
    <br>

    <label>Location:
        <br>
        <input type="text" name="location" class="form-control"
               value="{{ $trainingCenter->location }}">
    </label>
    <br><br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Centro
    </button>

    <a href="{{ route('training_center.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection