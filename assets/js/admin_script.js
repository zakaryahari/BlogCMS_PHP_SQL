const form_container = document.getElementById('form_container');

const categoryModal = document.getElementById('categoryModal');

if (categoryModal) {
  categoryModal.addEventListener('click', (e) => {
    if (e.target.id == 'categoryModal') {
      categoryModal.classList.add('hidden');
    }
  });
}

const Add_Category_btn = document.getElementById('Add_Category_btn');

if (Add_Category_btn) {
  Add_Category_btn.addEventListener('click', () => {
    categoryModal.classList.toggle('hidden');
  });
}

const form_cancel_btn = document.getElementById('form_cancel_btn');

if (form_cancel_btn) {
  form_cancel_btn.addEventListener('click', () => {
    categoryModal.classList.add('hidden');
  });
}

// const categorie_table = document.getElementById('categorie_table');

// if (categorie_table) {
//   categorie_table.addEventListener('click', (e) => {
//     if (e.target.getAttribute('aria-label') == 'Edit') {
//       console.log(e.target.getAttribute('aria-label'));
//     }
//   });
// }

function openEditModal(button) {
  // console.log(button.classList);
  $modal_id_categorie = document.getElementById('modal_id_categorie');
  $modal_libelle = document.getElementById('modal_libelle');
  $modal_description = document.getElementById('modal_description');

  $modal_id_categorie.value = button.getAttribute('data-id_categorie');
  $modal_libelle.value = button.getAttribute('data-libelle');
  $modal_description.value = button.getAttribute('data-description');
  categoryModal.classList.remove('hidden');
}

function closeModal() {
  categoryModal.classList.add('hidden');
}
