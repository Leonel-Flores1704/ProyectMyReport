var toggle = document.getElementById("toggle");
var icon = document.getElementById("icon");
var salir = document.getElementById("salir");
// Verificamos solo los elementos que pueden no existir en login
var TLM = document.getElementById("TLM") || null;
var barra = document.getElementById("barra") || null;
var fondo = document.getElementById("fondo") || null;
var prueba = document.getElementById("prueba") || null;
var mv_lm = document.getElementById("mv_lm") || null;
var ft_lm = document.getElementById("ft_lm") || null;

function aplicarTema(modo) {
    
    document.body.classList.toggle("lightmode", modo === "claro");

    if (barra) barra.classList.toggle("lm", modo === "claro");
    if (fondo) fondo.classList.toggle("nFondo", modo === "claro");
    if (prueba) prueba.classList.toggle("carrusel_lm", modo === "claro");
    if (mv_lm) mv_lm.classList.toggle("cards_lm", modo === "claro");
    if (ft_lm) ft_lm.classList.toggle("footer_lm", modo === "claro");

    if (TLM) {
        TLM.classList.replace(modo === "claro" ? "Titulo" : "Titulo_lm", modo === "claro" ? "Titulo_lm" : "Titulo");
    }

    if (icon) {
        icon.classList.replace(modo === "claro" ? "fa-sun" : "fa-moon", modo === "claro" ? "fa-moon" : "fa-sun");
        icon.style.color = modo === "claro" ? "black" : "white"; 
    }

    localStorage.setItem("modo", modo);
}

document.addEventListener("DOMContentLoaded", function () {
    var modoGuardado = localStorage.getItem("modo") || "oscuro"; 
    aplicarTema(modoGuardado);
});

toggle.addEventListener("click", () => {
    var nuevoModo = document.body.classList.contains("lightmode") ? "oscuro" : "claro";
    aplicarTema(nuevoModo);
});
function cerrar(){
    window.location.href = "index.html";
}