@extends('layouts.App')

@section('content')

<h1>Editar Computador</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('computer.update', $computer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Brand:
        <br>
        <input type="text" name="brand" class="form-control"
               value="{{ $computer->brand }}">
    </label>
    <br>

    <label>Number:
        <br>
        <input type="number" name="number" class="form-control"
               value="{{ $computer->number }}">
    </label>
    <br><br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Computador
    </button>

    <a href="{{ route('computer.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection