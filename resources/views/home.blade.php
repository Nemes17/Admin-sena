@extends('layouts.App')

@section('content')

<div class="text-center py-5">
    <img src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" 
         alt="SENA" height="120" class="mb-4">
    <h1 class="fw-bold" style="color: #3DAE2B;">Sistema de Administración SENA</h1>
    <p class="lead text-muted">Gestión de Centros de Formación, Instructores y Aprendices</p>
    <hr>
</div>

<div class="row text-center mt-4">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Áreas</h5>
                <p class="card-text">Gestiona las áreas del centro de formación.</p>
                <a href="/area" class="btn btn-success">Ver Áreas</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-building fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Centros de Formación</h5>
                <p class="card-text">Administra los centros de formación SENA.</p>
                <a href="/training_center" class="btn btn-success">Ver Centros</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-desktop fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Computadores</h5>
                <p class="card-text">Gestiona los equipos disponibles.</p>
                <a href="/computer" class="btn btn-success">Ver Computadores</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-book fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Cursos</h5>
                <p class="card-text">Administra los cursos disponibles.</p>
                <a href="/course" class="btn btn-success">Ver Cursos</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-chalkboard-teacher fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Instructores</h5>
                <p class="card-text">Gestiona los instructores del SENA.</p>
                <a href="/teacher" class="btn btn-success">Ver Instructores</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="fas fa-user-graduate fa-3x mb-3" style="color: #3DAE2B;"></i>
                <h5 class="card-title">Aprendices</h5>
                <p class="card-text">Administra los aprendices registrados.</p>
                <a href="/apprentice" class="btn btn-success">Ver Aprendices</a>
            </div>
        </div>
    </div>
</div>

@endsection