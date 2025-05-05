<div class="container mx-auto max-w-[1200px] px-4">
    <!-- Блок с отзывами и кнопкой -->
    <div class="flex flex-col lg:flex-row lg:justify-between gap-6">
        <!-- Область для отзывов -->
        <div class="w-full lg:w-[calc(100%-300px)] overflow-x-auto whitespace-nowrap scroll-smooth rounded-lg">
            <div class="flex gap-4 pb-4">
                @foreach ($reviews as $review)
                    <div class="inline-block w-[278px] h-[260px] flex-shrink-0">
                        <div class="w-[278px] h-[260px] border border-black rounded-lg p-5 bg-white">
                            <div class="flex items-center">
                                <img src="{{ asset($review->avatar ?? 'images/default-avatar.jpg') }}" alt="Avatar" class="w-[50px] h-[50px] rounded-full">
                                <div class="ml-5">
                                    <p class="text-xs text-gray-700">{{ $review->rating }}/5</p>
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
        <div class="w-full lg:w-[278px] h-[260px] border border-black rounded-lg p-5 bg-white flex flex-col justify-center items-center text-center">
            <div class="flex flex-col items-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-[50px] h-[50px] rounded-full">
                <p class="text-sm font-medium text-gray-900 mt-3">Мы будем рады вашему отзыву!</p>
            </div>
            <hr class="border-t border-gray-300 w-[168px] mt-2">
            <p class="text-sm text-gray-700 mt-4">Поделитесь своим опытом сотрудничества с нами.</p>
            <button class="w-full h-[40px] bg-black text-white text-sm font-medium rounded-md hover:bg-gray-800 transition-colors mt-4"
                    onclick="openLeaveReviewModal()">
                Оставить отзыв
            </button>
        </div>
    </div>
</div>