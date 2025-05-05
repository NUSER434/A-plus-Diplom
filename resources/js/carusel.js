document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('carouselTrack');
    if (!track || !track.querySelectorAll('.carousel-card').length) return;

    let position = 0; // 0 — первые 4 карточки, 1 — вторые 4 карточки
    let interval;

    function updateCarousel() {
        const cardWidth = track.querySelector('.carousel-card').offsetWidth + 24; // ширина + gap
        const visibleCards = 4; // показываем по 4 карточки

        const offset = position * visibleCards * cardWidth;
        track.style.transition = 'transform 0.5s ease-in-out';
        track.style.transform = `translateX(-${offset}px)`;
    }

    function startAutoScroll() {
        interval = setInterval(() => {
            position = position === 0 ? 1 : 0;
            updateCarousel();
        }, 3000); // можно уменьшить до 2000 мс
    }

    function pauseAutoScroll() {
        clearInterval(interval);
    }

    function resumeAutoScroll() {
        pauseAutoScroll();
        startAutoScroll();
    }

    // Запуск автопрокрутки
    startAutoScroll();

    // Остановка при наведении
    const container = document.querySelector('.carousel-container');
    container.addEventListener('mouseenter', pauseAutoScroll);
    container.addEventListener('mouseleave', resumeAutoScroll);
});