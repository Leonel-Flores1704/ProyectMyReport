<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header id ="barra" class="navegador">
        <div class="logo">
            <h1 id="MR">MyReport</h1>
            <img src="{{ asset('Imagenes/Logo.png') }}" alt="Aqui va el logo" id="logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="/">Inicio</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Resolved Matters</a></li>
            </ul>
        </nav>
        <a href="Sign_up.html" class="btn"><button>Log in</button></a>
        <label for="toggle" id="lbl_toggle">
            <i class="fa-solid fa-sun" id="icon"></i>
        </label>
        <input type="checkbox" id="toggle">
    </header>
    
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