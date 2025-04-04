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
                <li><a href="/resolvedMatters">Problemas Resueltos</a></li>
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
                <li id="cambiar_modo__">
                    <a href="">
                        <label for="toggle" id="lbl_toggle">
                            <div id="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
                                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
                                </svg>
                            </div>
                        </label>
                        <input type="checkbox" id="toggle">
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Aquí verificamos si el usuario está autenticado -->

    </header>
    <section class="Separacion" id="light_mode_report">
        <div class="recuadros">
            <div class="manual">
                <h1 id="Titulo_manual">Titulo</h1>
                <p class="descripcion" id="descripcion">Breve descripcion acerca del problema que usted desea reportar.</p>
                <div class="imagen_referencia_">
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
                <div class="imagen_referencia_">
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
                @if (session('success'))
                    <div id="successModal" class="modal-overlay">
                        <div class="modal-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" id="check">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                            </svg>
                            <button id="closeModal">
                                <p>Reporte Hecho</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16" id="paloma">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
                <form action="{{ route('reportes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="fecha" id="fecha_lm">
                        <p>Fecha de registro</p>
                        <input name ="fecha_reporte"type="date" id="fechaActual" readonly>
                    </div>
                    <h4 class="alineacion">Tipo de problematica ocurrida</h4>
                    <select name="tipo_reporte_id" id="opciones">
                        <option value="">Seleccione su problemática a reportar</option>
                        <option value="1">Baches</option>
                        <option value="2">Semaforos apagados</option>
                        <option value="3">Focos de infección</option>
                        <option value="4">Plazas sucias</option>
                        <option value="5">Terrenos baldíos</option>
                        <option value="6">Alumbrado público</option>
                    </select>
                    <h4 class="alineacion">Ubicación</h4>
                    <div class="radio_botones">
                        <div class="radio_group">
                            <input type="radio" name="ubicacion" id="TR" onclick="obtenerUbicacion()">
                            <label for="TR"></label>
                            <p>Ubicacion en tiempo real</p>
                        </div>
                        <div class="radio_group">
                            <input type="radio" name="ubicacion" id="IB">
                            <label for="IB"></label>
                            <p>Insertar ubicacion</p>
                        </div>
                    </div>
                    <div id="InsertarUbicacion" style="display: none;">
                        <h4 class="alineacion">Escoger entre ...</h4>
                        <select name="options" id="tipo" class="tipo_dm">
                            <option value="Colonia">Colonia o Fraccionamiento</option>
                            <option value="Boulevard">Boulevard o Carretera</option>
                        </select>
                        <h4 class="alineacion" id="Nombre_">Nombre de colonia o fraccionamiento</h4>
                        <textarea name="colonia_manual" id="NombreColonia" rows="1" oninput="autoResize(this)" maxlength="100" placeholder="Maximo 100 caracteres"></textarea>
                        <h4 class="alineacion" id="NombreCalleSeEncuentra" style="display: block;">Nombre de la calle donde se encuentra</h4>
                        <h4 class="alineacion" style="display: none;" id="ChooseBoulevard">Nombre de calle o boulevard a lado del que se encuentra</h4>
                        <textarea name="calle_manual" id="NombreCalle" rows="1" oninput="autoResize(this)" maxlength="100" placeholder="Maximo 100 caracteres"></textarea>
                        <div class="calles">
                            <div class="calle">
                                <h4 class="alineacion">Entre calle 1</h4>
                                <textarea name="calle1" id="NombreCalle1" rows="1" oninput="autoResize(this)"></textarea>
                            </div>
                            <div class="calle">
                                <h4 class="alineacion">Entre calle 2</h4>
                                <textarea name="calle2" id="NombreCalle2" rows="1" oninput="autoResize(this)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="UbicacionTiempoReal" style="display: none;">
                        <h4 class="alineacion">Su ubicacion actual</h4>
                        <textarea id="ActualUbication" name="descripcion_ubicacion" class="autoTextarea" rows="1" oninput="autoResize(this)"></textarea>
                        <input type="hidden" id="calle_actual" name="calle_actual">
                        <input type="hidden" id="colonia_actual" name="colonia_actual">
                    </div>
                    <h4 class="alineacion">Descripcion de la ubicacion</h4>
                    <textarea name="descripcion_ubicacion" class="autoTextarea" rows="1" oninput="autoResize(this)" maxlength="300" placeholder="Maximo 300 caracteres" required></textarea>
                    <h4 class="alineacion">Descripcion de los hechos</h4>
                    <textarea name= "descripcion_problematica" class="autoTextarea_" rows="1" oninput="autoResize(this)" maxlength="300" placeholder="Maximo 300 caracteres" required></textarea>
                    <h4 class="alineacion" id="idk">Sube hasta 3 imágenes:</h4>
                    <div class="centro">
                        <label for="imagen_referencia" class="custom-imagen_referencia" id="icon_img">
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
                    <input id="imagen_referencia" type="file" name="imagen_referencia[]" accept="image/*" multiple required>
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
