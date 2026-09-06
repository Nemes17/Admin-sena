<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Admin SENA</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .login-container {
            height: 100vh;
        }
        /* Lado izquierdo con el color y estilo institucional */
        .brand-side {
            background: linear-gradient(135deg, #3DAE2B 0%, #2a7d1d 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5rem;
        }
        /* Lado derecho con el formulario */
        .form-side {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            padding: 2rem;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
        }
        .btn-sena {
            background-color: #3DAE2B;
            color: white;
            font-weight: 600;
        }
        .btn-sena:hover {
            background-color: #359624;
            color: white;
        }
        .form-control:focus {
            border-color: #3DAE2B;
            box-shadow: 0 0 0 0.25rem rgba(61, 174, 43, 0.25);
        }
    </style>
</head>
<body>

    <div class="container-fluid login-container p-0">
        <div class="row g-0 h-100">
            
            <!-- Lado Izquierdo: Branding institucional (se oculta en celulares para adaptarse) -->
            <div class="col-lg-7 d-none d-lg-flex brand-side">
                <div>
                    <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-3">GESTIÓN INSTITUCIONAL</span>
                    <h1 class="display-5 fw-bold mb-3">Sistema de Administración SENA</h1>
                    <p class="lead opacity-75">Plataforma centralizada para la gestión eficiente de Centros de Formación, Instructores y Aprendices.</p>
                </div>
            </div>

            <!-- Lado Derecho: Formulario de Acceso Limpio -->
            <div class="col-lg-5 form-side">
                <div class="login-box">
                    
                    <div class="mb-4">
                        <h3 class="fw-bold text-dark mb-1">Iniciar Sesión</h3>
                        <p class="text-muted small">Introduce tus credenciales para acceder al sistema.</p>
                    </div>

                    <!-- Mensaje de error -->
                    @if($errors->any())
                        <div class="alert alert-danger py-2 small" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold text-secondary small">Usuario</label>
                            <input type="text" class="form-control form-control-lg fs-6" id="username" name="username" value="{{ old('username') }}" placeholder="Ej: Admin" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-secondary small">Contraseña</label>
                            <input type="password" class="form-control form-control-lg fs-6" id="password" name="password" placeholder="••••••••" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-sena btn-lg py-2">Ingresar al Sistema</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('welcome') }}" class="text-decoration-none text-muted small">
                            ← Volver a la página principal
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>