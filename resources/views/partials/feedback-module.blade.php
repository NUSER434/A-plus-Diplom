<section class="mt-[100px]">
    <div class="container mx-auto max-w-[1200px]">
        <!-- Текст и кнопки в одном ряду -->
        <div class="flex justify-between items-center mb-[30px]">
            <h2 class="text-[28px] font-bold text-gray-900">Обратная связь</h2>

            <div class="flex space-x-4">
                <button class="w-[230px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all active-button"
                    onclick="showFeedbackContent('reviews')">Отзывы наших клиентов</button>
                <button class="w-[330px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all"
                    onclick="showFeedbackContent('social')">Благодарности клиентов в соцсетях</button>
                <button class="w-[220px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all"
                    onclick="showFeedbackContent('leave-review')">Оставить отзыв</button>
            </div>
        </div>

        <!-- Динамический контент -->
        <div id="reviews" class="content active">
        @include('partials.home-sect.obrat.reviews')
        </div>
        <div id="social" class="content hidden">
        @include('partials.home-sect.obrat.social')
        </div>
        <div id="leave-review" class="content hidden">
        @include('partials.home-sect.obrat.leave-review')
        </div>
    </div>
</section>


<script>
    // Функция для переключения контента
    function showFeedbackContent(contentId) {
        // Скрываем все контейнеры
        document.querySelectorAll('.content').forEach(content => {
            content.classList.add('hidden');
        });

        // Показываем выбранный контейнер
        document.getElementById(contentId).classList.remove('hidden');
    }

    // Инициализация первого контента
    document.addEventListener('DOMContentLoaded', () => {
        showFeedbackContent('reviews');
    });
</script>