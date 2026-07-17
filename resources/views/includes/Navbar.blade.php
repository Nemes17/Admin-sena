<nav class="navbar navbar-expand-lg" style="background-color: #3DAE2B;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" 
                 alt="SENA" height="50" class="me-2">
            <span class="text-white fw-bold">Admin SENA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
        </div>
    </div>
</nav>