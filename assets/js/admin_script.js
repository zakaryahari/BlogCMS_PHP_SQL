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
