<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Centro de Formación</title>
</head>
<body>
     <h2>Formulario Centro de Formación</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('training_center.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <br><br>
        <label>Location:</label>
        <input type="text" name="location">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>