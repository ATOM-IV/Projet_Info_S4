document.addEventListener("DOMContentLoaded", () => {
    
    const password = document.querySelector('input[name="mot_de_passe"]');

    // Toggle mot de passe
    const toggleBtn = document.getElementById("toggle-password-login");
    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            password.type = password.type === "password" ? "text" : "password";
        });
    }

});
