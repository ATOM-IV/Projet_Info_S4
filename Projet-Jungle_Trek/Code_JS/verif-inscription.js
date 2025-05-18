document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    const login = document.querySelector('input[name="login"]');
    const password = document.querySelector('input[name="mot_de_passe"]');
    const passwordADM = document.querySelector('input[name="admin_password"]');
    const role = document.querySelector('select[name="statut"]');
    
    const adminInput = document.getElementById("admin-password");
    if (role.value !== "administrateur") {
        adminInput.removeAttribute("required");
    }
    
    role.addEventListener("change", () => {
        const adminField = document.getElementById("admin-code-field");
        const adminInput = document.getElementById("admin-password");
        if (role.value === "administrateur") {
            adminField.style.display = "block";
            adminInput.setAttribute("required", "required");
        }
        else {adminField.style.display = "none";}
    });

    const adminCode = document.querySelector('#admin-password'); 
    const compteurMin = 8;

    // Créer compteurs de caractères
    const compteur = document.createElement("small");
    compteur.style.display = "block";
    password.parentElement.appendChild(compteur);

    password.addEventListener("input", () => {
        compteur.textContent = `${password.value.length}/${compteurMin}`;
    });
    

    // Toggle mot de passe
    const toggleBtn = document.getElementById("toggle-password");
    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            password.type = password.type === "password" ? "text" : "password";
        });
    }

    // Toggle mot de passe admin
    const toggleBtnADM = document.getElementById("toggle-password-ADM");
    if (toggleBtnADM) {
        toggleBtnADM.addEventListener("click", () => {
            passwordADM.type = passwordADM.type === "password" ? "text" : "password";
        });
    }


    // Vérification sans envoi
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        let erreurs = [];

        // Longueurs max
        if (password.value.length < compteurMin) {
            erreurs.push("Mot de passe trop court !");
        }

        // Code admin requis si rôle admin
        if (role.value === "administrateur") {
            if (!adminCode || adminCode.value !== "mdpadmin") {
                erreurs.push("Code administrateur incorrect");
            }
        }

        // Vérification login existant via AJAX
        const response = await fetch("../Code_php/verif_utilisateur.php?login=" + encodeURIComponent(login.value));
        const exists = (await response.text()).trim();
        if (exists === "1") {
            erreurs.push("Ce login existe déjà !");
        }

        // Affichage ou envoi
        const zoneErreurs = document.getElementById("erreurs");
        zoneErreurs.innerHTML = "";
        if (erreurs.length > 0) {
            erreurs.forEach(err => {
                const p = document.createElement("p");
                p.style.color = "red";
                p.textContent = err;
                zoneErreurs.appendChild(p);
            });
            return;
        }
        form.submit();
    });
});
