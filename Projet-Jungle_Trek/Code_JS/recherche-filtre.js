document.addEventListener('DOMContentLoaded', () => {
  const barreRecherche = document.getElementById('barre-recherche');
  const inputMontant = document.getElementById('filtre-montant');
  const cartes = document.querySelectorAll('.destination-card');


   function filtrer() {
    const recherche = barreRecherche.value.trim().toLowerCase();
    const montantMax = parseInt(inputMontant.value) || Infinity;

    cartes.forEach(carte => {
      const etapes = carte.dataset.etapes;
      const montant = parseInt(carte.dataset.montant);

      if ((etapes.includes(recherche))&&(montant <= montantMax)){
        carte.style.display = 'block';
      } else {
        carte.style.display = 'none';
      }
    });
  };

  barreRecherche.addEventListener('input', filtrer);
  inputMontant.addEventListener('input', filtrer);
});