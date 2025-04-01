document.addEventListener("DOMContentLoaded", function () {
    const botonVerMas = document.getElementById("ver-mas");
    // Selecciona el contenedor de las cards por defecto
    const contenedor = document.querySelector(".contenedor-cards");

    const problemas = [
        { descripcion: "Ejemplo del texto que se sacará de los reportes." },
        { descripcion: "Otro reporte resuelto recientemente." },
        { descripcion: "Problema solucionado en la base de datos." },
        { descripcion: "Problema resuelto en la fecha marxo." },
        { descripcion: "Problema realizado exitosamente." },
        { descripcion: "Problemas solucionados gracias a CFE." }
    ];
    

    let indice = 0;

    botonVerMas.addEventListener("click", function () {
        // Genera 3 cards por clic (si hay suficientes datos)
        for (let i = 0; i < 3; i++) {
            if (indice >= problemas.length) {
                botonVerMas.disabled = true;
                botonVerMas.innerText = "No hay más problemas resueltos.";
                break;
            }

            // Crear la card con el mismo formato que la card por defecto
            const card = document.createElement("div");
            card.className = "card-resovelM";
            card.style.width = "18rem";
            card.innerHTML = `
                <img src="{{ asset('/Imagenes/FondoRMDos.jpg') }}" class="card-img-top" alt="...">
                <div class="cards-body-resolvedMatters">
                    <p class="card-text">${problemas[indice].descripcion}</p>
                </div>
            `;
            // Se inserta la nueva card dentro del contenedor por defecto
            contenedor.appendChild(card);
            indice++;
        }
    });
});
