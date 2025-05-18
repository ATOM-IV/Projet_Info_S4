// Fonction pour créer un cookie
function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days*24*60*60*1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

// Changer de thème
function switchTheme() {
    const link = document.getElementById("theme-style");
    const currentTheme = link.getAttribute("href");
    const newTheme = currentTheme === "style.css" ? "style-dark.css" : "style.css";
    link.setAttribute("href", newTheme);
    setCookie("theme", newTheme, 365);
}

// Charger le thème au démarrage
window.addEventListener("DOMContentLoaded", () => {
    document.getElementById("theme-toggle").addEventListener("click", switchTheme);
});