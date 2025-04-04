
// document.addEventListener("DOMContentLoaded", function () {
//     const botonVerMas = document.getElementById("ver-mas");

//     const categorias = {
//         1: "B", 
//         2: "S", 
//         3: "F", 
//         4: "P", 
//         5: "T", 
//         6: "A" 
//     };

//     let reportes = [];
//     let indice = 0;

//     function cargarReportes() {
//         fetch('http://localhost/MyReport/public/api/reportes-resueltos')
//             .then(response => response.json())
//             .then(data => {
//                 reportes = data;
//                 if (reportes.length === 0) {
//                     botonVerMas.disabled = true;
//                     botonVerMas.innerText = "No hay problemas resueltos.";
//                 }
//             })
//             .catch(error => console.error("Error al obtener los reportes:", error));
//     }

//     function mostrarMasReportes() {
//         for (let i = 0; i < 3; i++) {
//             if (indice >= reportes.length) {
//                 botonVerMas.disabled = true;
//                 botonVerMas.innerText = "No hay más problemas resueltos.";
//                 return;
//             }

//             const reporte = reportes[indice];
//             const tipoId = reporte.tipo_reporte_id;

//             if (!categorias[tipoId]) {
//                 console.warn(`No hay sección definida para tipo_reporte_id: ${tipoId}`);
//                 indice++;
//                 continue;
//             }

//             let imagenUrl = "/MyReport/public/storage/reporte/default.jpg";

//             try {
//                 let imagenes = reporte.imagen_referencia;

//                 if (imagenes.startsWith("[")) {
//                     imagenes = JSON.parse(imagenes);
//                     if (Array.isArray(imagenes) && imagenes.length > 0) {
//                         imagenUrl = `/MyReport/public/storage/${imagenes[0]}`;
//                     }
//                 } else {
//                     imagenUrl = `/MyReport/public/storage/${imagenes}`;
//                 }
//             } catch (error) {
//                 console.error("Error al procesar la imagen:", error);
//             }

//             let contenedor = document.querySelector(`.contenedor-cards-${categorias[tipoId]}`);

//             if (!contenedor) {
//                 console.warn(`No se encontró el contenedor para la categoría ${categorias[tipoId]}`);
//                 indice++;
//                 continue;
//             }

//             const card = document.createElement("div");
//             card.className = "card-resovelM";
//             card.style.width = "18rem";
//             card.innerHTML = `
//                 <img src="${imagenUrl}" class="card-img-top" alt="Imagen del reporte">
//                 <div class="cards-body-resolvedMatters${categorias[tipoId]}">
//                     <p class="card-text"><strong>Descripción:</strong> ${reporte.descripcion_problematica}</p>
//                     <p class="card-text"><strong>Ubicación:</strong> Entre calle ${reporte.calle}, y calle ${reporte.colonia}</p>
//                 </div>
//             `;

//             contenedor.appendChild(card);
//             indice++;
//         }
//     }

//     botonVerMas.addEventListener("click", mostrarMasReportes);
//     cargarReportes();
// });

document.addEventListener("DOMContentLoaded", function () {
    const botonVerMas = document.getElementById("ver-mas");

    // Mapeo de IDs de tipos de reporte a clases CSS y contenedores
    const categorias = {
        1: "B", // Baches
        2: "S", // Semáforos apagados
        3: "F", // Focos de infección
        4: "P", // Plazas sucias
        5: "T", // Terrenos baldíos
        6: "A"  // Alumbrado público
    };

    let reportes = [];
    let indices = {}; // Para controlar cuántos reportes se han mostrado por categoría

    function cargarReportes() {
        fetch('http://localhost/MyReport/public/api/reportes-resueltos')
            .then(response => response.json())
            .then(data => {
                reportes = data;

                if (reportes.length === 0) {
                    botonVerMas.disabled = true;
                    botonVerMas.innerText = "No hay problemas resueltos.";
                } else {
                    Object.keys(categorias).forEach(id => {
                        indices[id] = 0;
                        mostrarMasReportes(id, 3); // Cargar 3 de cada tipo al inicio
                    });
                }
            })
            .catch(error => console.error("Error al obtener los reportes:", error));
    }

    function mostrarMasReportes(tipoId, cantidad = 3) {
        const reportesFiltrados = reportes.filter(r => r.tipo_reporte_id == tipoId);
        let indice = indices[tipoId] || 0;
        const contenedor = document.querySelector(`.contenedor-cards-${categorias[tipoId]}`);

        if (!contenedor) {
            console.warn(`No se encontró contenedor para tipo_reporte_id: ${tipoId}`);
            return;
        }

        let reportesAgregados = 0;

        for (let i = 0; i < cantidad; i++) {
            if (indice >= reportesFiltrados.length) break;

            const reporte = reportesFiltrados[indice];

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
                <div class="cards-body-resolvedMatters${categorias[tipoId]}">
                    <p class="card-text"><strong>Descripción:</strong> ${reporte.descripcion_problematica}</p>
                    <p class="card-text"><strong>Ubicación:</strong> Entre calle ${reporte.calle}, y calle ${reporte.colonia}</p>
                </div>
            `;

            contenedor.appendChild(card);
            indice++;
            reportesAgregados++;
        }

        indices[tipoId] = indice; // Actualizar el índice

        return reportesAgregados; // Retorna cuántos reportes se agregaron
    }

    function cargarMasReportes() {
        let totalAgregados = 0;

        Object.keys(categorias).forEach(id => {
            totalAgregados += mostrarMasReportes(id, 3);
        });

        // Si ya no hay más reportes en ninguna categoría, deshabilitar el botón
        if (totalAgregados === 0) {
            botonVerMas.disabled = true;
            botonVerMas.innerText = "No hay más problemas resueltos.";
        }
    }

    botonVerMas.addEventListener("click", cargarMasReportes);

    cargarReportes(); // Cargar reportes al inicio
});
