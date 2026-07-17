@extends('layouts.App')

@section('content')

<h1>Lista de Centros de Formación</h1>
<a href="{{ url('/training_center/create') }}" class="btn btn-primary mb-3">+ Agregar Centro</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trainingCenters as $center)
        <tr>
            <td>{{ $center->id }}</td>
            <td>{{ $center->name }}</td>
            <td>{{ $center->location }}</td>
            <td><a href="{{ url('/training_center/'.$center->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ url('/training_center/'.$center->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ url('/training_center/'.$center->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('¿Eliminar este registro?')">
            Eliminar
            </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection