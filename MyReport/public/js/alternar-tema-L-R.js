document.addEventListener("DOMContentLoaded", function () {
    let savedTheme = localStorage.getItem("theme") || "light";
    setTheme(savedTheme);
});

document.getElementById("themeToggle").addEventListener("click", function () {
    let currentTheme = localStorage.getItem("theme") === "dark" ? "light" : "dark";
    setTheme(currentTheme);
});

function setTheme(theme) {
    let themeStylesheet = document.getElementById("themeStylesheet");
    if (theme === "dark") {
        themeStylesheet.href = "/css/styleLR-dark.css"; 
    } else {
        themeStylesheet.href = "/css/styleLR-light.css"; 
    }
    localStorage.setItem("theme", theme); // Guarda la preferencia del usuario
}
