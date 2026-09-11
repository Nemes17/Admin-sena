@extends('layouts.App')

@section('content')

<h1 class="mb-4">Ofertas Disponibles</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($apprentice && $apprentice->course_id)
    <div class="alert alert-info">
        Ya estás inscrito en la ficha <strong>{{ $apprentice->course->course_number ?? '' }}</strong>.
        Si quieres cambiarte de programa, primero debes retirarte.
        <form action="{{ route('apprentice.retirarme') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm ms-2"
                    onclick="return confirm('¿Seguro que quieres retirarte de tu curso actual?')">
                Retirarme
            </button>
        </form>
    </div>
@endif

@foreach($offers as $offer)
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h4 class="card-title mb-1">{{ $offer->name }}</h4>
                <span class="badge {{ $offer->level === 'tecnologo' ? 'bg-primary' : 'bg-info' }}">
                    {{ $offer->level === 'tecnologo' ? 'Tecnólogo' : 'Técnico' }}
                </span>
                <span class="text-muted ms-2">{{ $offer->area->name ?? '' }}</span>
            </div>
            @if($offer->duration_months)
                <span class="text-muted">{{ $offer->duration_months }} meses</span>
            @endif
        </div>

        @if($offer->description)
            <p class="mt-2">{{ $offer->description }}</p>
        @endif

        <h6 class="mt-3">Fichas disponibles:</h6>
        <table class="table table-sm table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No. Ficha</th>
                    <th>Centro</th>
                    <th>Ambiente</th>
                    <th>Cupos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($offer->courses as $course)
                    @php $cupos = $course->cuposDisponibles(); @endphp
                    <tr>
                        <td>{{ $course->course_number }}</td>
                        <td>{{ $course->training_center->name ?? '-' }}</td>
                        <td>{{ $course->environment->name ?? '-' }}</td>
                        <td>{{ is_null($cupos) ? 'Sin límite' : $cupos }}</td>
                        <td>
                            <form action="{{ route('apprentice.inscribirse', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"
                                    {{ ($apprentice && $apprentice->course_id) || (!is_null($cupos) && $cupos <= 0) ? 'disabled' : '' }}>
                                    Inscribirme
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Aún no hay fichas abiertas para este programa.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endforeach

@endsection

