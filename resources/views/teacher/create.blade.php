<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulario Instructor</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email">
        <br><br>

        
        <label>Area:</label>
        <select name="area_id">
            <option value="">-- Seleccionar --</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <br><br>

        
        <label>Training Center:</label>
        <select name="training_center_id">
            <option value="">-- Seleccionar --</option>
            @foreach($trainingCenters as $center)
                <option value="{{ $center->id }}">{{ $center->name }}</option>
            @endforeach
        </select>
        <br><br>
        
        <label>Course:</label>
        <select name="course_id">
        <option value="">-- Seleccionar Curso --</option>
        @foreach($courses as $course)
        <option value="{{ $course->id }}">
            {{ $course->{'course_number'} }}
        </option>
        @endforeach
        </select>
        <br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>