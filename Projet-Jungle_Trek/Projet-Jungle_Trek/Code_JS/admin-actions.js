document.addEventListener('DOMContentLoaded', () => {
document.querySelectorAll('.admin-btn').forEach(button => {
    button.addEventListener('click', () => {
    button.disabled = true;
    button.style.opacity = '0.6';
    button.textContent = "Traitement...";

    setTimeout(() => {
        button.disabled = false;
        button.style.opacity = '1';
        if (button.classList.contains('annuler')) {
        button.textContent = "Annuler les réservations";
        } else if (button.classList.contains('ban')) {
        button.textContent = "Bannir";
        }
    }, 2000);
    });
});
});