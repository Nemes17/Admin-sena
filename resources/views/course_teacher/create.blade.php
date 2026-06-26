<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Instructor a Curso</title>
</head>
<body>
     <h2>Asignar Instructor a Curso</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('course_teacher.store') }}" method="POST">
        @csrf

        <label>Course:</label>
        <select name="course_id">
            <option value="">-- Seleccionar Curso --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->{'course number'} }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Teacher:</label>
        <select name="teacher_id">
            <option value="">-- Seleccionar Instructor --</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Asignar</button>
    </form>
</body>
</html>