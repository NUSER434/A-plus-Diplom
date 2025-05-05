// popular.js

export function openModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('hidden');
    modal.classList.add('active');
}

export function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('active');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

export function setupModalClickOutside() {
    window.addEventListener('click', function (event) {
        const modal = document.getElementById('modal');
        if (event.target === modal) {
            closeModal();
        }
    });
}

export function showContent(contentId) {
    const buttons = document.querySelectorAll('.filter-button');
    const containers = document.querySelectorAll('.content1');

    // Убираем активный класс у всех кнопок
    buttons.forEach(button => button.classList.remove('active-button'));

    // Добавляем активный класс к текущей кнопке
    const clickedButton = document.querySelector(`[onclick="showContent('${contentId}')"]`);
    if (clickedButton) {
        clickedButton.classList.add('active-button');
    }

    // Скрываем все контейнеры
    containers.forEach(container => container.classList.add('hidden'));

    // Показываем выбранный контейнер
    const selectedContainer = document.getElementById(`${contentId}`);
    if (selectedContainer) {
        selectedContainer.classList.remove('hidden');
    }
}