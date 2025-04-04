var toggle = document.getElementById("toggle");
var icon = document.getElementById("icon");
// Verificamos solo los elementos que pueden no existir en login
var icon_img = document.getElementById("icon_img") || null;
var TLM = document.getElementById("TLM") || null;
var barra = document.getElementById("barra") || null;
var fondo = document.getElementById("fondo") || null;
var prueba = document.getElementById("prueba") || null;
var mv_lm = document.getElementById("mv_lm") || null;
var ft_lm = document.getElementById("ft_lm") || null;
var light_mode_report = document.getElementById("light_mode_report") || null;
var opciones = document.getElementById("opciones") || null;
var file_upload = document.getElementById("imagen_referencia") || null;
var icon_img= document.getElementById("icon_img") || null;
var TR = document.getElementById("TR") || null;
var IB = document.getElementById("IB") || null;
var InsertarUbicacion = document.getElementById("InsertarUbicacion") || null;
var UbicacionTiempoReal = document.getElementById("UbicacionTiempoReal") || null;
var icon_user = document.getElementById("icon_user") || null;
var fecha_lm = document.getElementById("fecha_lm") || null;
var MisReportes_lm = document.getElementById("MisReportes_lm") || null;
const fechaActual = new Date();
const año = fechaActual.getFullYear();
const mes = String(fechaActual.getMonth() + 1).padStart(2, '0'); // El mes en JavaScript es indexado desde 0
const dia = String(fechaActual.getDate()).padStart(2, '0');
const fechaFormateada = `${año}-${mes}-${dia}`;

// var titulo_m = document.getElementById("Titulo_manual") || null;
function aplicarTema(modo) {
    
    document.body.classList.toggle("lightmode", modo === "claro");

    let tipo = document.getElementById("tipo");
    if (barra) barra.classList.toggle("lm", modo === "claro");
    if (fondo) fondo.classList.toggle("nFondo", modo === "claro");
    if (prueba) prueba.classList.toggle("carrusel_lm", modo === "claro");
    if (mv_lm) mv_lm.classList.toggle("cards_lm", modo === "claro");
    if (ft_lm) ft_lm.classList.toggle("footer_lm", modo === "claro");
    if (light_mode_report) light_mode_report.classList.toggle("recuadros_lm", modo === "claro");
    if (fecha_lm) fecha_lm.classList.toggle("fecha_lm", modo === "claro");
    if (MisReportes_lm) MisReportes_lm.classList.toggle("Lm_MyR", modo === "claro");
    if (TLM) {
        TLM.classList.replace(modo === "claro" ? "Titulo" : "Titulo_lm", modo === "claro" ? "Titulo_lm" : "Titulo");
    };
    if (tipo) {
        tipo.classList.toggle("tipo_lm", modo === "claro");
    };
    if(icon_img){
        if(modo === "claro"){
            icon_img.innerHTML= `<svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="black" class="bi bi-image" viewBox="0 0 16 16" >
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
                            </div>`;
        }else{
            icon_img.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16" >
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
                            </div>`;
        };
    };
    if (icon) {
        if (modo === "claro") {
            icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="black" class="bi bi-moon" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
            </svg>`;
        } else {
            icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
            </svg>`;
        };
    };
    localStorage.setItem("modo", modo);
};

toggle.addEventListener("click", () => {
    let nuevoModo = document.body.classList.contains("lightmode") ? "oscuro" : "claro";
    aplicarTema(nuevoModo);
});
//Inicio codigo chatgpt
function autoResize(textarea) {
    textarea.style.height = "auto";
    textarea.style.height = (textarea.scrollHeight) + "px";
};
/*document.getElementById("imagen_referencia")?.addEventListener("change", function() {
    let message = document.getElementById("uploadMessage");
    if (this.files.length > 0) {
        message.textContent = "Imagen(es) cargada(s) correctamente.";
    } else {
        message.textContent = "";
    }
});
document.getElementById("imagen_referencia")?.addEventListener("change", function() {
    let preview = document.getElementById("preview");
    let message = document.getElementById("uploadMessage");
    let advertencia = document.getElementById("advertencia");
    
    if (this.files.length > 3) {
        message.textContent = "Solo puedes subir hasta 3 imágenes.";
        this.value = ""; // Borra las imágenes seleccionadas
        preview.innerHTML = ""; // Limpia la vista previa
        return;
    }

    message.textContent = "Imagen(es) cargada(s) correctamente.";
    advertencia.textContent = "";
    preview.innerHTML = ""; // Limpiar vista previa anterior

    Array.from(this.files).forEach(file => {
        let reader = new FileReader();
        reader.onload = function(e) {
            let img = document.createElement("img");
            img.src = e.target.result;
            img.style.width = "120px"; 
            img.style.margin = "5px";
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});*/

//Fin codigo chatgpt
opciones?.addEventListener("change",function(){
    
    switch(opciones.value){
        case "":
            Titulo_manual.innerHTML ="Titulo";
            descripcion.innerHTML = "Breve descripcion acerca del problema que usted desea reportar.";
            criterio1.innerHTML="Texto de ejemplo acerca de la problemática";
            criterio2.innerHTML="Texto de ejemplo acerca de la problemática";
            criterio3.innerHTML="Texto de ejemplo acerca de la problemática";
            Subtitulo_manual.innerHTML = "¿Qué no es un ...?";
            descripcion2.innerHTML = "Breve descripcion que NO cumple con las caracterisitcas acerca del problema que usted desea reportar.";
            criterios1.innerHTML="Texto de ejemplo que no es acorde a la problemática";
            criterios2.innerHTML="Texto de ejemplo que no es acorde a la problemática";
            criterios3.innerHTML="Texto de ejemplo que no es acorde a la problemática";
        break;
        case "1":
            Titulo_manual.innerHTML ="¿Qué es un bache?";
            descripcion.innerHTML = "Un bache es un hoyo o hundimiento en la superficie de una calle o carretera, causado por el desgaste, el clima o el tráfico constante..";
            criterio1.innerHTML="Huecos o depresiones en el pavimento que afectan la circulación.";
            criterio2.innerHTML="Desprendimientos de material en el asfalto que generan irregularidades.";
            criterio3.innerHTML="Hundimientos que pueden causar daños a vehículos o accidentes.";
            Subtitulo_manual.innerHTML = "¿Qué no es un bache?";
            descripcion2.innerHTML = "Aquellas fisuras que el pavimento puede presentar por diferentes condiciones NO serán consideras baches (Imagen de referencia).";
            criterios1.innerHTML="Grietas superficiales sin hundimiento.";
            criterios2.innerHTML="Irregularidades menores en la calle que no afectan el tránsito.";
            criterios3.innerHTML="Desniveles por coladeras, topes o reparaciones recientes.";
        break;
        
    }
});
document.getElementById("TR")?.addEventListener("change", function() {
    document.getElementById('UbicacionTiempoReal').style.display = 'block';
    document.getElementById('InsertarUbicacion').style.display = 'none';
});
document.getElementById("IB")?.addEventListener("change", function() {
    document.getElementById('UbicacionTiempoReal').style.display = 'none';
    document.getElementById('InsertarUbicacion').style.display = 'block';
    /*if (this.checked) {
        document.getElementById("TR").checked = false;
    };
    if(this.checked){
        InsertarUbicacion.innerHTML = 
        `<h4 class="alineacion">Escoger entre ...</h4>
        <select name="options" id="tipo" class="tipo_dm">
            <option value="Colonia">Colonia o Fraccionamiento</option>
            <option value="Boulevard">Boulevard o Carretera</option>
        </select>
        <h4 class="alineacion" id="Nombre_" >Nombre de colonia o fraccionamiento</h4>
        <textarea name="colonia" id="NombreColonia" rows="1" oninput="autoResize(this)" maxlength="100" placeholder="Maximo 100 caracteres"></textarea>
        <h4 class="alineacion">Nombre de la calle donde se encuentra</h4>
        <textarea name="calle" id="NombreCalle" rows="1" oninput="autoResize(this)" maxlength="100" placeholder="Maximo 100 caracteres"></textarea>
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
        `;
    };*/
});

document.addEventListener("change", function (event) {
    
    if (event.target && event.target.id === "tipo") {
        if (event.target.value === "Colonia") {
            document.getElementById("NombreCalle1").disabled = false;
            document.getElementById("NombreCalle2").disabled = false;
            document.getElementById("Nombre_").innerHTML = "Nombre de colonia o fraccionamiento";
            document.getElementById("ChooseBoulevard").style.display="none";
            document.getElementById("NombreCalleSeEncuentra").style.display="block"
        } else {
            document.getElementById("NombreCalle1").disabled = true;
            document.getElementById("NombreCalle2").disabled = true;
            document.getElementById("Nombre_").innerHTML = "Nombre de boulevard o carretera";
            document.getElementById("ChooseBoulevard").style.display="block";
            document.getElementById("NombreCalleSeEncuentra").style.display="none"
        };
    }; 
});

//obtener ubicación actual
function obtenerUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        const latitud = position.coords.latitude;
        const longitud = position.coords.longitude;
        const apiKey = '3e3db0a0adf34a65aed8382eb93415df';

        fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitud}+${longitud}&key=${apiKey}`)
            .then(response => response.json())
            .then(data => {
            if (data.results.length > 0) {
                const location = data.results[0].components;

                // Asignar valores a los campos ocultos
                const calle = location.road || 'Desconocido';
                const colonia = location.neighbourhood || location.suburb || 'Desconocido';

                document.getElementById('calle_actual').value = calle;
                document.getElementById('colonia_actual').value = colonia;

                //alert(`Ubicación obtenida con éxito.\nCalle: ${calle}\nColonia: ${colonia}`);
                const descripcionUbicacion = `Ubicación Actual: ${calle}, ${colonia}`;
                document.getElementById('ActualUbication').value = descripcionUbicacion;
            } else {
                alert('No se pudo obtener la dirección. Inténtelo nuevamente.');
            }
            })
            .catch(error => {
            console.error('Error:', error);
            alert('Error al obtener la ubicación.');
            });
        }, function(error) {
        alert('Error al obtener la ubicación: ' + error.message);
        });
    } else {
        alert('Tu navegador no soporta geolocalización.');
    }
};
// Funcion para activar submenu
function toggleMenu() {
    const submenu = document.getElementById('submenu');
    submenu.classList.toggle('active');
}

// Para cerrar el menú al hacer click fuera
document.addEventListener('click', function(event) {
    const userMenu = document.getElementById('icon_user');
    const submenu = document.getElementById('submenu');

    if (!userMenu.contains(event.target)) {
        submenu.classList.remove('active');
    }
});
// Fin
document.addEventListener("DOMContentLoaded", function () {

    let modoGuardado = localStorage.getItem("modo");
    if (!modoGuardado) {
        modoGuardado = "oscuro";
    }
    aplicarTema(modoGuardado);

    let fecha = document.getElementById("fechaActual");
    if (fecha) {
        fecha.value = fechaFormateada;
    };

    const closeModal = document.getElementById("closeModal");
    if (closeModal) {
        closeModal.addEventListener("click", function () {
        document.getElementById("successModal").style.display = "none";
        });
    };    
    //codigo chatgpt
    const fileUpload = document.getElementById("imagen_referencia");
    const message = document.getElementById("uploadMessage");
    const preview = document.getElementById("preview");
    const advertencia = document.getElementById("advertencia");

    if (fileUpload) {
        fileUpload.addEventListener("change", function () {
            if (this.files.length > 3) {
                message.textContent = "Solo puedes subir hasta 3 imágenes.";
                this.value = ""; // Borra las imágenes seleccionadas
                preview.innerHTML = ""; // Limpia la vista previa
                return;
            }

            if (this.files.length > 0) {
                message.textContent = "Imagen(es) cargada(s) correctamente.";
            } else {
                message.textContent = "";
            }

            preview.innerHTML = ""; // Limpia la vista previa anterior
            Array.from(this.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.width = "120px";
                    img.style.margin = "5px";
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    };
    //Inicio para que los usuarios nomas vean 10 reportes y funcione el btn ver mas
    const cards = document.querySelectorAll('.card_misreportes');
    const verMasBtn = document.getElementById('verMas');
    let visibleCards = 8;
    cards.forEach((card, index) => {
        if (index >= 8) card.style.display = 'none';
    });
    verMasBtn?.addEventListener('click', () => {
        visibleCards += 8;
        cards.forEach((card, index) => {
            if (index < visibleCards) {
                card.style.display = 'block';
            }
        });

        // Ocultar el botón si ya no hay más cards
        if (visibleCards >= cards.length) {
            verMasBtn.style.display = 'none';
        }
    });
});