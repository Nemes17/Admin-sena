@extends('layouts.App')

@section('content')

<h1>Lista de Ofertas</h1>
<a href="{{ url('/offer/create') }}" class="btn btn-primary mb-3">+ Agregar Oferta</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Programa</th>
            <th>Nivel</th>
            <th>Área</th>
            <th>Fichas</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($offers as $offer)
        <tr>
            <td>{{ $offer->id }}</td>
            <td>{{ $offer->name }}</td>
            <td>{{ $offer->level === 'tecnologo' ? 'Tecnólogo' : 'Técnico' }}</td>
            <td>{{ $offer->area->name ?? 'Sin asignar' }}</td>
            <td>{{ $offer->courses_count }}</td>
            <td>
                <span class="badge {{ $offer->status === 'abierta' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($offer->status) }}
                </span>
            </td>
            <td>
            <a href="{{ url('/offer/'.$offer->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ url('/offer/'.$offer->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ url('/offer/'.$offer->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('¿Eliminar este registro?')">
            Eliminar
            </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

