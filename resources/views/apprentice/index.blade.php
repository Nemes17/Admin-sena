@extends('layouts.App')

@section('content')

<h1>Lista de Aprendices</h1>
<a href="{{ url('/apprentice/create') }}" class="btn btn-primary mb-3">+ Agregar Aprendiz</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Cell Number</th>
            <th>Curso</th>
            <th>Computador</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($apprentices as $apprentice)
        <tr>
            <td>{{ $apprentice->id }}</td>
            <td>{{ $apprentice->name }}</td>
            <td>{{ $apprentice->email }}</td>
            <td>{{ $apprentice->cell_number }}</td>
            <td>{{ $apprentice->course->course_number ?? 'Sin curso' }}</td>
            <td>{{ $apprentice->computer->brand ?? 'Sin computador' }}</td>
            <td><a href="{{ url('/apprentice/'.$apprentice->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ url('/apprentice/'.$apprentice->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ url('/apprentice/'.$apprentice->id) }}" method="POST" style="display:inline">
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