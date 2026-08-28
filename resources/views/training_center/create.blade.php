@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                
                <!-- Encabezado del Formulario -->
                <div class="text-center mb-4">
                    <div class="bg-success-subtle text-success d-inline-flex p-3 rounded-circle mb-2">
                        <span class="material-symbols-outlined fs-2">domain</span>
                    </div>
                    <h3 class="fw-bold m-0">Registro Centro de Formación</h3>
                    <p class="text-secondary small">Ingresa la sede y ubicación del nuevo centro</p>
                </div>

                <!-- Mensaje de éxito -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined fs-5">check_circle</span>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('training_center.store') }}" method="POST">
                    @csrf
                    
                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nombre del Centro *</label>
                        <input 
                            type="text" 
                            class="form-control form-control-lg fs-6 @error('name') is-invalid @enderror" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}"
                            placeholder="Ej. Centro de Teleinformática y Producción Industrial" 
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Ubicación -->
                    <div class="mb-4">
                        <label for="location" class="form-label fw-semibold">Ubicación / Sede *</label>
                        <input 
                            type="text" 
                            class="form-control form-control-lg fs-6 @error('location') is-invalid @enderror" 
                            id="location" 
                            name="location" 
                            value="{{ old('location') }}"
                            placeholder="Ej. Popayán, Cauca" 
                            required>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Acciones -->
                    <div class="d-flex gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-light w-50 py-2 border fw-semibold">Cancelar</a>
                        <button 
                            type="submit" 
                            class="btn btn-sena w-50 py-2 fw-semibold d-inline-flex align-items-center justify-content-center gap-2"
                            onclick="this.disabled=true; this.form.submit();">
                            <span class="material-symbols-outlined fs-5"></span>
                            Guardar Centro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection