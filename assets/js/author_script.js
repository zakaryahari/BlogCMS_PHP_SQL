const articleModal = document.getElementById('articleModal');

function openModal() {
  document.getElementById('modal_id_article').value = '';
  document.getElementById('modal_nom_article').value = '';
  document.getElementById('modal_contenu').value = '';
  document.getElementById('modal_image_url').value = '';
  articleModal.classList.remove('hidden');
}

function openEditModal(button) {
  const modal_id_article = document.getElementById('modal_id_article');
  const modal_nom_article = document.getElementById('modal_nom_article');
  const modal_id_categorie = document.getElementById('modal_id_categorie');
  const modal_image_url = document.getElementById('modal_image_url');
  const modal_contenu = document.getElementById('modal_contenu');

  modal_id_article.value = button.getAttribute('data-id');
  modal_nom_article.value = button.getAttribute('data-title');
  modal_id_categorie.value = button.getAttribute('data-category');
  modal_image_url.value = button.getAttribute('data-image');
  modal_contenu.value = button.getAttribute('data-content');

  articleModal.classList.remove('hidden');
}

function closeModal() {
  articleModal.classList.add('hidden');
}

if (articleModal) {
  articleModal.addEventListener('click', (e) => {
    if (e.target.id == 'articleModal') {
      articleModal.classList.add('hidden');
    }
  });
}

const statusModal = document.getElementById('statusModal');

function openStatusModal(button) {
  const commentId = button.getAttribute('data-id');
  const currentStatus = button.getAttribute('data-status');

  document.getElementById('modal_id_commentaire').value = commentId;

  const select = document.getElementById('modal_status');
  select.value = currentStatus;

  statusModal.classList.remove('hidden');
}

function closeStatusModal() {
  statusModal.classList.add('hidden');
}

if (statusModal) {
  statusModal.addEventListener('click', (e) => {
    if (e.target.id == 'statusModal') {
      statusModal.classList.add('hidden');
    }
  });
}
