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
                <li><a href="/reports">Reports</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Resolved Matters</a></li>
                <li id="icon_user">
                    @if (Auth::check())
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <!-- Si el usuario está autenticado, mostramos el botón de logout -->
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn">log out</button>
                        </form>
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
    <script src="{{ asset('js/back.js') }}"></script>
</body>
</html>