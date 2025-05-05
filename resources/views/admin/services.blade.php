<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Типография А-Плюс - Управление услугами</title>
    <link rel="icon" type="" href="images/logo.png">
    <link rel="shortcut icon" type="" href="images/logo.png">
</head>
<body>
@include('partials.basic.header')

<div class="min-h-screen sm:px-6 lg:px-8 mt-[60px]">
    <div class="mx-auto max-w-[1200px] rounded-lg">
        <h4 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300">Список услуг</h4>

        <!-- Кнопка "Добавить" -->
        <div class="mt-6">
            <button onclick="document.getElementById('addServiceModal').classList.remove('hidden')"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Добавить услугу
            </button>
        </div>

        <!-- Таблица -->
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-black border-collapse border border-black mt-[30px]">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Категория</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Название</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Описание</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Изображение</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Slug</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-black">Действия</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black">
                    @foreach($services as $service)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $service->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $service->category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $service->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $service->description ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">
                                <img src="{{ $service->image }}" alt="Image" class="h-10 w-auto">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black">{{ $service->slug }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border border-black space-x-2">
                                <button onclick="document.getElementById('editServiceModal-{{ $service->id }}').classList.remove('hidden')"
                                        class="text-red-600 hover:bg-red-600 hover:text-white border border-red-600 px-3 py-1 rounded transition">
                                    Изменить
                                </button>
                                <button onclick="document.getElementById('deleteServiceModal-{{ $service->id }}').classList.remove('hidden')"
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

<!-- Модальное окно добавления услуги -->
<div id="addServiceModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden overflow-y-auto h-full w-full z-50 transition-all duration-500">
    <div class="flex items-center justify-center min-h-screen px-4 py-10">
        <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full mx-auto max-w-[600px] transform transition-all duration-500 ease-out">
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button onclick="document.getElementById('addServiceModal').classList.add('hidden')" 
                        class="text-gray-500 hover:text-gray-700 focus:outline-none transform transition-all duration-300 hover:rotate-90">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-6 pt-8 pb-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-t-xl">
                <h3 class="text-2xl font-bold text-gray-900 text-center">Добавить услугу</h3>
            </div>
            <form method="POST" action="{{ route('admin.services.store') }}" class="p-6">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <!-- Поля формы -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Категория</label>
                        <input type="text" name="category" required
                               class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                    </div>
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700">Название</label>
                        <input type="text" name="name" required
                               class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                    </div>
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700">Описание</label>
                        <textarea name="description" rows="3"
                                  class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md"></textarea>
                    </div>
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700">Изображение (URL)</label>
                        <input type="url" name="image" required
                               class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                    </div>
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" required
                               class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                    </div>
                </div>
                <div class="mt-8 flex justify-center space-x-4">
                    <button type="button" 
                            onclick="document.getElementById('addServiceModal').classList.add('hidden')"
                            class="px-6 py-2 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                        Отмена
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 rounded-xl bg-green-600 text-white font-medium overflow-hidden transition-all duration-300 hover:bg-green-700 hover:shadow-lg hover:shadow-green-500/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Добавить услугу
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($services as $service)
    <!-- Модальное окно редактирования услуги -->
    <div id="editServiceModal-{{ $service->id }}" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden overflow-y-auto h-full w-full z-50 transition-all duration-500">
        <div class="flex items-center justify-center min-h-screen px-4 py-10">
            <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full mx-auto max-w-[600px] transform transition-all duration-500 ease-out">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button onclick="document.getElementById('editServiceModal-{{ $service->id }}').classList.add('hidden')" 
                            class="text-gray-500 hover:text-gray-700 focus:outline-none transform transition-all duration-300 hover:rotate-90">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="px-6 pt-8 pb-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-t-xl">
                    <h3 class="text-2xl font-bold text-gray-900 text-center">Редактировать услугу</h3>
                </div>
                <form method="POST" action="{{ route('admin.services.update', $service->id) }}" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4">
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Категория</label>
                            <input type="text" name="category" value="{{ $service->category }}" required
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input type="text" name="name" value="{{ $service->name }}" required
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Описание</label>
                            <textarea name="description" rows="3"
                                      class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">{{ $service->description }}</textarea>
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Изображение (URL)</label>
                            <input type="url" name="image" value="{{ $service->image }}" required
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" value="{{ $service->slug }}" required
                                   class="w-full rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 p-2 group-hover:shadow-md">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center space-x-4">
                        <button type="button" 
                                onclick="document.getElementById('editServiceModal-{{ $service->id }}').classList.add('hidden')"
                                class="px-6 py-2 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                            Отмена
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 rounded-xl bg-green-600 text-white font-medium overflow-hidden transition-all duration-300 hover:bg-green-700 hover:shadow-lg hover:shadow-green-500/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Сохранить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Модальное окно удаления услуги -->
    <div id="deleteServiceModal-{{ $service->id }}" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden overflow-y-auto h-full w-full z-50 transition-all duration-500">
        <div class="flex items-center justify-center min-h-screen px-4 py-10">
            <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full mx-auto max-w-[600px] transform transition-all duration-500 ease-out">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button onclick="document.getElementById('deleteServiceModal-{{ $service->id }}').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none transform transition-all duration-300 hover:rotate-90">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="px-6 pt-8 pb-4 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-t-xl">
                    <h3 class="text-2xl font-bold text-gray-900 text-center">Подтвердите удаление</h3>
                </div>
                <form method="POST" action="{{ route('admin.services.delete', $service->id) }}" class="p-6">
                    @csrf
                    @method('DELETE')
                    <div class="mb-6">
                        <p class="text-red-600 font-bold text-center text-lg">Удаление услуги невозможно восстановить.</p>
                        <p class="mt-3 text-center">Для подтверждения введите <strong class="text-amber-600">"DELETED"</strong> в поле ниже.</p>
                        <p class="mt-4 font-semibold text-gray-800 text-center">
                            {{ $service->name }}
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
                                onclick="document.getElementById('deleteServiceModal-{{ $service->id }}').classList.add('hidden')"
                                class="px-6 py-2 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                            Отмена
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 rounded-xl bg-red-500 text-white font-medium overflow-hidden transition-all duration-300 hover:bg-red-600 hover:shadow-lg hover:shadow-red-500/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Удалить услугу
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Сообщения -->
@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-100 text-green-800 p-4 rounded shadow-md z-50 transition-opacity duration-300">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="fixed top-4 right-4 bg-red-100 text-red-800 p-4 rounded shadow-md z-50 transition-opacity duration-300">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>