@extends('layouts.App')

@section('content')

<h1>Lista de Asignaciones</h1>
<a href="{{ url('/course_teacher/create') }}" class="btn btn-primary mb-3">
    + Nueva Asignación
</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Instructor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assignments as $assignment)
        <tr>
            <td>{{ $assignment->id }}</td>
            <td>{{ $assignment->course->course_number ?? 'Sin curso' }}</td>
            <td>{{ $assignment->teacher->name ?? 'Sin instructor' }}</td>
            <td>
                <form action="{{ url('/course_teacher/'.$assignment->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar esta asignación?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection