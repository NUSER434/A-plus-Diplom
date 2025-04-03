<!-- Кнопки в правом нижнем углу -->
<div class="fixed bottom-[20px] right-[20px] flex flex-col items-end space-y-4 z-50">

    <!-- Кнопка "Связь" -->
    <div class="relative">
        <button id="contact-button" class="group w-[50px] h-[50px] bg-gray-300 rounded-full shadow-md flex items-center justify-center cursor-pointer hover:bg-gray-400 transition-all relative overflow-hidden">
            <!-- Иконка -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black group-hover:text-white transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <!-- Надпись "Связь" -->
            <span class="absolute bottom-[-30px] left-0 w-full text-center text-xs text-black opacity-0 group-hover:opacity-100 group-hover:bottom-[-5px] transition-all duration-300">
                Связь
            </span>

            <!-- Анимация фона -->
            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-70 transition-all duration-300"></div>
        </button>

        <!-- Дополнительные кнопки "WhatsApp" и "Telegram" -->
        <div id="social-buttons" class="hidden absolute bottom-[70px] right-0 flex flex-col space-y-4">
            <a href="https://wa.me/" target="_blank" class="w-[50px] h-[50px] bg-green-500 rounded-full shadow-md flex items-center justify-center cursor-pointer hover:bg-green-600 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343 8.001 8.001 0 1017.657 18.657zM12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                </svg>
            </a>
            <a href="https://t.me/" target="_blank" class="w-[50px] h-[50px] bg-blue-500 rounded-full shadow-md flex items-center justify-center cursor-pointer hover:bg-blue-600 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Кнопка "Портфолио" -->
    <div class="relative">
        <a href="{{ route('portfolio.index') }}" class="group w-[50px] h-[50px] bg-gray-300 rounded-full shadow-md flex items-center justify-center cursor-pointer hover:bg-gray-400 transition-all relative overflow-hidden">
            <!-- Иконка -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black group-hover:text-white transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2H5a2 2 0 00-2 2v2" />
            </svg>

            <!-- Анимация фона -->
            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-70 transition-all duration-300"></div>
        </a>

        <!-- Надпись "Портфолио" -->
        <span class="absolute bottom-[60px] right-0 text-xs text-black opacity-0 group-hover:opacity-100 transition-all duration-300">
            Портфолио
        </span>
    </div>

    <!-- Кнопка "Наверх" -->
    <div id="scrollToTopBtn" class="hidden w-[50px] h-[50px] bg-red-500 text-white rounded-full flex items-center justify-center cursor-pointer shadow-md transition-all transform hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </div>

</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Кнопка "Наверх"
    const scrollToTopButton = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            scrollToTopButton.classList.remove('hidden');
        } else {
            scrollToTopButton.classList.add('hidden');
        }
    });

    scrollToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    });

    // Кнопка "Связь"
    const contactButton = document.getElementById('contact-button');
    const socialButtons = document.getElementById('social-buttons');

    contactButton.addEventListener('click', () => {
        console.log('Кнопка "Связь" нажата'); // Отладочное сообщение

        if (socialButtons.classList.contains('hidden')) {
            // Показываем кнопки "WhatsApp" и "Telegram"
            socialButtons.classList.remove('hidden');
            contactButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            `;
        } else {
            // Скрываем кнопки "WhatsApp" и "Telegram"
            socialButtons.classList.add('hidden');
            contactButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            `;
        }
    });
});
</script>