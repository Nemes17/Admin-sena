@extends('layouts.App')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                
                <div class="text-center mb-4">
                    <div class="d-flex align-items-center justify-content-center bg-white text-success border border-success border-3 rounded-circle mx-auto mb-2 fw-bold fs-3" style="width: 90px; height: 90px;">
                        AD
                    </div>
                    <h3 class="fw-bold text-dark mb-0">Editar Perfil</h3>
                    <p class="text-muted small">Gestiona tu información personal</p>
                </div>

                <form action="#" method="POST">
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                            <input type="text" class="form-control" id="name" name="name" value="Admin SENA" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="admin@sena.edu.co" required>
                        </div>

                        <hr class="my-4">
                        <h6 class="fw-bold text-success mb-3">Cambiar Contraseña</h6>

                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Dejar en blanco para mantener la actual">
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña">
                        </div>

                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn text-white px-4" style="background-color: #00a859;">Guardar Cambios</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection