<header class="w-full">
    <!-- Верхняя часть -->
    <div class="max-w-[1200px] mx-auto flex items-center py-4">
        <!-- Логотип -->
        <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-[75px] h-[75px] transition-transform duration-300 group-hover:scale-110 rounded-full">
            <div class="text-left">
                <p class="text-gray-600 text-lg">Типография</p>
                <p class="text-2xl font-bold text-gray-900">А ПЛЮС</p>
            </div>
        </a>

        <!-- Информация -->
        <div class="ml-[31%] space-y-1 group text-right">
            <p class="text-gray-900 font-medium hover:text-red-500 transition duration-300">+7 (351) 777-36-55</p>
            <p class="text-gray-500 text-sm hover:text-red-500 transition duration-300">aplus174@mail.ru</p>
        </div>

        <!-- Соцсети -->
        <div class="ml-[30px] flex space-x-6">
            <a href="#" class="group">
                <img src="{{ asset('images/messengers/headers/heder-wat.png') }}" alt="Telegram" class="w-[40px] h-[40px] transition-transform duration-300 group-hover:scale-110">
            </a>
            <a href="#" class="group">
                <img src="{{ asset('images/messengers/headers/heder-tg.png') }}" alt="WhatsApp" class="w-[40px] h-[40px] transition-transform duration-300 group-hover:scale-110">
            </a>
            <a href="https://vk.com/aplus174" class="group">
                <img src="{{ asset('images/messengers/headers/heder-vk.png') }}" alt="Vk" class="w-[40px] h-[40px] transition-transform duration-300 group-hover:scale-110">
            </a>
        </div>

        <!-- Блок поиска -->
        <div class="relative ml-[25px] w-[282px]">
            <!-- Поле поиска -->
            <div class="w-full h-[50px] border border-black rounded-[10px] flex items-center">
                <input 
                    type="text" 
                    id="search-input" 
                    placeholder="Поиск..." 
                    class="flex-1 h-full px-4 text-black rounded-l-[10px] border-none placeholder-gray-500"
                >
                <div class="h-full w-[1px] bg-black"></div> <!-- Вертикальная линия -->
                <button 
                    id="search-button" 
                    class="w-[50px] h-full flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <!-- Контейнер для вывода результатов поиска -->
            <div id="search-results" class="hidden absolute top-[50px] left-0 w-full bg-white border border-black rounded-[10px] shadow-md z-10">
                <ul class="p-4">
                    <!-- Результаты поиска будут динамически добавляться сюда -->
                </ul>
            </div>
        </div>
    </div>

    <!-- Нижняя часть -->
    <div class="max-w-[1200px] mx-auto flex items-center py-4 border-t border-gray-200">
        <!-- Навигация -->
        <nav class="space-x-6">
            <a href="{{ route('home') }}" class="text-black hover:text-red-500 transition duration-300">Главная</a>
            <a href="{{ route('all-services.index') }}" class="text-black hover:text-red-500 transition duration-300">Все услуги</a>
            <a href="{{ route('about') }}" class="text-black hover:text-red-500 transition duration-300">О нас</a>
            <a href="{{ route('portfolio.index') }}" class="text-black hover:text-red-500 transition duration-300">Портфолио</a>
            <a href="{{ route('contacts') }}" class="text-black hover:text-red-500 transition duration-300">Контакты</a>
        </nav>

        <!-- Профиль -->
        @if(Auth::check())
            <!-- Для авторизованного пользователя -->
            <div class="flex items-center space-x-3 ml-[28%]  border border-black rounded-[10px]">
                <img src="{{ Auth::user()->image ?? asset('images/default-avatar.png') }}" alt="Avatar" class="w-[35px] h-[35px] rounded-full ml-[15px]">
                <div class="flex items-center space-x-0   overflow-hidden">
                    <a href="{{ route('profile') }}" class="w-[145px] h-[50px] flex items-center justify-center border-l border-black rounded-l-[5px] bg-transparent hover:bg-black hover:text-white transition duration-300">
                        {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-[80px] h-[50px] flex items-center justify-center border-l border-black rounded-r-[9px] bg-transparent hover:bg-black hover:text-white transition duration-300">
                            Выйти
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- Для гостя -->
            <div class="flex items-center space-x-3 ml-[29%] border border-black rounded-[10px]">
                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="w-[30px] h-[30px] rounded-full ml-[15px]">
                <div class="flex items-center space-x-0  overflow-hidden">
                    <a href="{{ route('register') }}" class="w-[145px] h-[50px] flex items-center justify-center border-l border-black rounded-l-[5px] bg-transparent hover:bg-black hover:text-white transition duration-300">
                        Регистрация
                    </a>
                    <a href="{{ route('login') }}" class="w-[80px] h-[50px] flex items-center justify-center border-l border-black rounded-r-[9px]  bg-transparent hover:bg-black hover:text-white transition duration-300">
                        Войти
                    </a>
                </div>
            </div>
        @endif

        <!-- Корзина -->
        <div class="relative ml-[20px]">
            <a href="{{ route('cart.index') }}" class="w-[103px] h-[50px] flex items-center justify-center border border-black rounded-[10px] bg-transparent hover:bg-black hover:text-white transition duration-300">
                Корзина
            </a>
            <span class="absolute top-[-10px] right-[-10px] bg-red-500 text-white w-[20px] h-[20px] rounded-full flex items-center justify-center text-xs cart-counter">
                {{ session('cart_count', 0) }}
            </span>
        </div>
    </div>
</header>





<script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-button');
    const searchResults = document.getElementById('search-results');

    // Данные для поиска (страницы и услуги)
    const searchData = [
        { name: 'Портфолио', url: '/portfolio' },
        { name: 'Все услуги', url: '/all-services' },
        { name: 'Главная', url: '/' },
        { name: 'Визитки - Квадратные', url: '/all-services/vizitki-kvadratnye' },
        { name: 'Визитки - Дешевые', url: '/all-services/vizitki-deshevye' },
        { name: 'Визитки - с ламинацией', url: '/all-services/vizitki-s-laminaciey' },
        { name: 'Печать флаеров', url: '/all-services/pechat-flyerov' },
        { name: 'Футболки', url: '/all-services/futbolki' },
        { name: 'Настольные календари', url: '/all-services/nastolnye-kalendari' },
        { name: 'Стикерпаки', url: '/all-services/stikerpaki' },
        { name: 'Печать блокнотов', url: '/all-services/pechat-bloknotov' },
    ];

    // Функция для поиска совпадений
    function performSearch(query) {
        query = query.trim().toLowerCase();

        if (!query) {
            searchResults.classList.add('hidden');
            return;
        }

        const matches = searchData.filter(item => item.name.toLowerCase().includes(query));

        if (matches.length > 0) {
            const resultsHTML = matches.map(item => `
                <li onclick="window.location.href='${item.url}'">${item.name}</li>
            `).join('');

            searchResults.querySelector('ul').innerHTML = resultsHTML;
            searchResults.classList.remove('hidden');
        } else {
            searchResults.querySelector('ul').innerHTML = '<li>Ничего не найдено</li>';
            searchResults.classList.remove('hidden');
        }
    }

    // Обработка ввода текста
    searchInput.addEventListener('input', () => {
        performSearch(searchInput.value);
    });

    // Скрытие результатов при клике вне поля поиска
    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.classList.add('hidden');
        }
    });

    // Обработка нажатия на кнопку поиска
    searchButton.addEventListener('click', () => {
        const query = searchInput.value.trim();
        if (query) {
            const match = searchData.find(item => item.name.toLowerCase() === query.toLowerCase());
            if (match) {
                window.location.href = match.url;
            } else {
                alert('Ничего не найдено');
            }
        }
    });
});
</script>