<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Aprendiz</title>
</head>
<body>
     <h2>Formulario Aprendiz</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('apprentice.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email">
        <br><br>

        <label>Cell Number:</label>
        <input type="text" name="cell_number">
        <br><br>

        <label>Course:</label>
        <select name="course_id">
            <option value="">-- Seleccionar --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->{'course number'} }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Computer:</label>
        <select name="computer_id">
            <option value="">-- Seleccionar --</option>
            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">
                    {{ $computer->brand }} - {{ $computer->number }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>