const articleModal = document.getElementById('articleModal');

function openModal() {
  document.getElementById('modal_id_article').value = '';
  document.getElementById('modal_nom_article').value = '';
  document.getElementById('modal_contenu').value = '';
  document.getElementById('modal_image_url').value = '';
  articleModal.classList.remove('hidden');
}

function openEditModal(button) {
  document.getElementById('modal_id_article').value = button.dataset.id;
  document.getElementById('modal_nom_article').value = button.dataset.title;

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
