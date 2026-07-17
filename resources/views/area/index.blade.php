@extends('layouts.App')

@section('content')

<h1>Lista de Áreas</h1>
<a href="{{ url('/area/create') }}" class="btn btn-primary mb-3">+ Agregar Área</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
     <tbody>
        @foreach($areas as $area)
        <tr>
            <td>{{ $area->id }}</td>
            <td>{{ $area->name }}</td>
            <td><a href="{{ url('/area/'.$area->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ url('/area/'.$area->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ url('/area/'.$area->id) }}" method="POST" style="display:inline">
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