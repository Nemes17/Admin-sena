@extends('layouts.App')

@section('content')

<h1>Editar Ambiente</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('environment.update', $environment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="name" class="form-control" value="{{ $environment->name }}">
    <br>

    <label>Capacidad:</label>
    <input type="number" min="0" name="capacity" class="form-control" value="{{ $environment->capacity }}">
    <br>

    <label>Centro de Formación:</label>
    <select name="training_center_id" class="form-control">
        <option value="">-- Seleccionar --</option>
        @foreach($trainingCenters as $center)
            <option value="{{ $center->id }}" @selected($environment->training_center_id == $center->id)>
                {{ $center->name }}
            </option>
        @endforeach
    </select>
    <br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Ambiente
    </button>

    <a href="{{ route('environment.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection

