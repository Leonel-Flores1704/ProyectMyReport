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
            <div id="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-low" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
                </svg>
            </div>
        </label>
        <input type="checkbox" id="toggle">
    </header>
    <section class="Separacion" id="light_mode_report">
        <div class="recuadros">
            <div class="manual">
                <h1 id="Titulo_manual">Titulo</h1>
                <p class="descripcion" id="descripcion">Breve descripcion acerca del problema que usted desea reportar.</p>
                <div class="imagen_referencia">
                    <img src="" alt="Imagen de referencia acerca a su problema">
                </div>
                <p>Criterios que definen su problematica</p>
                <div class="recuadro_criterios" id="criterios">
                    <li id="criterio1">Texto de ejemplo acerca de la problemática</li>
                    <li id="criterio2">Texto de ejemplo acerca de la problemática</li>
                    <li id="criterio3">Texto de ejemplo acerca de la problemática</li>
                </div>
                <h1 id="Subtitulo_manual">Que no es un ...</h1>
                <p id="descripcion2">Breve descripcion que no cumple con las caracterisitcas acerca del problema que usted desea reportar.</p>
                <div class="imagen_referencia">
                    <img src="" alt="Imagen de referencia acerca a su problema">
                </div>
                <p>Criterios que no definen su problematica</p>
                <div class="recuadro_criterios" id="criterios2">
                    <li id="criterios1">Texto de ejemplo que no es acorde a la problemática</li>
                    <li id="criterios2">Texto de ejemplo que no es acorde a la problemática</li>
                    <li id="criterios3">Texto de ejemplo que no es acorde a la problemática</li>
                </div>
            </div>
        </div>
        <div class="recuadros">
            <div class="campos">
                <h4 class="alineacion">Tipo de problematica ocurrida</h4>
                <select name="options" id="opciones">
                    <option value="Select">Seleccione su problemática a reportar</option>
                    <option value="Baches">Baches</option>
                    <option value="Semaforos_apagados">Semaforos apagados</option>
                    <option value="Focos_infeccion">Focos de infección</option>
                    <option value="Plazas_sucias">Plazas sucias</option>
                    <option value="Terrenos_baldios">Terrenos baldíos</option>
                    <option value="Alumbrado_publico">Alumbrado público</option>
                </select>
                <h4 class="alineacion">Ubicación</h4>
                <div class="radio_botones">
                    <div class="radio_group">
                        <input type="radio" name="ubicacion_tiempo_real" id="TR">
                        <p>Ubicacion en tiempo real</p>
                    </div>
                    <div class="radio_group">
                        <input type="radio" name="insertar_ubicacion" id="IB">
                        <p>Insertar ubicacion</p>
                    </div>
                </div>
                <div id="InsertarUbicacion">
                    
                </div>
                <h4 class="alineacion">Descripcion de la ubicacion</h4>
                <textarea id="autoTextarea" rows="1" oninput="autoResize(this)"></textarea>
                <h4 class="alineacion">Descripcion de los hechos</h4>
                <textarea id="autoTextarea_" rows="1" oninput="autoResize(this)" maxlength="300" placeholder="Maximo 300 caracteres"></textarea>
                <form action="{{ route('upload.images') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="images" id="idk">Sube hasta 3 imágenes:</label>
                    <div class="centro">
                        <label for="file-upload" class="custom-file-upload" id="icon_img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16" >
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                            <div class="centro_">
                                <p id="advertencia">Subir imagen (máximo hasta 3 imáganes)</p>
                            </div>
                            <div class="centro_">
                                <p id="uploadMessage"></p>
                            </div>
                            <div class="ajuste">
                                    <div id="preview"></div>
                            </div>
                        </label>
                    </div>
                    <input id="file-upload" type="file" name="file-upload[]" accept="image/*" multiple required>
                    <div class="centro">
                        <button type="submit">Subir</button>
                    </div>
                </form>
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