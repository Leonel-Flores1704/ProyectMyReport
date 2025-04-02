<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyReport</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                <li><a href="/reports">Reports</a></li>
                <li><a href="/about-us">About us</a></li>
                <li><a href="/resolvedMatters">Resolved Matters</a></li>
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
    <section id="fondo" class="hero">
        <div class="contenido">
            <h1> TU VOZ CUENTA, REPORTA, <br> MEJORA, TRANSFORMA </h1>
            <p class="subtitulo"> ¡REPORTA HOY, REPARA MAÑANA! </p>
            <button class="boton"> ¡Reporta Ya! </button>
        </div>
        <div class="ubicacion">
            <i class="fas fa-map-marker-alt"></i>
            Durango, Durango, México <br> boulevard Francisco Villa
        </div>
    </section>
    <!-- Escribir fuera del section anterior -->
    <div class="Titulo" id="TLM">
        <h1>Nuestros Servicios</h1>
    </div>
    <section class="movimiento" id="prueba">
        <div class="carrusel">
            <!-- intento de carrusel hecho por mi -->
            <div class="left">
                <h1 class="titulo">Baches</h1>
                <p>Reporta baches en carretera que causan problemas viales asi como accidentes y daños materiales a tu auto</p>
                <button class="boton"> ¡Reporta Ya! </button>
            </div>
            <div class="fotos">
                <img src="{{ asset('Imagenes/slide-1.jpg') }}" alt="error">    
                <p>Calle Torreon</p>
            </div>
            
        </div>
        <div class="carrusel">
            <div class="left">
                <h1 class="titulo">Alumbrado público no funcional</h1>
                <p>Reporta alumbrado público que no este funcionando para que caminar de noche no sea un desafio.</p>
                <button class="boton"> ¡Reporta Ya! </button>
            </div>
            <div class="fotos">
                <img src="{{ asset('Imagenes/Alumbrado.jpg') }}" alt="error">    
                <p>Tierra y libertad</p>
            </div>
        </div>
        <div class="carrusel">
            <div class="left">
                <h1 class="titulo">Focos de infección</h1>
                <p>Reporta focos de infección causantes de enfermedades que puede causar daños a tus seres queridos</p>
                <button class="boton"> ¡Reporta Ya! </button>
            </div>
            <div class="fotos">
                <img src="{{ asset('Imagenes/Focos-Infeccion.avif') }}" alt="error">    
                <p>Primo de verdad</p>
            </div>
            
        </div>
        <div class="carrusel">
            <div class="left">
                <h1 class="titulo">Baches</h1>
                <p>Reporta baches en carretera que causan problemas viales asi como accidentes y daños materiales a tu auto</p>
                <button class="boton"> ¡Reporta Ya! </button>
            </div>
            <div class="fotos">
                <img src="{{ asset('Imagenes/Imagen-fondo.jpg') }}" alt="error">    
                <p>Calle Torreon</p>
            </div>
            
        </div>
        <div class="carrusel">
            <div class="left">
                <h1 class="titulo">Baches</h1>
                <p>Reporta baches en carretera que causan problemas viales asi como accidentes y daños materiales a tu auto</p>
                <button class="boton"> ¡Reporta Ya! </button>
            </div>
            <div class="fotos">
                <img src="{{ asset('Imagenes/Imagen-fondo.jpg') }}" alt="error">    
                <p>Calle Torreon</p>
            </div>
            
        </div>
        <div class="carrusel">
            <div class="left">
                <h1 class="titulo">Baches</h1>
                <p>Reporta baches en carretera que causan problemas viales asi como accidentes y daños materiales a tu auto</p>
                <button class="boton"> ¡Reporta Ya! </button>
            </div>
            <div class="fotos">
                <img src="{{ asset('Imagenes/Imagen-fondo.jpg') }}" alt="error">    
                <p>Calle Torreon</p>
            </div>
            
        </div>
    </section>

    <!-- A partir de aqui va el mision y visión -->
    <section class="mision_vision" id="mv_lm">
        <div class="cards">
            <div class="content">
                <h1>Misión</h1>
                <img src="https://st.depositphotos.com/1003827/4545/i/600/depositphotos_45456503-stock-photo-damaged-road-full-of-cracked.jpg" alt="error">
                <p>Brindar a los ciudadanos un herramienta digital que sea intuitiva y accesible para reportar, visualizar y dar seguiminto a problemas de los ciudadanos relacionados con la contaminación ambiental y la vialidad asi como la seguridad.<br>¡A travéz de MyReport, buscamos que cada reporte contribuya a mejorar el entorno, promoviendo una ciudad mas limpia segura, viable y odernada!</p>
            </div>
        </div>
        <div class="cards">
            <div class="content">
                <h1>Misión</h1>
                <img src="https://media.istockphoto.com/id/182383310/es/foto/construcci%C3%B3n-de-carretera.jpg?s=612x612&w=0&k=20&c=4S4hA__y7J1Rt8E0q_kNd6IZqXSI5faoU8w2LzS7iXQ=" alt="error">
                <p>Ser la plataforma lider en el reporte y seguimiento de problematicas sociales relacionadas con la contaminacion ambiental, seguridad, y vialidad.<br>MyReport busca disminuir en gran parte las de problematicas actuales que normalmente no son atendidas de manera inmediata colaborando con las respectivas autoridades.</p>
            </div>
        </div>
    </section>
    <footer id="ft_lm">
        <div class="titulos">
            <h3>Contactanos</h3>
            <div class="info">
                <i class="fa-solid fa-phone"></i>
                <p>+(52) 618-298-76-54</p>
            </div>
            <div class="info">
                <i class="fa-regular fa-envelope"></i>
                <p>MyReport.HRL@gmail.com</p>
            </div>
            <div class="info">
                <i class="fas fa-map-marker-alt"></i>
                <p>Durango,Dgo Mexico</p>
            </div>
        </div>
        <div class="titulos">
            <h3>Redes Sociales</h3>
            <div class="info">
                <i class="fa-brands fa-facebook"></i>
                <p>MyReport</p>
            </div>
            <div class="info">
                <i class="fa-brands fa-instagram"></i>
                <p>My_Report</p>
            </div>
            <div class="info">
                <i class="fa-brands fa-x-twitter"></i>
                <p>My_Report</p>
            </div>
        </div>
        <div class="titulos" id="acomodo">
            <h3>Acción Social</h3>
            <div class="info">
                <p>@HRL2025</p>
            </div>
            <div class="info" >
                <p>©2025 MyReport<br>Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/back.js') }}"></script>
</body>
</html>
