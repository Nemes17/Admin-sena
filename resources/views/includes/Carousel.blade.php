<div id="senaCarousel" class="carousel slide sena-carousel mb-4" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner rounded-4 overflow-hidden">
        <div class="carousel-item active">
            <img src="{{ asset('Images/sena-1.png') }}" class="d-block w-100 sena-carousel-img" alt="Formación SENA">
            <div class="carousel-caption d-none d-md-block">
                <h5>Formación para el trabajo</h5>
                <p>Ambientes equipados con tecnología de punta.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('Images/sena-2.png') }}" class="d-block w-100 sena-carousel-img" alt="Aprendices SENA">
            <div class="carousel-caption d-none d-md-block">
                <h5>Aprendices SENA</h5>
                <p>Miles de jóvenes formándose cada año en todo el país.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('Images/sena-3.png') }}" class="d-block w-100 sena-carousel-img" alt="Centros de Formación SENA">
            <div class="carousel-caption d-none d-md-block">
                <h5>Centros de Formación</h5>
                <p>Cobertura nacional con instructores especializados.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#senaCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#senaCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<style>
    .sena-carousel-img {
        height: 340px;
        object-fit: cover;
    }
    @media (max-width: 768px) {
        .sena-carousel-img {
            height: 220px;
        }
    }
</style>

