@extends('layouts.App')

@section('content')

<h1>Bitácora de Novedades</h1>
<a href="{{ route('incident.create') }}" class="btn btn-primary mb-3">+ Reportar Novedad</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Fecha</th>
            <th>Ambiente</th>
            <th>Computador</th>
            @if($rol === 'admin')
                <th>Reportado por</th>
            @endif
            <th>Descripción</th>
            <th>Estado</th>
            @if($rol === 'admin')
                <th>Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($incidents as $incident)
        <tr>
            <td>{{ $incident->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $incident->environment->name ?? '-' }}</td>
            <td>{{ $incident->computer ? $incident->computer->brand.' (No. '.$incident->computer->number.')' : '-' }}</td>
            @if($rol === 'admin')
                <td>{{ $incident->reportedBy->name ?? '-' }}</td>
            @endif
            <td>{{ $incident->description }}</td>
            <td>
                <span class="badge {{ $incident->status === 'resuelto' ? 'bg-success' : 'bg-warning text-dark' }}">
                    {{ ucfirst($incident->status) }}
                </span>
            </td>
            @if($rol === 'admin')
                <td>
                    @if($incident->status === 'pendiente')
                    <form action="{{ route('incident.resolve', $incident->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Marcar Resuelto</button>
                    </form>
                    @endif
                </td>
            @endif
        </tr>
        @empty
        <tr><td colspan="{{ $rol === 'admin' ? 6 : 4 }}" class="text-center text-muted">No hay novedades registradas.</td></tr>
        @endforelse
    </tbody>
</table>

@endsection

