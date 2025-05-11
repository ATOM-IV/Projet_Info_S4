document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.profil-champ').forEach(champ => {
    const input = champ.querySelector('.profil-input');
    const editBtn = champ.querySelector('.edit-btn');
    const saveBtn = champ.querySelector('.save-btn');
    const cancelBtn = champ.querySelector('.cancel-btn');
    const original = input.value;

    editBtn.addEventListener('click', () => {
      input.disabled = false;
      input.focus();
      editBtn.style.display = 'none';
      saveBtn.style.display = 'inline';
      cancelBtn.style.display = 'inline';
    });

    saveBtn.addEventListener('click', () => {
      input.disabled = true;
      editBtn.style.display = 'inline';
      saveBtn.style.display = 'none';
      cancelBtn.style.display = 'none';

      if (input.value !== champ.dataset.original) {
        champ.classList.add('modifié');
        document.getElementById('submit-btn').style.display = 'block';
      }
    });

    cancelBtn.addEventListener('click', () => {
      input.value = champ.dataset.original;
      input.disabled = true;
      editBtn.style.display = 'inline';
      saveBtn.style.display = 'none';
      cancelBtn.style.display = 'none';
    });
  });
});