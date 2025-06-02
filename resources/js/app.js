import './bootstrap';
import './header.js';
import './about.js';
import './popular.js';
import './profile.js';
import './slider.js';
import './carusel.js';
import { showContent, openModal, closeModal, setupModalClickOutside } from './popular';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Делаем функции глобальными
window.showContent = showContent;
window.openModal = openModal;
window.closeModal = closeModal;

document.addEventListener('DOMContentLoaded', () => {
    // Инициализация первого контента
    showContent('popular');

    // Подключаем закрытие модального окна по клику вне области
    setupModalClickOutside();

    // Можно также назначить openModal / closeModal на кнопки
    // Например:
    const openBtn = document.getElementById('open-modal-btn');
    if (openBtn) {
        openBtn.addEventListener('click', openModal);
    }

    const closeBtn = document.getElementById('close-modal-btn');
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }
});

document.addEventListener('DOMContentLoaded', function () {
    updateCartCounter();
});







// Функция переключения разделов профиля
window.showProfileContent = function (contentId) {
    // Скрыть все секции
    document.querySelectorAll(".profile-content-section").forEach((section) => {
        section.classList.add("hidden");
    });

    // Убрать активный класс у всех кнопок
    document.querySelectorAll(".profile-filter-btn").forEach((btn) => {
        btn.classList.remove("active");
    });

    // Показать нужную секцию и добавить класс active к кнопке
    const targetSection = document.getElementById(contentId);
    if (targetSection) {
        targetSection.classList.remove("hidden");
        const activeButton = [...document.querySelectorAll(".profile-filter-btn")].find(
            (btn) => btn.onclick?.toString().includes(`'${contentId}'`)
        );
        if (activeButton) activeButton.classList.add("active");
    }
};

// Инициализация: показываем "Личная информация" по умолчанию
document.addEventListener("DOMContentLoaded", () => {
    const defaultButton = document.querySelector("[onclick=\"showProfileContent('personal')\"]");
    if (defaultButton) {
        defaultButton.click();
    }
});
