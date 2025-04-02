// Este script se encarga de cargar las cards de reportes resueltos desde la API y mostrarlas en la página.
document.addEventListener("DOMContentLoaded", function () {
    const botonVerMas = document.getElementById("ver-mas");
    const contenedor = document.querySelector(".contenedor-cards");

    let reportes = []; // Aquí guardaremos los reportes obtenidos del backend
    let indice = 0; // Índice para controlar la paginación

    // 1 **Cargar reportes desde la API**
    function cargarReportes() {
        fetch('http://localhost/MyReport/public/api/reportes-resueltos')
            .then(response => response.json())
            .then(data => {
                reportes = data;
                if (reportes.length === 0) {
                    botonVerMas.disabled = true;
                    botonVerMas.innerText = "No hay problemas resueltos.";
                }
            })
            .catch(error => console.error("Error al obtener los reportes:", error));
    }

    // 2 **Función para cargar más reportes al hacer clic en el botón**
    function mostrarMasReportes() {
        for (let i = 0; i < 3; i++) { // Cargar 3 reportes por clic
            if (indice >= reportes.length) {
                botonVerMas.disabled = true;
                botonVerMas.innerText = "No hay más problemas resueltos.";
                return;
            }

            const reporte = reportes[indice];

            // Decodificar las imágenes
            // let imagenUrl = "/MyReport/storage/app/public/reporte/5lanzjaEaKrAqMUFTw1ApYrnD2kXqHysKmkQpB0z.jpg";
            let imagenUrl = "/MyReport/storage/app/public/reporte/5lanzjaEaKrAqMUFTw1ApYrnD2kXqHysKmkQpB0z.jpg"; 
            // let imagenUrl = `http://localhost/MyReport/public/storage/reporte/${imagenes[0]}`;




            try {
                const imagenes = JSON.parse(reporte.imagen_referencia);
                if (Array.isArray(imagenes) && imagenes.length > 0) {
                    imagenUrl = `/storage/${imagenes[0]}`; // Tomar la primera imagen
                }
            } catch (error) {
                console.error("Error al procesar la imagen:", error);
            }

            // Crear la card con los datos del reporte
            const card = document.createElement("div");
            card.className = "card-resovelM";
            card.style.width = "18rem";
            card.innerHTML = `
                <img src="${imagenUrl}" class="card-img-top" alt="Imagen del reporte">
                <div class="cards-body-resolvedMatters">
                    <p class="card-text"><strong>Descripción de la problematica:</strong>${reporte.descripcion_problematica}</p>
                    <p class="card-text"><strong>Ubicación:</strong> Entre calle ${reporte.calle}, y calle ${reporte.colonia}</p>
                </div>
            `;

            // Insertar la nueva card en el contenedor
            contenedor.appendChild(card);
            indice++;
        }
    }

    // 3 **Eventos**
    botonVerMas.addEventListener("click", mostrarMasReportes);

    // Cargar reportes al inicio
    cargarReportes();
});

