@extends('layouts.App')

@section('content')

<h1>Lista de Ambientes</h1>
<a href="{{ url('/environment/create') }}" class="btn btn-primary mb-3">+ Agregar Ambiente</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Centro de Formación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($environments as $environment)
        <tr>
            <td>{{ $environment->id }}</td>
            <td>{{ $environment->name }}</td>
            <td>{{ $environment->capacity ?? '-' }}</td>
            <td>{{ $environment->training_center->name ?? 'Sin asignar' }}</td>
            <td>
            <a href="{{ url('/environment/'.$environment->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ url('/environment/'.$environment->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ url('/environment/'.$environment->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('¿Eliminar este registro?')">
            Eliminar
            </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

