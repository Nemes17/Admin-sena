<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SENA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sena-green: #39A900;
            --sena-green-dark: #2C7A00;
            --sena-green-light: #E8F5E0;
            --sena-orange: #FF7300;
            --sena-gray: #6C757D;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8F9FA;
        }

        /* Tarjetas del dashboard */
        .card-dashboard {
            border: none;
            border-radius: 16px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            overflow: hidden;
        }
        .card-dashboard:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(57, 169, 0, 0.15) !important;
        }
        .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: var(--sena-green-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
        }

        /* Botones institucionales */
        .btn-sena {
            background-color: var(--sena-green);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 8px 20px;
            transition: background-color 0.2s ease;
        }
        .btn-sena:hover {
            background-color: var(--sena-green-dark);
            color: #fff;
        }

        /* Hero de la página de inicio */
        .hero-section {
            background: linear-gradient(135deg, var(--sena-green) 0%, var(--sena-green-dark) 100%);
            border-radius: 20px;
            color: #fff;
            padding: 3rem 2rem;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    @include('includes.Navbar')

    <main class="flex-grow-1">
        <div class="container mt-4 mb-5">
            @yield('content')
        </div>
    </main>

    @include('includes.Footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>