@extends('layouts.App')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark mb-1">Registro de Ambiente</h2>
                        <p class="text-muted small">Ingresa los datos del nuevo ambiente de formación</p>
                    </div>

                    <form action="{{ route('environment.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                Nombre del Ambiente <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Ej. Sala de Sistemas 1"
                                value="{{ old('name') }}"
                                required
                            >
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label fw-semibold">Capacidad</label>
                            <input
                                type="number"
                                min="0"
                                name="capacity"
                                id="capacity"
                                class="form-control @error('capacity') is-invalid @enderror"
                                placeholder="Ej. 25"
                                value="{{ old('capacity') }}"
                            >
                            @error('capacity')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="training_center_id" class="form-label fw-semibold">Centro de Formación</label>
                            <select name="training_center_id" id="training_center_id" class="form-select">
                                <option value="">-- Seleccionar --</option>
                                @foreach($trainingCenters as $center)
                                    <option value="{{ $center->id }}" @selected(old('training_center_id') == $center->id)>
                                        {{ $center->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2 pt-2">
                            <a href="{{ route('environment.index') }}" class="btn btn-light px-4">
                                <i class="fa-solid fa-xmark me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4" onclick="this.disabled=true; this.form.submit();">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Ambiente
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

