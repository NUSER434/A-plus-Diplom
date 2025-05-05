<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Типография А-Плюс - Управление пользователями</title>
    <link rel="icon" type="" href="images/logo.png">
    <link rel="shortcut icon" type="" href="images/logo.png">
</head>
<body>
@include('partials.basic.header')

<div class="min-h-screen sm:px-6 lg:px-8 mt-[60px]">
    <div class="mx-auto max-w-[1200px] rounded-lg">
        <h4 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300">Список пользователей</h4>
        <!-- Ваша таблица из HTML-файла -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-black border-collapse border border-black mt-[30px]">
            <thead class="bg-black text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Фамилия</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Имя</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Отчество</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Телефон</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Действия</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $user->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $user->first_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $user->middle_name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $user->phone ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black space-x-2">
                                <button onclick="document.getElementById('editModal-{{ $user->id }}').classList.remove('hidden')"
                                        class="text-red-600 hover:bg-red-600 hover:text-white border border-red-600 px-3 py-1 rounded transition">
                                    Изменить
                                </button>
                                
                                <button onclick="document.getElementById('deleteModal-{{ $user->id }}').classList.remove('hidden')"
                                        class="text-red-600 hover:bg-red-600 hover:text-white border border-red-600 px-3 py-1 rounded transition">
                                    Удалить
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Модальные окна из HTML-файла -->
@foreach($users as $user)
    <!-- Модальное окно редактирования -->
    <div id="editModal-{{ $user->id }}" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden overflow-y-auto h-full w-full z-50">
    <div class="flex items-center justify-center min-h-screen px-4 py-10">
            <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full mx-auto max-w-[600px] transform transition-all duration-500 ease-out">
                <!-- Контент модального окна -->
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button onclick="document.getElementById('editModal-{{ $user->id }}').classList.add('hidden')" 
                            class="text-gray-500 hover:text-gray-700 focus:outline-none transform transition-all duration-300 hover:rotate-90">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="px-6 pt-8 pb-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-t-xl">
                    <h3 class="text-2xl font-bold text-gray-900 text-center">Редактировать пользователя</h3>
                </div>
                
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Поля формы -->
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Имя</label>
                            <input type="text" name="first_name" 
                                   value="{{ $user->first_name }}"
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <!-- Другие поля аналогично -->
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Фамилия</label>
                            <input type="text" name="last_name" 
                                   value="{{ $user->last_name }}"
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Отчество</label>
                            <input type="text" name="middle_name" 
                                   value="{{ $user->middle_name ?? '' }}"
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" 
                                   value="{{ $user->email }}"
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Телефон</label>
                            <input type="text" name="phone" 
                                   value="{{ $user->phone ?? '' }}"
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Роль</label>
                            <select name="role"
                                    class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Администратор</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Пользователь</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center space-x-4">
                        <button type="button" 
                                onclick="document.getElementById('editModal-{{ $user->id }}').classList.add('hidden')"
                                class="px-6 py-2 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                            Отмена
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                            Сохранить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Модальное окно удаления -->
    <div id="deleteModal-{{ $user->id }}" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden overflow-y-auto h-full w-full z-50">
    <div class="flex items-center justify-center min-h-screen px-4 py-10">
            <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full mx-auto max-w-[600px] transform transition-all duration-500 ease-out">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button onclick="document.getElementById('deleteModal-{{ $user->id }}').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none transform transition-all duration-300 hover:rotate-90">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="px-6 pt-8 pb-4 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-t-xl">
                    <h3 class="text-2xl font-bold text-gray-900 text-center">Подтвердите удаление</h3>
                </div>
                
                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="p-6">
                    @csrf
                    @method('DELETE')
                    <div class="mb-6">
                        <p class="text-red-600 font-bold text-center text-lg">Удаление аккаунта невозможно восстановить.</p>
                        <p class="mt-3 text-center">Для подтверждения введите <strong class="text-amber-600">"DELETED"</strong> в поле ниже.</p>
                        <p class="mt-4 font-semibold text-gray-800 text-center">
                            {{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name ?? '' }}
                        </p>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Подтверждение</label>
                        <input type="text" name="confirmation"
                               placeholder="Введите DELETED"
                               class="w-full rounded-lg border-2 border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 transition-all duration-300 p-2 hover:shadow-md">
                    </div>
                    
                    <div class="flex justify-center space-x-4">
                        <button type="button" 
                                onclick="document.getElementById('deleteModal-{{ $user->id }}').classList.add('hidden')"
                                class="px-6 py-2 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                            Отмена
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 rounded-xl bg-red-500 text-white font-medium overflow-hidden transition-all duration-300 hover:bg-red-600 hover:shadow-lg hover:shadow-red-500/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Удалить аккаунт
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
</body>
<script>
function openEditModal(userId) {
    const form = document.getElementById('editForm');
    const url = `/admin/user/${userId}`;
    
    // Устанавливаем action формы
    form.setAttribute('action', url);


    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function openDeleteModal(userId) {
    const modal = document.getElementById('deleteModal');
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    const input = document.getElementById('confirmationInput');
    
    // Очищаем предыдущий ввод
    input.value = '';
    confirmBtn.disabled = true;


    // Активация кнопки при вводе текста
    input.addEventListener('input', () => {
        confirmBtn.disabled = input.value.trim() !== 'Удалить аккаунт';
    });

    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Закрытие модалей при клике вне окна
document.getElementById('editModal').addEventListener('click', (e) => {
    if (e.target === document.getElementById('editModal')) closeEditModal();
});
document.getElementById('deleteModal').addEventListener('click', (e) => {
    if (e.target === document.getElementById('deleteModal')) closeDeleteModal();
});
</script>
</html>