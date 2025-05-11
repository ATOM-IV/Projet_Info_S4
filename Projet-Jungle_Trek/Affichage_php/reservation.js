document.addEventListener('DOMContentLoaded', () => {
    const tarifs = JSON.parse(document.getElementById('tarifs-data').textContent);
    const parcoursSelect = document.getElementById('parcours');
    const montantInput = document.getElementById('montant');
    const payBtn = document.getElementById('pay-buttonrechercher');
    const options = document.querySelectorAll('.opt');

    function calcTotal() {
        let total = tarifs[parcoursSelect.value] || 0;

        options.forEach(el => {
            const { type, checked, dataset, value } = el;
            if (type === 'radio' && !checked) return;

            const clovis = dataset.cat;
            total += tarifs[clovis]?.[value] || 0;
        });

        montantInput.value = total;
        payBtn.textContent = `Payer (Total: ${total} €)`;
    }

    parcoursSelect.addEventListener('change', calcTotal);
    options.forEach(el => el.addEventListener('change', calcTotal));

    calcTotal(); 
});
