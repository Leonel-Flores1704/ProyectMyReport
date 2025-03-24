document.addEventListener("DOMContentLoaded", function () {
    var toggle = document.getElementById("toggle");
    var icono = toggle.querySelector("svg"); // Selecciona el SVG dentro del botón

    // Íconos de sol y luna
    var iconoSol = `<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5.0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
    </svg>`;

    var iconoLuna = `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="blue" class="bi bi-moon-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
    </svg>`;

    // Función para actualizar el iconos
    function actualizarIcono(modo) {
        icono.innerHTML = modo === "oscuro" ? iconoSol : iconoLuna;
    }

    // Obtener el modo guardado o establecer "claro" por defecto
    var modoGuardado = localStorage.getItem("modo") || "claro";
    document.body.classList.toggle("oscuro", modoGuardado === "oscuro");
    document.body.classList.toggle("claro", modoGuardado === "claro");
    actualizarIcono(modoGuardado); // Aplicar el icono correcto

    if (toggle) {
        toggle.addEventListener("click", function () {
            // Alternar entre los modos
            var nuevoModo = document.body.classList.contains("oscuro") ? "claro" : "oscuro";
            
            document.body.classList.remove("oscuro", "claro"); // Eliminar ambas clases
            document.body.classList.add(nuevoModo); // Agregar la correcta

            // Guardar el modo en localStorage
            localStorage.setItem("modo", nuevoModo);

            // Actualizar el icono
            actualizarIcono(nuevoModo);
        });
    }
});
