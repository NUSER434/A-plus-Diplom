<div class="grid grid-cols-4 gap-[20px]">
    <!-- Вывод отзывов из базы данных -->
    @foreach ($reviews as $review)
        <div class="w-[278px] h-[260px] border border-black rounded-[10px] p-[20px]">
            <div class="flex">
                <img src="{{ asset($review->avatar ?? 'images/default-avatar.jpg') }}" alt="Avatar" class="w-[50px] h-[50px] rounded-full">
                <div class="ml-[20px]">
                    <p class="text-xs text-gray-700 ml-[130px]">{{ $review->rating }}/5</p>
                    <p class="text-sm font-medium text-gray-900">{{ $review->name }}</p>
                </div>
            </div>
            <hr class="border-t border-gray-300 w-[168px] ml-[70px]">
            <p class="text-sm text-gray-700 mt-[20px]">"{{ $review->review }}"</p>
            <p class="text-xs text-gray-500 mt=[20px]">Источник: {{ $review->source }}</p>
        </div>
    @endforeach

    <!-- Запрос отзыва -->
    <div class="w-[278px] h-[260px] border border-black rounded-[10px] p-[20px]">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Avatar" class="w-[50px] h-[50px] rounded-full">
            <div>
                <p class="text-sm font-medium text-gray-900 ">Мы будем рады вашему отзыву!</p>
            </div>
        </div>
        <hr class="border-t border-gray-300 w-[168px] ml-[70px]">
        <p class="text-sm text-gray-700 mt-[20px]">Поделитесь своим опытом сотрудничества с нами.</p>
        <button class="w-full h-[40px] bg-black text-white text-sm font-medium rounded-md hover:bg-gray-800 transition-colors mt-[50px]"
            onclick="showFeedbackContent('leave-review')">Оставить отзыв</button>
    </div>
</div>