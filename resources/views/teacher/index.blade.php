@extends('layouts.App')

@section('content')

<h1>Lista de Instructores</h1>
<a href="{{ url('/teacher/create') }}" class="btn btn-primary mb-3">+ Agregar Instructor</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Área</th>
            <th>Centro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->area->name ?? 'Sin área' }}</td>
            <td>{{ $teacher->training_center->name ?? 'Sin centro' }}</td>
            <td><a href="{{ url('/teacher/'.$teacher->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ url('/teacher/'.$teacher->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ url('/teacher/'.$teacher->id) }}" method="POST" style="display:inline">
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