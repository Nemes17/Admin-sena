@extends('layouts.App')

@section('content')

<h1>Mi Asistencia</h1>

@if(!$apprentice)
    <div class="alert alert-warning">
        Tu usuario aún no está vinculado a un registro de Aprendiz.
    </div>
@else
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @forelse($attendances as $attendance)
        <tr>
            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d/m/Y') }}</td>
            <td>
                @php
                    $badge = match($attendance->status) {
                        'presente' => 'bg-success',
                        'tarde'    => 'bg-warning text-dark',
                        'ausente'  => 'bg-danger',
                        default    => 'bg-secondary',
                    };
                @endphp
                <span class="badge {{ $badge }}">{{ ucfirst($attendance->status) }}</span>
            </td>
        </tr>
        @empty
        <tr><td colspan="2" class="text-center text-muted">Aún no tienes registros de asistencia.</td></tr>
        @endforelse
    </tbody>
</table>
@endif

<a href="{{ route('apprentice.home') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection

