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

// user

const userModal = document.getElementById('userModal');

if (userModal) {
  userModal.addEventListener('click', (e) => {
    if (e.target.id == 'userModal') {
      userModal.classList.add('hidden');
    }
  });
}

const user_form_cancel_btn = document.getElementById('user_cancel_btn');

if (user_form_cancel_btn) {
  user_form_cancel_btn.addEventListener('click', () => {
    userModal.classList.add('hidden');
  });
}

function openEditUserModal(button) {
  const modal_user_id = document.getElementById('modal_user_id');
  const modal_user_username = document.getElementById('modal_user_username');
  const modal_user_email = document.getElementById('modal_user_email');
  const modal_user_role = document.getElementById('modal_user_role');

  modal_user_id.value = button.getAttribute('data-id');
  modal_user_username.value = button.getAttribute('data-username');
  modal_user_email.value = button.getAttribute('data-email');
  modal_user_role.value = button.getAttribute('data-role');

  userModal.classList.remove('hidden');
}

function closeUserModal() {
  userModal.classList.add('hidden');
}
