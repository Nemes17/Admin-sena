<nav class="navbar navbar-expand-lg" style="background-color: #3DAE2B;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{asset("logo-sena.png")}}" 
                 alt="SENA" height="50" class="me-2">
            <span class="text-white fw-bold">Admin SENA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" 
                       data-bs-toggle="dropdown">Registrar</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/area/create">Área</a></li>
                        <li><a class="dropdown-item" href="/training_center/create">Centro de Formación</a></li>
                        <li><a class="dropdown-item" href="/computer/create">Computador</a></li>
                        <li><a class="dropdown-item" href="/course/create">Curso</a></li>
                        <li><a class="dropdown-item" href="/teacher/create">Instructor</a></li>
                        <li><a class="dropdown-item" href="/apprentice/create">Aprendiz</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/course_teacher/create">Asignar Instructor a Curso</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" 
                       data-bs-toggle="dropdown">Ver Registros</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/area">Ver Áreas</a></li>
                        <li><a class="dropdown-item" href="/training_center">Ver Centros</a></li>
                        <li><a class="dropdown-item" href="/computer">Ver Computadores</a></li>
                        <li><a class="dropdown-item" href="/course">Ver Cursos</a></li>
                        <li><a class="dropdown-item" href="/teacher">Ver Instructores</a></li>
                        <li><a class="dropdown-item" href="/apprentice">Ver Aprendices</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/course_teacher">Ver Asignaciones</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Barra de búsqueda centrada/flexible -->
            <form class="d-flex align-items-center mx-auto" role="search" style="gap: 6px;">
                <input class="form-control form-control-sm" type="search" placeholder="Buscar..." aria-label="Buscar"
                       style="border-radius: 20px; border: none; padding: 6px 14px; width: 220px;">
                <button class="btn btn-sm d-flex align-items-center justify-content-center" type="submit"
                        style="background-color: #fff; color: #3DAE2B; border-radius: 50%; width: 36px; height: 36px; border: none;">
                    <i class="bi bi-search"></i> 
                </button>
            </form>

            <!-- Perfil de usuario -->
            <div class="dropdown ms-3">
                <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" href="#"
                   data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=fff&color=3DAE2B" 
                         alt="Perfil" width="36" height="36" class="rounded-circle me-2">
                    <span class="fw-bold">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mi Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route("welcome")}}">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>