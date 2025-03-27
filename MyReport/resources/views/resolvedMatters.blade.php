<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resolved Matters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styleLR-dark-light.css') }}">
    <script src="{{ asset('/js/darklight.js') }}"defer></script>
</head>
<body class ="body-resolvedMatters">
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                MyReport
                <img src="{{ asset('Imagenes/Logo.png') }}" alt="Logo" id="logoRM">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/') }}" >Inicio</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-light" href="/reports">Reportes</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-light" href="/aboutUs">Acerca de nosotros</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-light" href="/resolvedMatters">Problemas resueltos</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-light" href="{{ route('login') }}">Iniciar sesion</a>
                    </li>
                    <li class="nav-item mx-3">
                        <button id="toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
                                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5.0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="Fondo-RM">
            <img src="{{ asset('/Imagenes/FondoRM.jpg') }}" alt="error" class = "Fondo-resolvedMatters">
        </div>
    </section>
    <section>
        <div class="contenedor-cards">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
    
            <div class="card" style="width: 18rem;">
                <img src="Fondo" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
    
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
