<div class="flex space-x-8">

    <!-- Правая часть: Форма отзыва -->
    <form action="/submit-review" method="POST" class="space-y-4 w-full max-w-[1000px]">
        @csrf

        <!-- Текстовые поля "Как к вам обращаться" и "Электронная почта" -->
        <div class="flex space-x-4">
            <div class="w-[475px]">
                <label for="name" class="block text-sm font-medium text-gray-700">Как к вам обращаться</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="w-[475px]">
                <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <!-- Поле для отзыва -->
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Ваш отзыв</label>
            <textarea name="message" id="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <!-- Кнопка отправки формы -->
        <button type="submit" class="w-[200px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">
            Отправить
        </button>
    </form>

    <!-- Левая часть: Кнопки для оставления отзывов -->
    <div class="space-y-4 mt-[40px]">
        <a href="https://yandex.ru/maps/org/a_plyus/1187526621/reviews/?ll=61.378560%2C55.174764&z=17" target="_blank" class="block w-[200px] h-[40px] bg-black text-white text-center leading-[40px] rounded-md hover:bg-gray-800 transition-colors">
            Яндекс Карты
        </a>
        <a href="https://2gis.ru/chelyabinsk/firm/2111591606722454?m=61.378558%2C55.174917%2F20" target="_blank" class="block w-[200px] h-[40px] bg-black text-white text-center leading-[40px] rounded-md hover:bg-gray-800 transition-colors">
            2ГИС
        </a>
        <a href="https://vk.com/aplus174" target="_blank" class="block w-[200px] h-[40px] bg-black text-white text-center leading-[40px] rounded-md hover:bg-gray-800 transition-colors">
            ВКонтакте
        </a>
    </div>
</div>