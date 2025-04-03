<section class="">
    <div class="container mx-auto max-w-[1200px]">

        <!-- Кнопки фильтрации -->
        <div class="flex justify-center space-x-4 mb-[30px]">
            <button class="w-[145px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button active-button"
                onclick="showContent('popular')">Популярное</button>
            <button class="w-[270px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
                onclick="showContent('special')">Специальное предложение</button>
            <button class="w-[240px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
                onclick="showContent('choose')">Не знаете что выбрать?</button>
            <button class="w-[235px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
                onclick="showContent('why-us')">Почему выбирают нас</button>
            <a href="{{ route('all-services.index') }}" class="w-[220px] h-[40px] border border-black bg-black text-white font-medium rounded-md hover:bg-transparent hover:text-black transition-all inline-flex items-center justify-center">
                Смотреть все услуги
            </a>
        </div>

        <!-- Область вывода контента -->
        <div id="popular" class="content1 active">
            @include('partials.home-sect.popularity.popular')
        </div>
        <div id="special" class="content1 hidden">
            @include('partials.home-sect.popularity.special')
        </div>
        <div id="choose" class="content1 hidden">
            @include('partials.home-sect.popularity.choose')
        </div>
        <div id="why-us" class="content1 hidden">
            @include('partials.home-sect.popularity.why-us')
        </div>


    </div>
</section>


<script> 

// Функция для переключения контента
function showContent(contentId) {
    const buttons = document.querySelectorAll('.button');
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

// Инициализация контента по умолчанию
document.addEventListener('DOMContentLoaded', () => {
    showContent('popular');
});

</script>