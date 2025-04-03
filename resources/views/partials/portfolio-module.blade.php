<div class="max-w-[1200px] mx-auto py-16">
    <!-- Заголовок и кнопка -->
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300 ">Портфолио</h2>
        <a href="{{ route('portfolio.index') }}" class="w-[220px] h-[40px] border border-black bg-black text-white font-medium rounded-md hover:bg-transparent hover:text-black transition-all inline-flex items-center justify-center">
            Смотреть все работы
        </a>
    </div>

    <!-- Карусель -->
    <div class="relative overflow-x-auto overflow-y-hidden whitespace-nowrap scroll-smooth">
        <!-- Контейнеры -->
        @foreach ($portfolios as $portfolio)
            <div class="inline-block w-[370px] h-[300px] cursor-pointer ml-10 first:ml-0" onclick="location.href='{{ route('portfolio.show', strtolower($portfolio->category)) }}'">
                <img src="{{ $portfolio->image }}" alt="{{ $portfolio->category }}" class="w-full h-full object-cover rounded-lg">
            </div>
        @endforeach
    </div>
</div>

<script>
    // Добавляем поддержку свайпа для мобильных устройств
    const carousel = document.querySelector('.overflow-x-auto');
    let startX = 0;
    let scrollLeft = 0;

    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
    });

    carousel.addEventListener('touchmove', (e) => {
        const x = e.touches[0].pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2; // Скорость свайпа
        carousel.scrollLeft = scrollLeft - walk;
    });
</script>