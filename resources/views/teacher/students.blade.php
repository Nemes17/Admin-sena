@extends('layouts.App')

@section('content')

<h1>Aprendices - Ficha {{ $course->course_number }}</h1>
<p class="text-muted">{{ $course->area->name ?? '' }} — {{ $course->training_center->name ?? '' }}</p>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Computador</th>
        </tr>
    </thead>
    <tbody>
        @forelse($apprentices as $apprentice)
        <tr>
            <td>{{ $apprentice->name }}</td>
            <td>{{ $apprentice->email }}</td>
            <td>{{ $apprentice->cell_number }}</td>
            <td>
                {{ $apprentice->computer
                    ? $apprentice->computer->brand.' (No. '.$apprentice->computer->number.')'
                    : 'Sin asignar' }}
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center text-muted">Esta ficha aún no tiene aprendices inscritos.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('teacher.home') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection

