@extends('layouts.App')

@section('content')

<h1>Editar Área</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('area.update', $area->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:
        <br>
        <input type="text" name="name" class="form-control" 
               value="{{ $area->name }}">
    </label>
    <br><br>

    <button type="submit" class="btn btn-warning"
            onclick="this.disabled=true; this.form.submit();">
        Actualizar Área
    </button>

    <a href="{{ route('area.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>

@endsection