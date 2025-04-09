<div class="flex space-x-4">
    <!-- Область для отзывов -->
    <div class="w-[900px] overflow-x-auto overflow-y-hidden whitespace-nowrap scroll-smooth rounded-lg">
        <div class="flex space-x-4">
            <!-- Вывод отзывов из базы данных -->
            @foreach ($reviews as $review)
                <div class="inline-block w-[278px] h-[260px] cursor-pointer">
                    <div class="w-[278px] h-[260px] border border-black rounded-lg p-5">
                        <div class="flex items-center">
                            <img src="{{ asset($review->avatar ?? 'images/default-avatar.jpg') }}" alt="Avatar" class="w-[50px] h-[50px] rounded-full">
                            <div class="ml-5">
                                <p class="text-xs text-gray-700 ml-[130px]">{{ $review->rating }}/5</p>
                                <p class="text-sm font-medium text-gray-900 break-words whitespace-normal">{{ $review->name }}</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300 w-[168px] ml-[70px] mt-2">
                        <p class="text-sm text-gray-700 mt-4 break-words whitespace-normal">"{{ $review->review }}"</p>
                        <p class="text-xs text-gray-500 mt-2">Источник: {{ $review->source }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Блок "Оставить отзыв" -->
    <div class="w-[278px] h-[260px] border border-black rounded-lg p-5">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Avatar" class="w-[50px] h-[50px] rounded-full">
            <div>
                <p class="text-sm font-medium text-gray-900">Мы будем рады вашему отзыву!</p>
            </div>
        </div>
        <hr class="border-t border-gray-300 w-[168px] ml-[70px] mt-2">
        <p class="text-sm text-gray-700 mt-4">Поделитесь своим опытом сотрудничества с нами.</p>
        <button class="w-full h-[40px] bg-black text-white text-sm font-medium rounded-md hover:bg-gray-800 transition-colors mt-6"
            onclick="openLeaveReviewModal()">Оставить отзыв</button>
    </div>
</div>