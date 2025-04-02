<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reportes</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header id="barra" class="navegador">
            <div class="logo">
                <h1 id="MR">MyReport</h1>
                <img src="{{ asset('Imagenes/Logo.png') }}" alt="Aqui va el logo" id="logo">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/reports">Reportes</a></li>
                    <li><a href="#">Acerca de nosotros</a></li>
                    <li><a href="/resolvedMatters">Problemas resueltos</a></li>
                    <li id="icon_user" class="user-menu">
                        @if (Auth::check())
                            <div class="user-icon" onclick="toggleMenu()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </div>
                            
                            <ul class="submenu" id="submenu">
                                <li id="corregir"><a href="/myreports">Mis Reportes</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <!-- Si no está autenticado, mostramos el botón de login -->
                            <a href="{{ route('login') }}" class="btn"><button>Log in</button></a>
                        @endif
                    </li>
                </ul>
            </nav>
            <label for="toggle" id="lbl_toggle">
                <div id="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
                    </svg>
                </div>
            </label>
            <input type="checkbox" id="toggle">
    </header>
    <section class="ContenidoMyR" id="MisReportes_lm">
        <div class="Titulo_MyR" id="Mis_Reportes_lm">
            <div>
                <h1>MIS REPORTES</h1>
            </div>
        </div>
        <div class="contenedor-cards">
            @foreach($reportes as $reporte)
                <div class="card_misreportes">
                    <!-- Mostrar la imagen si está disponible -->
                    <div class="card_misreportes_img">
                        @if($reporte->imagen_referencia)
                            @php
                                $imagenes = json_decode($reporte->imagen_referencia);
                            @endphp
                            @if(!empty($imagenes) && count($imagenes) > 0)
                                @foreach($imagenes as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="Imagen del reporte" class="imagen-reporte" >
                                @endforeach
                            @else
                                <p>No se ha subido ninguna imagen.</p>
                            @endif
                        @else
                            <p>No se ha subido ninguna imagen.</p>
                        @endif
                    </div>
                    <div class="txt_reportes">
                        <!-- <h2>Reporte #{{ $reporte->id }}</h2> -->
                        <p><strong>Fecha del Reporte:</strong> {{ $reporte->fecha_reporte }}</p>
                        <p><strong>Descripción de la problemática:</strong> {{ $reporte->descripcion_problematica }}</p>
                        <p><strong>Ubicación:</strong> {{ $reporte->calle }}, {{ $reporte->colonia }}</p>
                        <p><strong>Descripción de la ubicación:</strong> {{ $reporte->descripcion_ubicacion }}</p>
                        <p id="estado_reporte"><strong>Estado:</strong> {{ $reporte->estado }}</p>
                        @php
                            $partesDireccion = [];

                            if ($reporte->calle) {
                                $partesDireccion[] = $reporte->calle;
                            }
                            if ($reporte->calle_entre_1) {
                                $partesDireccion[] = 'Entre ' . $reporte->calle_entre_1;
                            }
                            if ($reporte->calle_entre_2) {
                                $partesDireccion[] = 'y ' . $reporte->calle_entre_2;
                            }
                            if ($reporte->colonia) {
                                $partesDireccion[] = $reporte->colonia;
                            }

                            // Agregar la ciudad y el país
                            $partesDireccion[] = 'Durango, México';

                            // Unir todas las partes de la dirección con comas
                            $direccion = urlencode(implode(', ', $partesDireccion));
                        @endphp

                        <p><strong>Ubicación:</strong> {{ implode(', ', $partesDireccion) }}
                            @if($direccion)
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $direccion }}" target="_blank">
                                    📍 Ver en Google Maps
                                </a>
                            @else
                                <span style="color: gray;">Ubicación no disponible para Google Maps</span>
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        @if(count($reportes) > 8)
            <button id="verMas">Ver Más</button>
        @endif
    </section>
    <script src="{{ asset('js/back.js') }}"></script>
</body>
</html>