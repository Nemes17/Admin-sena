@extends('layouts.App')

@section('content')

<div class="text-center py-5">
    <img src="{{asset("logo-sena.png")}}"
         alt="SENA" height="120" class="mb-4">
    <h1 class="fw-bold" style="color: #3DAE2B;">
        Bienvenido{{ $teacher ? ', '.$teacher->name : '' }}
    </h1>
    <p class="lead text-muted">Panel del Instructor</p>
    <hr>
</div>

@if(!$teacher)
    <div class="alert alert-warning text-center">
        Tu usuario aún no está vinculado a un registro de Instructor. Contacta al administrador.
    </div>
@else
<div class="row text-center mt-4">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Área</h5>
                <p class="card-text">{{ $teacher->area->name ?? 'Sin asignar' }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-building fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Centro de Formación</h5>
                <p class="card-text">{{ $teacher->training_center->name ?? 'Sin asignar' }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-book fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Cursos a cargo</h5>
                <p class="card-text">{{ $courses->count() }}</p>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-4 mb-3">Mis Cursos</h4>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No. Ficha</th>
            <th>Fecha</th>
            <th>Área</th>
            <th>Centro de Formación</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
        <tr>
            <td>{{ $course->course_number }}</td>
            <td>{{ $course->day }}</td>
            <td>{{ $course->area->name ?? '-' }}</td>
            <td>{{ $course->training_center->name ?? '-' }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center text-muted">No tienes cursos asignados aún.</td></tr>
        @endforelse
    </tbody>
</table>
@endif

@endsection

