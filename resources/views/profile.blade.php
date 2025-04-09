<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Типография А-Плюс - Главаня страница</title>
    <link rel="icon" type="" href="images/logo.png">
    <link rel="shortcut icon" type="" href="images/logo.png">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('partials.basic.header')
    <!-- Навигация -->
    <section class="mt-12">
        <div class="max-w-[1200px] mx-auto flex items-center space-x-4">
            <a href="{{ route('home') }}" class="text-black hover:text-red-500 transition duration-300">Главная</a>
            <span class="text-gray-400">|</span>
            <span class="text-black hover:text-red-500 transition duration-300">Профиль</span>
        </div>
    </section>

    <section class="container mx-auto max-w-[1200px] mt-8">
    <h1 class="text-2xl font-bold mb-6">Профиль</h1>

    <!-- Кнопки фильтрации -->
    <div class="flex justify-center space-x-4 mb-6">
        <button class="w-[200px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button active-button"
            onclick="showContent('personal')">Личная информация</button>
        <button class="w-[200px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all filter-button"
            onclick="showContent('history')">История</button>
    </div>

    <!-- Область вывода контента -->
    <div id="personal" class="content active">
        <div class="space-y-6">
        <!-- Данные пользователя -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Данные пользователя</h2>
            <div class="space-y-2">
                <p><strong>Фамилия:</strong> {{ Auth::user()->last_name }}</p>
                <p><strong>Имя:</strong> {{ Auth::user()->first_name }}</p>
                <p><strong>Отчество:</strong> {{ Auth::user()->middle_name }}</p>
                <p><strong>Телефон:</strong> {{ Auth::user()->phone ?? 'Не указан' }}</p>
            </div>
            <button class="mt-4 w-[150px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors"
                onclick="openEditModal()">Изменить данные</button>
        </div>

        <!-- Изменить пароль -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Изменить пароль</h2>
            <form action="{{ route('profile.update.password') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Текущий пароль</label>
                    <input type="password" name="current_password" id="current_password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Новый пароль</label>
                    <input type="password" name="new_password" id="new_password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Подтвердите новый пароль</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <button type="submit" class="w-[150px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">
                    Сохранить
                </button>
            </form>
        </div>

        <!-- Изменить email -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Изменить email</h2>
            <form action="{{ route('profile.update.email') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="new_email" class="block text-sm font-medium text-gray-700">Новый email</label>
                    <input type="email" name="new_email" id="new_email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <button type="submit" class="w-[150px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">
                    Сохранить
                </button>
            </form>
        </div>

        <!-- Удалить аккаунт -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Удалить аккаунт</h2>
            <p class="text-red-500">Внимание! Аккаунт нельзя восстановить после удаления.</p>
            <button class="mt-4 w-[150px] h-[40px] bg-red-500 text-white font-medium rounded-md hover:bg-red-600 transition-colors"
                onclick="openDeleteModal()">Удалить аккаунт</button>
        </div>
    </div>

    <!-- Модальное окно для изменения данных -->
    <div id="edit-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[400px] max-w-full relative">
            <button class="absolute top-2 right-2 text-gray-500 text-xl hover:text-black transition-colors"
                onclick="closeEditModal()">&times;</button>
            <h2 class="text-lg font-bold mb-4">Изменить данные</h2>
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Имя</label>
                    <input type="text" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Фамилия</label>
                    <input type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Отчество</label>
                    <input type="text" name="middle_name" id="middle_name" value="{{ Auth::user()->middle_name }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Телефон</label>
                    <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit" class="w-[150px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">
                    Сохранить
                </button>
            </form>
        </div>
    </div>

    <!-- Модальное окно для удаления аккаунта -->
    <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[400px] max-w-full relative">
            <button class="absolute top-2 right-2 text-gray-500 text-xl hover:text-black transition-colors"
                onclick="closeDeleteModal()">&times;</button>
            <h2 class="text-lg font-bold mb-4">Подтвердите удаление аккаунта</h2>
            <form action="{{ route('profile.delete') }}" method="POST" class="space-y-4">
                @csrf
                <p class="text-red-500">Введите "DELETED" для подтверждения:</p>
                <div>
                    <input type="text" name="confirmation" id="confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <button type="submit" class="w-[150px] h-[40px] bg-red-500 text-white font-medium rounded-md hover:bg-red-600 transition-colors">
                    Удалить
                </button>
            </form>
        </div>
    </div>
    </div>
    <div id="history" class="content hidden">
        <div class="space-y-6">
        <!-- История вопросов -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">История вопросов</h2>
            @if ($requests->isEmpty())
                <p>У вас нет запросов.</p>
            @else
                <div class="space-y-4">
                    @foreach ($requests as $request)
                        <div class="border border-gray-300 rounded-lg p-4">
                            <p><strong>Сообщение:</strong> {{ $request->message }}</p>
                            <p><strong>Email:</strong> {{ $request->email }}</p>
                            <p><strong>Дата:</strong> {{ $request->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- История заказов -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">История заказов</h2>
            <p>Этот раздел скоро появится.</p>
        </div>
    </div>
    </div>
</section>



@include('partials.basic.footer')
@include('partials.buttons')

<script>
// Функция для переключения контента
function showContent(contentId) {
        document.querySelectorAll('.content').forEach(content => content.classList.add('hidden'));
        document.getElementById(contentId).classList.remove('hidden');
    }


    // Функции для открытия и закрытия модальных окон
    function openEditModal() {
        document.getElementById('edit-modal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('edit-modal').classList.add('hidden');
    }

    function openDeleteModal() {
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>    
</body>
</html>