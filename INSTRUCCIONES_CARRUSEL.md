# Instrucciones para el agente (Antigravity)

Actúa como desarrollador Laravel senior. Implementa TODO lo que está en este
archivo dentro del proyecto Admin-Sena que tienes abierto.

## Qué se va a agregar

Un carrusel de fotos institucional del SENA (usando el componente Carousel de
Bootstrap 5, que el proyecto ya carga) en 4 lugares:
1. El home público (`welcome.blade.php`), sin necesidad de iniciar sesión.
2. El home del Administrativo (`home.blade.php`).
3. El home del Instructor (`teacher/home.blade.php`).
4. El home del Aprendiz (`apprentice/home.blade.php`).

Para no repetir código 4 veces (y evitar que quede duplicado o inconsistente),
el carrusel se define UNA sola vez como un partial reutilizable en
`resources/views/includes/Carousel.blade.php`, y se incluye con
`@include('includes.Carousel')` en los otros 3 archivos.

## Reglas obligatorias

1. Crea el archivo marcado como **CREAR** en la ruta exacta indicada.
2. Para los archivos marcados como **MODIFICAR**, solo agrega la línea/bloque
   indicado en el lugar exacto que te señalo (busca el texto de referencia
   "antes de" / "después de"). No reordenes ni reescribas el resto del
   archivo.
3. NO agregues ningún comentario de marca de agua, firma de IA ni texto tipo
   "Generado por IA", "Código generado con Claude/Gemini/ChatGPT",
   "AI-generated", etc. El código debe verse como si lo hubiera escrito yo.
4. SÍ agrega comentarios breves en español (una línea) donde ya los pongo yo
   en el código de referencia.
5. MUY IMPORTANTE — evita dejar código duplicado o en conflicto: si alguno de
   estos 4 archivos ya tiene algo parecido a un carrusel o a un `@include`
   repetido, REEMPLAZA esa parte en vez de agregar una copia nueva. Antes de
   terminar, revisa cada archivo completo una vez para confirmar que
   `@include('includes.Carousel')` aparece UNA sola vez por archivo.
6. No toques `resources/views/Layouts/App.blade.php` ni el `<script>` de
   Bootstrap: el proyecto ya carga `bootstrap.bundle.min.js`, que incluye el
   JS necesario para que el carrusel funcione (autoplay, flechas, indicadores)
   sin que tengas que agregar ningún script adicional.
7. Al final, dame un resumen corto de qué archivos creaste y cuáles modificaste.
8. PROHIBIDO ejecutar cualquier comando de Git (`git add`, `git commit`,
   `git push`, `git reset`, etc.) o cualquier acción relacionada con el
   control de versiones. Solo debes crear y modificar los archivos indicados
   en el sistema de archivos. El control de versiones (commit, push) lo hago
   yo manualmente después de revisar los cambios.

---

## ARCHIVO A CREAR: resources/views/includes/Carousel.blade.php

```php
{{-- Carrusel institucional reutilizable (imágenes del SENA) --}}
<div id="senaCarousel" class="carousel slide sena-carousel mb-4" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner rounded-4 overflow-hidden">
        <div class="carousel-item active">
            <img src="{{ asset('images/carousel/sena-1.jpg') }}" class="d-block w-100 sena-carousel-img" alt="Formación SENA">
            <div class="carousel-caption d-none d-md-block">
                <h5>Formación para el trabajo</h5>
                <p>Ambientes equipados con tecnología de punta.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel/sena-2.jpg') }}" class="d-block w-100 sena-carousel-img" alt="Aprendices SENA">
            <div class="carousel-caption d-none d-md-block">
                <h5>Aprendices SENA</h5>
                <p>Miles de jóvenes formándose cada año en todo el país.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel/sena-3.jpg') }}" class="d-block w-100 sena-carousel-img" alt="Centros de Formación SENA">
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
```

---

## MODIFICAR: resources/views/welcome.blade.php

Busca el cierre de la sección `hero-section` y la apertura de la sección
`modules-section` (deben verse así, seguidas, con una línea en blanco entre
ellas):

```php
        </section>


        <!-- MÓDULOS -->

        <section class="container modules-section">
```

Insértale el carrusel justo en medio, quedando así:

```php
        </section>


        <!-- CARRUSEL INSTITUCIONAL -->

        <section class="container py-4">
            @include('includes.Carousel')
        </section>


        <!-- MÓDULOS -->

        <section class="container modules-section">
```

## MODIFICAR: resources/views/home.blade.php (home del Administrativo)

Busca el cierre del bloque de bienvenida y el inicio de las tarjetas (deben
verse así, seguidos):

```php
    <hr>
</div>

<div class="row text-center mt-4">
```

Insértale el carrusel entre ambos, quedando así:

```php
    <hr>
</div>

@include('includes.Carousel')

<div class="row text-center mt-4">
```

## MODIFICAR: resources/views/teacher/home.blade.php (home del Instructor)

Busca el cierre del bloque de bienvenida y el `@if(!$teacher)` que viene
justo después:

```php
    <hr>
</div>

@if(!$teacher)
```

Insértale el carrusel entre ambos, quedando así:

```php
    <hr>
</div>

@include('includes.Carousel')

@if(!$teacher)
```

## MODIFICAR: resources/views/apprentice/home.blade.php (home del Aprendiz)

Busca el cierre del bloque de bienvenida y el `@if(!$apprentice)` que viene
justo después (si ya le agregaste el botón de "Ver Ofertas Disponibles" con
las instrucciones anteriores, el `<hr>` y el `@if(!$apprentice)` siguen
estando igual de seguidos, así que el punto de inserción no cambia):

```php
    <hr>
</div>

@if(!$apprentice)
```

Insértale el carrusel entre ambos, quedando así:

```php
    <hr>
</div>

@include('includes.Carousel')

@if(!$apprentice)
```

---

## PASO FINAL — Fotos del carrusel (esto lo haces tú, no el agente)

El componente busca 3 imágenes en `public/images/carousel/`:
- `public/images/carousel/sena-1.jpg`
- `public/images/carousel/sena-2.jpg`
- `public/images/carousel/sena-3.jpg`

1. Crea esa carpeta dentro de `public/images/carousel/` si no existe.
2. Copia ahí 3 fotos relacionadas al SENA (idealmente tuyas, de tu centro de
   formación, o imágenes libres de derechos de autor — no uses fotos de
   noticias o de redes sociales sin permiso, por temas de derechos de autor).
3. Asegúrate de que se llamen exactamente `sena-1.jpg`, `sena-2.jpg` y
   `sena-3.jpg` (o cambia el nombre en `Carousel.blade.php` si prefieres
   usar otros nombres o `.png`).

Si por ahora no tienes las fotos a la mano, el carrusel simplemente se verá
con el ícono de "imagen rota" del navegador hasta que las agregues — no rompe
nada del resto de la página.
