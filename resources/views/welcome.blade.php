<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">

    <title>Admin SENA</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Material Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        :root {
            --sena-green: #3dae2b;
            --sena-green-dark: #278c1c;
            --sena-green-hover: #1f7516;
            --sena-green-light: #e8f5e5;

            --sena-bg: #f5f6f7;
            --sena-section: #ffffff;
            --sena-text: #273444;
            --sena-muted: #667085;
            --sena-border: #dfe3e6;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Hanken Grotesk', sans-serif;
            background-color: var(--sena-bg);
            color: var(--sena-text);
        }

        /* NAVBAR */

        .navbar-sena {
            min-height: 58px;
            background: var(--sena-green);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
        }

        .navbar-sena .navbar-brand,
        .navbar-sena .nav-link {
            color: #ffffff !important;
        }

        .brand-icon {
            color: #ffffff;
            font-size: 26px;
        }

        .nav-home {
            position: relative;
            opacity: 0.95;
        }

        .nav-home:hover {
            color: #ffffff !important;
            opacity: 1;
        }

        .nav-home::after {
            content: "";
            position: absolute;
            left: 8px;
            right: 8px;
            bottom: -2px;
            height: 2px;
            background: #ffffff;
            border-radius: 20px;
        }

        /* BOTÓN NAVBAR */

        .btn-sena {
            background-color: #ffffff;
            border: 1px solid #ffffff;
            color: var(--sena-green-dark);
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);
            transition: all 0.25s ease;
        }

        .btn-sena:hover {
            background-color: #f1f1f1;
            border-color: #f1f1f1;
            color: var(--sena-green-dark);
            transform: translateY(-2px);
        }

        /* BOTÓN INGRESAR */

        .btn-login {
            background-color: var(--sena-green-dark);
            border: 1px solid var(--sena-green-dark);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 6px 15px rgba(39, 140, 28, 0.22);
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            background-color: var(--sena-green-hover);
            border-color: var(--sena-green-hover);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(39, 140, 28, 0.25);
        }

        /* HERO */

        .hero-section {
            background: #ffffff;
            overflow: hidden;
        }

        .hero-row {
            min-height: 520px;
        }

        .hero-content {
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: var(--sena-green-light);
            color: var(--sena-green-dark);
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .hero-title {
            margin-bottom: 24px;
            font-size: clamp(2.5rem, 4vw, 4.3rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.04em;
            color: var(--sena-text);
        }

        .hero-title span {
            display: block;
            color: var(--sena-green-dark);
        }

        .hero-description {
            max-width: 520px;
            margin-bottom: 28px;
            color: var(--sena-muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        /* HERO DERECHO */

        .hero-right {
            position: relative;
            min-height: 520px;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 50% 35%,
                    rgba(255, 255, 255, 0.85),
                    transparent 42%
                ),
                #edf4ec;
        }

        .hero-watermark {
            position: absolute;
            right: -60px;
            bottom: -60px;
            color: rgba(61, 174, 43, 0.13);
            font-size: 300px;
            transform: rotate(-12deg);
            pointer-events: none;
        }

        .hero-icons {
            position: relative;
            z-index: 2;
        }

        .floating-card {
            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--sena-green-dark);
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid #e5e5e5;

            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);

            transition: transform 0.25s ease;
        }

        .floating-card:hover {
            transform: translateY(-5px);
        }

        .floating-small {
            width: 72px;
            height: 72px;
            border-radius: 16px;
            transform: rotate(-6deg);
        }

        .floating-large {
            width: 116px;
            height: 116px;
            border-radius: 18px;
            background: #dff2d9;
            transform: translateY(18px);
        }

        .floating-bottom {
            width: 92px;
            height: 92px;
            border-radius: 18px;
            margin-right: 85px;
        }

        /* MÓDULOS */

        .modules-section {
            padding-top: 80px;
            padding-bottom: 70px;
            background-color: var(--sena-bg);
        }

        .section-title {
            margin-bottom: 14px;
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--sena-text);
        }

        .section-description {
            max-width: 620px;
            margin: 0 auto;
            color: var(--sena-muted);
            line-height: 1.7;
        }

        /* TARJETAS */

        .module-card {
            position: relative;
            min-height: 245px;
            overflow: hidden;

            border: 1px solid var(--sena-border) !important;
            border-radius: 10px;
            background: #ffffff;

            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }

        .module-card:hover {
            transform: translateY(-5px);
            border-color: var(--sena-green) !important;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.10);
        }

        .module-card-accent {
            position: absolute;
            top: 0;
            right: 0;

            width: 32%;
            height: 100%;

            background: #f0f2f4;

            border-bottom-left-radius: 35px;

            pointer-events: none;
        }

        .module-content {
            position: relative;
            z-index: 2;

            display: flex;
            flex-direction: column;

            height: 100%;
        }

        .icon-box-green {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 48px;
            height: 48px;

            flex: 0 0 48px;

            margin-bottom: 22px;

            border-radius: 10px;

            background-color: var(--sena-green);

            color: #ffffff;

            box-shadow: 0 5px 12px rgba(61, 174, 43, 0.20);
        }

        .module-title {
            margin-bottom: 10px;
            font-size: 1.08rem;
            font-weight: 700;
            color: var(--sena-text);
        }

        .module-description {
            color: var(--sena-muted);
            font-size: 0.9rem;
            line-height: 1.65;
        }

        .module-line {
            width: 100%;
            height: 1px;
            margin-top: auto;
            border: 0;
            background: #e8ecef;
        }

        /* FOOTER */

        .footer-sena {
            background-color: var(--sena-green);
            border-top: none;
            color: #ffffff;
        }

        .footer-brand {
            color: #ffffff;
            font-weight: 800;
        }

        .footer-sena .text-secondary {
            color: rgba(255, 255, 255, 0.88) !important;
        }

        .footer-links a {
            color: #ffffff;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .footer-links a:hover {
            color: #d9f4d3;
        }

        /* RESPONSIVE */

        @media (max-width: 991.98px) {

            .hero-row {
                min-height: auto;
            }

            .hero-right {
                min-height: 430px;
            }

            .hero-content {
                max-width: 100%;
            }

            .navbar-sena .navbar-collapse {
                padding: 15px;
                margin-top: 10px;
                background: var(--sena-green);
            }
        }

        @media (max-width: 575.98px) {

            .hero-title {
                font-size: 2.55rem;
            }

            .hero-right {
                min-height: 340px;
            }

            .floating-large {
                width: 95px;
                height: 95px;
            }

            .floating-bottom {
                margin-right: 50px;
            }

            .modules-section {
                padding-top: 55px;
            }
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-sena fixed-top px-4 py-2">

        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold"
               href="{{route("welcome")}}">

                <span class="material-symbols-outlined brand-icon">
                    architecture
                </span>

                <span>Admin SENA</span>

            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSena"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSena">

                <div class="navbar-nav me-auto ms-lg-4">

                    <a class="nav-link fw-bold small nav-home"
                       href="{{route("welcome")}}">
                        Home
                    </a>

                </div>

                <a
                    href="{{route("login")}}"
                    class="btn btn-sena rounded-pill px-4 py-2"
                >
                    Iniciar Sesión
                </a>

            </div>

        </div>

    </nav>


    <main class="pt-5">

        <!-- HERO -->

        <section class="container-fluid p-0 hero-section">

            <div class="row g-0 align-items-stretch hero-row">

                <div class="col-lg-6 px-4 px-md-5 py-5 d-flex align-items-center">

                    <div class="hero-content">

                        <div class="hero-badge mb-4">

                            <span class="material-symbols-outlined">
                                verified
                            </span>

                            GESTIÓN INSTITUCIONAL

                        </div>

                        <h1 class="hero-title">

                            Sistema de Administración

                            <span>SENA</span>

                        </h1>

                        <p class="hero-description">

                            Plataforma centralizada para la gestión eficiente
                            de Centros de Formación, Instructores y Aprendices.

                        </p>

                        <!-- RUTA EXACTA QUE ME DISTE -->

                        <a
                            href="{{route("login")}}"
                            class="btn btn-login btn-lg px-4 py-3 rounded-3 d-inline-flex align-items-center gap-2"
                        >

                            <span class="material-symbols-outlined">
                                login
                            </span>

                            Ingresar al Sistema

                        </a>

                    </div>

                </div>


                <!-- HERO DERECHO -->

                <div class="col-lg-6 hero-right d-flex align-items-center justify-content-center">

                    <span class="material-symbols-outlined hero-watermark">
                        architecture
                    </span>

                    <div class="hero-icons d-flex flex-column gap-4 align-items-center">

                        <div class="d-flex gap-4 align-items-center">

                            <div class="floating-card floating-small">

                                <span class="material-symbols-outlined">
                                    analytics
                                </span>

                            </div>

                            <div class="floating-card floating-large">

                                <span
                                    class="material-symbols-outlined"
                                    style="font-size: 48px;"
                                >
                                    groups
                                </span>

                            </div>

                        </div>

                        <div class="floating-card floating-bottom">

                            <span
                                class="material-symbols-outlined"
                                style="font-size: 42px;"
                            >
                                menu_book
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- MÓDULOS -->

        <section class="container modules-section">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    Módulos del Sistema
                </h2>

                <p class="section-description">

                    Explora las diferentes herramientas disponibles para la
                    administración institucional. Inicia sesión para acceder
                    a todas las funcionalidades.

                </p>

            </div>

            <div class="row g-4">

                <!-- ÁREAS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card module-card h-100">

                        <div class="module-card-accent"></div>

                        <div class="card-body p-4 module-content">

                            <div class="icon-box-green">

                                <span class="material-symbols-outlined">
                                    location_on
                                </span>

                            </div>

                            <h3 class="module-title">Áreas</h3>

                            <p class="module-description flex-grow-1">

                                Gestiona los espacios físicos y áreas específicas
                                dentro de los centros de formación.

                            </p>

                            <hr class="module-line">

                        </div>

                    </div>

                </div>


                <!-- CENTROS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card module-card h-100">

                        <div class="module-card-accent"></div>

                        <div class="card-body p-4 module-content">

                            <div class="icon-box-green">

                                <span class="material-symbols-outlined">
                                    domain
                                </span>

                            </div>

                            <h3 class="module-title">
                                Centros de Formación
                            </h3>

                            <p class="module-description flex-grow-1">

                                Administra la información y recursos de las
                                diferentes sedes del SENA.

                            </p>

                            <hr class="module-line">

                        </div>

                    </div>

                </div>


                <!-- EQUIPOS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card module-card h-100">

                        <div class="module-card-accent"></div>

                        <div class="card-body p-4 module-content">

                            <div class="icon-box-green">

                                <span class="material-symbols-outlined">
                                    desktop_windows
                                </span>

                            </div>

                            <h3 class="module-title">Equipos</h3>

                            <p class="module-description flex-grow-1">

                                Inventario y control de computadores y equipos
                                tecnológicos disponibles.

                            </p>

                            <hr class="module-line">

                        </div>

                    </div>

                </div>


                <!-- CURSOS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card module-card h-100">

                        <div class="module-card-accent"></div>

                        <div class="card-body p-4 module-content">

                            <div class="icon-box-green">

                                <span class="material-symbols-outlined">
                                    menu_book
                                </span>

                            </div>

                            <h3 class="module-title">Cursos</h3>

                            <p class="module-description flex-grow-1">

                                Administra los cursos y programas disponibles
                                dentro de la institución.

                            </p>

                            <hr class="module-line">

                        </div>

                    </div>

                </div>


                <!-- INSTRUCTORES -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card module-card h-100">

                        <div class="module-card-accent"></div>

                        <div class="card-body p-4 module-content">

                            <div class="icon-box-green">

                                <span class="material-symbols-outlined">
                                    account_box
                                </span>

                            </div>

                            <h3 class="module-title">
                                Instructores
                            </h3>

                            <p class="module-description flex-grow-1">

                                Gestión y administración de los instructores
                                pertenecientes al SENA.

                            </p>

                            <hr class="module-line">

                        </div>

                    </div>

                </div>


                <!-- APRENDICES -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card module-card h-100">

                        <div class="module-card-accent"></div>

                        <div class="card-body p-4 module-content">

                            <div class="icon-box-green">

                                <span class="material-symbols-outlined">
                                    school
                                </span>

                            </div>

                            <h3 class="module-title">
                                Aprendices
                            </h3>

                            <p class="module-description flex-grow-1">

                                Administra y consulta la información de los
                                aprendices registrados en el sistema.

                            </p>

                            <hr class="module-line">

                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-5 text-center">

                <p class="d-inline-flex align-items-center gap-2 text-secondary small">

                    <span
                        class="material-symbols-outlined"
                        style="color: #3dae2b;"
                    >
                        lock
                    </span>

                    Inicie sesión para acceder a las funcionalidades completas
                    de los módulos.

                </p>

            </div>

        </section>

    </main>


    <!-- FOOTER -->

    <footer class="footer-sena py-4">

        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

            <div class="d-flex align-items-center gap-2 footer-brand">

                <span class="material-symbols-outlined">
                    architecture
                </span>

                SENA

            </div>

            <div class="text-secondary small text-center">

                © 2026 Servicio Nacional de Aprendizaje SENA -
                Todos los derechos reservados

            </div>

            <div class="footer-links d-flex flex-wrap justify-content-center gap-3 small">
                <a href="#">
                    Privacidad
                </a>

                <a href="#">
                    Términos de Uso
                </a>

                <a href="#">
                    Contacto
                </a>
                <a href="https://www.sena.edu.co" target="_blank">
                    Portal SENA
                </a>

            </div>

        </div>

    </footer>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>