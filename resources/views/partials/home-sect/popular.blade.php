<section class="">
    <div class="container mx-auto max-w-[1200px]">

        <!-- Кнопки фильтрации -->
        <div class="flex justify-center space-x-4 mb-[30px]">
            <button class="w-[135px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button active-button"
                onclick="showContent('popular')">Популярное</button>
            <button class="w-[255px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
                onclick="showContent('special')">Специальное предложение</button>
            <button class="w-[220px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
                onclick="openModal()">Не знаете что выбрать?</button>
            <button class="w-[340px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
                onclick="showContent('why-us')">Что вы получаете, сотрудничая с нами?</button>
            <a href="{{ route('all-services.index') }}" class="w-[210px] h-[40px] border border-black bg-black text-white font-medium rounded-md hover:bg-transparent hover:text-black transition-all inline-flex items-center justify-center">
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
        </div>
        <div id="why-us" class="content1 hidden">
            @include('partials.home-sect.popularity.why-us')
        </div>

        <!-- Модальное окно -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[500px] max-w-full relative">
                <!-- Крестик для закрытия -->
                <button class="absolute top-2 right-4 text-gray-500 text-2xl hover:text-black transition-colors"
                    onclick="closeModal()">&times;</button>

                <h2 class="text-xl font-bold mb-4">Не знаете что выбрать?</h2>
                <form action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <!-- Если пользователь авторизован -->
                    @auth
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p>Как к вам обращаться:</p>
                                <p class="font-medium">{{ Auth::user()->first_name }}</p>
                                <input type="hidden" name="name" value="{{ Auth::user()->first_name }}">
                            </div>
                            <div>
                                <p>Ваш email:</p>
                                <p class="font-medium">{{ Auth::user()->email }}</p>
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    @else
                        <!-- Если пользователь не авторизован -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Как к вам обращаться</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>
                        </div>
                    @endauth

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Что вам нужно?</label>
                        <textarea name="message" id="message" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required></textarea>
                    </div>

                    <div class="flex items-center space-x-10">
                        <!-- Поле "Прикрепить файл" -->
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700">Прикрепить файл (только PDF)</label>
                            <input type="file" name="file" id="file" accept="application/pdf"
                                class="mt-1 block w-[250px] border border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Кнопка "Отправить" -->
                        <button type="submit"
                            class="w-[200px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors mt-[10px]">
                            Отправить
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>


<script> 
// Функция для открытия модального окна
function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    // Функция для закрытия модального окна
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    // Закрытие модального окна при клике вне его области
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('modal');
        if (event.target === modal) {
            closeModal();
        }
    });



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