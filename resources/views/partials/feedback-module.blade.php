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
                    onclick="openLeaveReviewModal()">Оставить отзыв</button>
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
        </div>
    </div>

    <!-- Модальное окно "Оставить отзыв" -->
        <div id="leave-review-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[600px] max-w-full relative">
                <button class="absolute top-2 right-2 text-gray-500 text-xl hover:text-black transition-colors"
                    onclick="closeLeaveReviewModal()">&times;</button>

                <h2 class="text-xl font-bold mb-4">Оставить отзыв</h2>

                <!-- Если пользователь не авторизован -->
                @guest
                    <div class="space-y-4">
                        <p class="text-red-500">Вы не авторизованы. Чтобы оставить отзыв, войдите или зарегистрируйтесь.</p>
                        <div class="flex space-x-4">
                            <a href="{{ route('login') }}" class="w-[150px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">Войти</a>
                            <a href="{{ route('register') }}" class="w-[150px] h-[40px] bg-gray-200 text-black font-medium rounded-md hover:bg-gray-300 transition-colors">Регистрация</a>
                        </div>
                    </div>
                @else
                    <!-- Если пользователь авторизован -->
                    <form action="{{ route('submit.review') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="flex justify-between items-center">
                            <div>
                                <p>Ваше имя:</p>
                                <p class="font-medium">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                <input type="hidden" name="name" value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                            </div>
                            <div>
                                <p>Ваш email:</p>
                                <p class="font-medium">{{ Auth::user()->email }}</p>
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>

                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700">Оценка работы</label>
                            <input type="number" name="rating" id="rating" step="0.1" min="1" max="5"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Например, 4.7" required>
                        </div>

                        <div>
                            <label for="review" class="block text-sm font-medium text-gray-700">Ваш комментарий</label>
                            <textarea name="review" id="review" rows="4"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required></textarea>
                        </div>

                        <button type="submit" class="w-[200px] h-[40px] bg-black text-white font-medium rounded-md hover:bg-gray-800 transition-colors">
                            Оставить отзыв
                        </button>
                    </form>
                @endauth
            </div>
        </div>
</section>


<script>
    function openLeaveReviewModal() {
        const modal = document.getElementById('leave-review-modal');
        modal.classList.remove('hidden');
    }

    function closeLeaveReviewModal() {
        const modal = document.getElementById('leave-review-modal');
        modal.classList.add('hidden');
    }


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