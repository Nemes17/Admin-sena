@extends('layouts.App')

@section('content')

<div class="text-center py-5">
    <img src="{{asset("logo-sena.png")}}"
         alt="SENA" height="120" class="mb-4">
    <h1 class="fw-bold" style="color: #3DAE2B;">
        Bienvenido{{ $apprentice ? ', '.$apprentice->name : '' }}
    </h1>
    <p class="lead text-muted">Panel del Aprendiz</p>
    <hr>
</div>

@if(!$apprentice)
    <div class="alert alert-warning text-center">
        Tu usuario aún no está vinculado a un registro de Aprendiz. Contacta al administrador.
    </div>
@else
<div class="row text-center mt-4">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-book fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Mi Curso</h5>
                <p class="card-text">
                    Ficha {{ $apprentice->course->course_number ?? 'Sin asignar' }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-building fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Centro de Formación</h5>
                <p class="card-text">{{ $apprentice->course->training_center->name ?? 'Sin asignar' }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-desktop fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Mi Computador</h5>
                <p class="card-text">
                    @if($apprentice->computer)
                        {{ $apprentice->computer->brand }} (No. {{ $apprentice->computer->number }})
                    @else
                        Sin asignar
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<div class="card p-4 mt-3">
    <h5>Mis Datos</h5>
    <p><strong>Correo:</strong> {{ $apprentice->email }}</p>
    <p><strong>Celular:</strong> {{ $apprentice->cell_number }}</p>
    <p><strong>Área del curso:</strong> {{ $apprentice->course->area->name ?? '-' }}</p>
</div>
@endif

@endsection

