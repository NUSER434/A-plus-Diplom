// Логика для модального окна
const deleteModal = document.getElementById('delete-modal');
const deleteBtn = document.getElementById('delete-account-btn');
const closeModalBtn = document.getElementById('close-modal-btn');

deleteBtn.addEventListener('click', () => {
    deleteModal.classList.remove('hidden');
});

closeModalBtn.addEventListener('click', () => {
    deleteModal.classList.add('hidden');
});