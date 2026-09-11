@extends('layouts.App')

@section('content')

<h1>Detalle Oferta</h1>

<div class="card p-4">
    <p><strong>ID:</strong> {{ $offer->id }}</p>
    <p><strong>Programa:</strong> {{ $offer->name }}</p>
    <p><strong>Nivel:</strong> {{ $offer->level === 'tecnologo' ? 'Tecnólogo' : 'Técnico' }}</p>
    <p><strong>Área:</strong> {{ $offer->area->name ?? 'Sin asignar' }}</p>
    <p><strong>Duración:</strong> {{ $offer->duration_months ? $offer->duration_months.' meses' : '-' }}</p>
    <p><strong>Descripción:</strong> {{ $offer->description ?? '-' }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($offer->status) }}</p>
</div>

<h4 class="mt-4">Fichas de esta Oferta</h4>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No. Ficha</th>
            <th>Centro</th>
            <th>Ambiente</th>
            <th>Cupo</th>
            <th>Inscritos</th>
        </tr>
    </thead>
    <tbody>
        @forelse($offer->courses as $course)
        <tr>
            <td>{{ $course->course_number }}</td>
            <td>{{ $course->training_center->name ?? '-' }}</td>
            <td>{{ $course->environment->name ?? '-' }}</td>
            <td>{{ $course->quota ?? 'Sin límite' }}</td>
            <td>{{ $course->apprentices->count() }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">Esta oferta aún no tiene fichas creadas.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ url('/offer') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection

