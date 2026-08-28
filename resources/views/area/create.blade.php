@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            {{-- Alerta de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark mb-1">Registro de Área</h2>
                        <p class="text-muted small">Ingresa los datos para registrar una nueva área en el sistema</p>
                    </div>

                    <form action="{{ route('area.store') }}" method="POST">
                        @csrf

                        <!-- Campo Nombre -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                Nombre del Área <span class="text-danger">*</span>
                            </label>
                            
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control bg-light border-start-0 @error('name') is-invalid @enderror" 
                                    placeholder="Ej. Coordinación Académica"
                                    value="{{ old('name') }}"
                                    required
                                >
                            </div>

                            @error('name')
                                <div class="text-danger small mt-1">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-end gap-2 pt-2">
                            <a href="{{ route('area.index') }}" class="btn btn-light px-4">
                                <i class="fa-solid fa-xmark me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4" onclick="this.disabled=true; this.form.submit();">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Área
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection