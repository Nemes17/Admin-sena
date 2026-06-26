<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Computador</title>
</head>
<body>
    <h2>Formulario Computador</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('computer.store') }}" method="POST">
        @csrf
        <label>Brand:</label>
        <input type="text" name="brand">
        <br><br>
        <label>Number:</label>
        <input type="number" name="number">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>