@if(isset($sliders) && $sliders->count() > 0)
<div class="relative w-full h-[500px] bg-gray-700 overflow-hidden mt-[60px]">
        <!-- Трапеция с изображением -->
        <div class="absolute left-0 w-[1178px] h-[500px] clip-path-trapezoid overflow-hidden">
            @foreach ($sliders as $index => $slider)
                <img src="{{ $slider->image_url }}" alt="Slide {{ $index + 1 }}" 
                    class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 slider-image {{ $index === 0 ? 'active' : '' }}" 
                    data-index="{{ $index }}"
                    data-title="{{ $slider->title }}"
                    data-subtitle="{{ $slider->subtitle }}"
                    data-button-text="{{ $slider->button_text }}"
                    data-button-link="{{ $slider->button_link }}">
            @endforeach
        </div>

    
        <!-- Контейнер с содержимым -->
            <div class="max-w-[1200px] mx-auto flex items-center justify-end mt-[60px]">
                <div class="justify-end">
                    <div class="bg-transparent p-8 rounded-lg max-w-[350px]">
                        <h1 class="text-2xl font-bold mb-4 text-white slider-title">{{ $sliders[0]->title }}</h1>
                        <p class="text-base text-white mb-6 slider-subtitle">{{ $sliders[0]->subtitle }}</p>
                        <a href="{{ $sliders[0]->button_link }}" class="inline-block px-6 py-3 border border-white text-white rounded hover:bg-white hover:text-black transition duration-300 slider-button">
                            {{ $sliders[0]->button_text }}
                        </a>
                    </div>
                </div>
            </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.slider-image');
            const dots = document.querySelectorAll('.slider-dot');
            let currentIndex = 0;

            // Элементы для отображения текста и кнопки
            const titleElement = document.querySelector('.slider-title');
            const subtitleElement = document.querySelector('.slider-subtitle');
            const buttonElement = document.querySelector('.slider-button');

            // Функция для показа слайда
            function showSlide(index) {
                // Обновляем изображения
                images.forEach((img, i) => img.classList.toggle('active', i === index));
                dots.forEach((dot, i) => dot.classList.toggle('active', i === index));

                // Обновляем текст и кнопку
                const currentSlide = images[index];
                titleElement.textContent = currentSlide.dataset.title;
                subtitleElement.textContent = currentSlide.dataset.subtitle;
                buttonElement.textContent = currentSlide.dataset.buttonText;
                buttonElement.href = currentSlide.dataset.buttonLink;
            }

            // Автоматическая смена слайдов
            function nextSlide() {
                currentIndex = (currentIndex + 1) % images.length;
                showSlide(currentIndex);
            }

            // Переключение по кругляшкам
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    currentIndex = parseInt(dot.dataset.index);
                    showSlide(currentIndex);
                });
            });

            // Запуск автоматической смены каждые 5 секунд
            setInterval(nextSlide, 5000);

            // Инициализация первого слайда
            showSlide(currentIndex);
        });
    </script>
@else
    <p>Нет доступных слайдов.</p>
@endif