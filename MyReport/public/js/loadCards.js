document.addEventListener("DOMContentLoaded", function () {
    const categorias = {
        1: "B", // Baches
        2: "S", // Semáforos apagados
        3: "F", // Focos de infección
        4: "P", // Plazas sucias
        5: "T", // Terrenos baldíos
        6: "A"  // Alumbrado público
    };

    const reportesPorCategoria = {
        B: [],
        S: [],
        F: [],
        P: [],
        T: [],
        A: []
    };

    let indices = {
        B: 0,
        S: 0,
        F: 0,
        P: 0,
        T: 0,
        A: 0
    };

    function cargarReportes() {
        fetch('http://localhost/MyReport/public/api/reportes-resueltos')
            .then(response => response.json())
            .then(data => {
                data.forEach(reporte => {
                    const tipoId = reporte.tipo_reporte_id;
                    const categoria = categorias[tipoId];
                    if (categoria) {
                        reportesPorCategoria[categoria].push(reporte);
                    }
                });

                // Mostrar los primeros 3 por categoría
                for (const cat in categorias) {
                    mostrarReportes(categorias[cat]);
                }

                asignarEventosBotones(); // Aquí está la clave
            })
            .catch(error => console.error("Error al obtener los reportes:", error));
    }

    function mostrarReportes(cat) {
        const contenedor = document.querySelector(`.contenedor-cards-${cat}`);
        if (!contenedor) return;

        const reportes = reportesPorCategoria[cat];
        const start = indices[cat];
        const end = Math.min(start + 3, reportes.length);

        // Limpiar para no duplicar si deseas reemplazar los anteriores
        // contenedor.innerHTML = ""; PARA ELIMINAR LAS CARDS QUE YA NO SE QUIEREN VER Y QYE ESTAN PORE DEFECTO.

        for (let i = start; i < end; i++) {
            const reporte = reportes[i];
            let imagenUrl = "/MyReport/public/storage/reporte/default.jpg";

            try {
                let imagenes = reporte.imagen_referencia;
                if (imagenes.startsWith("[")) {
                    imagenes = JSON.parse(imagenes);
                    if (Array.isArray(imagenes) && imagenes.length > 0) {
                        imagenUrl = `/MyReport/public/storage/${imagenes[0]}`;
                    }
                } else {
                    imagenUrl = `/MyReport/public/storage/${imagenes}`;
                }
            } catch (error) {
                console.error("Error al procesar la imagen:", error);
            }

            const card = document.createElement("div");
            card.className = "card-resovelM";
            card.style.width = "18rem";
            card.innerHTML = `
                <img src="${imagenUrl}" class="card-img-top" alt="Imagen del reporte">
                <div class="cards-body-resolvedMatters${cat}">
                    <p class="card-text"><strong>Descripción:</strong> ${reporte.descripcion_problematica}</p>
                    <p class="card-text"><strong>Ubicación:</strong> Entre calle ${reporte.calle}, y calle ${reporte.colonia}</p>
                </div>
            `;
            card.style.animationDelay = `${(i - start) * 0.1}s`; // Delay incremental

            contenedor.appendChild(card);
        }

        // Actualizar índice
        indices[cat] = end;

        // Verificar si ya no hay más
        const boton = document.getElementById(`ver-mas-${cat}`);
        if (boton) {
            if (indices[cat] >= reportes.length) {
                boton.disabled = true;
                boton.textContent = "No hay más reportes";
            }
        }
    }

    function asignarEventosBotones() {
        for (const cat of Object.values(categorias)) {
            const boton = document.getElementById(`ver-mas-${cat}`);
            if (boton) {
                boton.addEventListener("click", () => {
                    mostrarReportes(cat); // Mostrar siguientes 3
                });
            }
        }
    }
    cargarReportes();
});
