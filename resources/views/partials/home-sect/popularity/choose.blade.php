<form action="/submit-form" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-[600px] mx-auto">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Как к вам обращаться</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта</label>
        <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
        <label for="message" class="block text-sm font-medium text-gray-700">Что вам нужно?</label>
        <textarea name="message" id="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>
    <div>
        <label for="file" class="block text-sm font-medium text-gray-700">Прикрепить файл (если есть)</label>
        <input type="file" name="file" id="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
    </div>
    <button type="submit" class="w-[200px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">
        Отправить
    </button>
</form>