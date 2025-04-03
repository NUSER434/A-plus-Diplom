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

    <!-- Основной контент -->
    <main class="mt-16">
        <!-- Первый ряд: Личная информация и Изменить пароль -->
        <section class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Личная информация -->
            <div class="bg-white rounded-lg">
                <h2 class="text-2xl font-bold text-black mb-6">Личная информация</h2>
                <form action="{{ route('profile.update') }}" method="POST" class="">
                    @csrf
                    @method('POST')

                    <!-- Аватар -->
                    <div>
                        <input type="url" id="avatar_url" name="avatar_url" value="{{ $user->avatar }}" placeholder="Ссылка на аватар" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Фамилия -->
                    <div>
                        <input type="text" id="surname" name="surname" value="{{ $user->surname }}" placeholder="Фамилия" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Имя -->
                    <div>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Имя" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Отчество -->
                    <div>
                        <input type="text" id="patronymic" name="patronymic" value="{{ $user->patronymic }}" placeholder="Отчество" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Телефон -->
                    <div>
                        <input type="text" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Телефон" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Кнопка сохранения -->
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition duration-300 mt-[25px]">
                        Сохранить изменения
                    </button>

                    @if(session('success'))
                        <p class="text-green-600 mt-4">{{ session('success') }}</p>
                    @endif
                </form>
            </div>

            <!-- Изменить пароль -->
            <div class="bg-white rounded-lg ">
                <h2 class="text-2xl font-bold text-black mb-6">Изменить пароль</h2>
                <form action="{{ route('profile.update') }}" method="POST" class="">
                    @csrf
                    @method('POST')

                    <!-- Текущий пароль -->
                    <div>
                        <input type="password" id="current_password" name="current_password" placeholder="Текущий пароль" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Новый пароль -->
                    <div>
                        <input type="password" id="new_password" name="new_password" placeholder="Новый пароль" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Подтверждение нового пароля -->
                    <div>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Подтвердите новый пароль" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black mt-[20px]">
                    </div>

                    <!-- Кнопка сохранения -->
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition duration-300 mt-[150px]">
                        Сохранить новый пароль
                    </button>

                    @if($errors->has('current_password'))
                        <p class="text-red-600 mt-4">{{ $errors->first('current_password') }}</p>
                    @endif
                </form>
            </div>
        </section>

        <!-- Второй ряд: Изменить e-mail и Удалить аккаунт -->
        <section class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <!-- Изменить e-mail -->
            <div class="bg-white rounded-lg ">
                <h2 class="text-2xl font-bold text-black mb-6">Изменить e-mail</h2>
                <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('POST')

                    <!-- Новый e-mail -->
                    <div>
                        <input type="email" id="email" name="email" placeholder="Новый e-mail" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black">
                    </div>

                    <!-- Кнопка сохранения -->
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition duration-300">
                        Сохранить новый e-mail
                    </button>

                    @if($errors->has('email'))
                        <p class="text-red-600 mt-4">{{ $errors->first('email') }}</p>
                    @endif
                </form>
            </div>

            <!-- Удалить аккаунт -->
            <div class="bg-white rounded-lg ">
                <h2 class="text-2xl font-bold text-black mb-6">Удалить аккаунт</h2>
                <p class="text-gray-600 mb-4">Это действие нельзя отменить. Все ваши данные будут удалены.</p>
                <button id="delete-account-btn" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                    Удалить аккаунт
                </button>

                <!-- Модальное окно -->
                <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
                    <div class="bg-white rounded-lg p-8 max-w-[400px] ml-[40%] mt-[10%]">
                        <h3 class="text-xl font-bold text-black mb-4">Подтвердите удаление</h3>
                        <p class="text-gray-600 mb-4">Введите "deleted", чтобы удалить аккаунт:</p>
                        <form action="{{ route('profile.delete') }}" method="POST" class="space-y-4">
                            @csrf
                            @method('DELETE')
                            <input type="text" name="confirmation" placeholder="Введите 'deleted'" class="w-full max-w-[350px] border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black">
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                                Подтвердить удаление
                            </button>
                            <button type="button" id="close-modal-btn" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400 transition duration-300">
                                Отмена
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

@include('partials.basic.footer')
@include('partials.buttons')

<script>

    // Логика для модального окна
const deleteModal = document.getElementById('delete-modal');
const deleteBtn = document.getElementById('delete-account-btn');
const closeModalBtn = document.getElementById('close-modal-btn');

deleteBtn.addEventListener('click', () => {
    deleteModal.classList.remove('hidden');
});

closeModalBtn.addEventListener('click', () => {
    deleteModal.classList.add('hidden');
});
</script>    
</body>
</html>