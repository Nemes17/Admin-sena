@extends('layouts.App')

@section('content')

<h1>Asistencia - Ficha {{ $course->course_number }}</h1>
<p class="text-muted">{{ $course->area->name ?? '' }} — {{ $course->training_center->name ?? '' }}</p>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Selector de fecha: al cambiarla, recarga la lista de aprendices con lo ya guardado ese día --}}
<form action="{{ route('attendance.create', $course->id) }}" method="GET" class="row g-2 align-items-end mb-4">
    <div class="col-auto">
        <label class="form-label">Fecha:</label>
        <input type="date" name="date" value="{{ $date }}" class="form-control" onchange="this.form.submit()">
    </div>
</form>

<form action="{{ route('attendance.store', $course->id) }}" method="POST">
    @csrf
    <input type="hidden" name="date" value="{{ $date }}">

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Aprendiz</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($apprentices as $apprentice)
                @php $current = $existing[$apprentice->id]->status ?? null; @endphp
                <tr>
                    <td>{{ $apprentice->name }}</td>
                    <td>
                        <select name="status[{{ $apprentice->id }}]" class="form-select">
                            <option value="presente" @selected($current=='presente')>Presente</option>
                            <option value="tarde" @selected($current=='tarde')>Tarde</option>
                            <option value="ausente" @selected($current=='ausente' || !$current)>Ausente</option>
                        </select>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2" class="text-center text-muted">Esta ficha aún no tiene aprendices inscritos.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if($apprentices->count() > 0)
        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">
            Guardar Asistencia
        </button>
    @endif
</form>

<a href="{{ route('teacher.home') }}" class="btn btn-secondary mt-3">← Volver</a>

@endsection

