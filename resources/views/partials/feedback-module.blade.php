<section class="">
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto max-w-[1200px] px-4">
            <!-- Заголовок и кнопки -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
                <h2 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300 text-center">Обратная связь</h2>

                <!-- Кнопки фильтрации -->
                <div class="flex flex-wrap justify-center md:justify-end gap-4">
                    <button class="w-full sm:w-[230px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all active-button"
                            onclick="showFeedbackContent('reviews')">
                        Отзывы наших клиентов
                    </button>
                    <button class="w-full sm:w-[330px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all"
                            onclick="showFeedbackContent('social')">
                        Благодарности клиентов в соцсетях
                    </button>
                    <button class="w-full sm:w-[220px] h-[40px] border border-black bg-transparent text-black font-medium rounded-md hover:bg-black hover:text-white transition-all"
                            onclick="openLeaveReviewModal()">
                        Оставить отзыв
                    </button>
                </div>
            </div>

            <!-- Динамический контент -->
            <div id="reviews" class="content active">
                @include('partials.home-sect.obrat.reviews')
            </div>
            <div id="social" class="content hidden">
                @include('partials.home-sect.obrat.social')
            </div>
            <div id="leave-review" class="content hidden"></div>
        </div>
    </section>

<!-- Модальное окно -->
<div id="leave-review-modal" class="fixed inset-0 bg-gradient-to-br  backdrop-blur-sm flex justify-center items-center hidden z-50 p-4 overflow-y-auto max-h-screen">
    <!-- Содержимое модального окна -->
    <div class="modal-content bg-white rounded-2xl shadow-2xl w-full max-w-[700px] transform scale-95 opacity-0 transition-all duration-500 relative overflow-hidden mx-auto my-8">
        <!-- Градиентный бар сверху -->
        <div class="h-2 bg-gradient-to-r from-red-500 via-rose-500 to-pink-700"></div>
        
        <div class="p-6 sm:p-8 md:p-10 max-h-[70vh] overflow-y-auto space-y-6">
            <!-- Крестик закрытия -->
            <button class="absolute top-4 right-4 text-gray-400 hover:text-white transition-colors duration-300 hover:scale-110"
                    onclick="closeLeaveReviewModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- === Если пользователь не авторизован === -->
            @guest
                <div class="space-y-6 text-center">
                    <h2 class="text-2xl font-bold mb-2 text-gray-800">Авторизация</h2>
                    <p class="text-red-500 text-sm md:text-base">Вы не авторизованы. Чтобы оставить отзыв, войдите или зарегистрируйтесь.</p>
                    
                    <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
                        <a href="{{ route('login') }}" 
                           class="group relative inline-flex items-center justify-center h-11 px-6 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5">
                            <span class="relative z-10">Войти</span>
                            <span class="absolute inset-0 bg-red-500 bg-opacity-20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                        </a>
                        
                        <a href="{{ route('register') }}" 
                           class="group relative inline-flex items-center justify-center h-11 px-6 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5">
                            <span class="relative z-10">Регистрация</span>
                            <span class="absolute inset-0 bg-red-500 bg-opacity-20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endguest

            <!-- === Если пользователь авторизован === -->
            @auth
                <form action="{{ route('submit.review') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Заголовок -->
                    <div class="flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-800">Оставить отзыв</h2>
                    </div>

                    <!-- Информационный блок -->
                    <div class="bg-gradient-to-r from-red-50 to-pink-50 p-6 rounded-xl border border-red-100 shadow-inner">
                        <p class="text-sm text-gray-600 mb-6">Заполните форму, чтобы оставить свой отзыв о нашей работе</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Левая часть -->
                            <div class="space-y-5">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" readonly 
                                           class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 bg-white/50 backdrop-blur-sm text-gray-800">
                                    <input type="hidden" name="name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                                </div>
                                
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" value="{{ Auth::user()->email }}" readonly 
                                           class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 bg-white/50 backdrop-blur-sm text-gray-800">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>

                            <!-- Правая часть -->
                            <div class="space-y-6">
                                <div>
                                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Оценка работы (от 1 до 5)</label>
                                    <input type="number" name="rating" id="rating" step="0.1" min="1" max="5"
                                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 bg-white/50 backdrop-blur-sm text-gray-800 py-2 px-3"
                                           placeholder="Например, 4.7" required>
                                </div>

                                <div>
                                    <label for="review" class="block text-sm font-medium text-gray-700 mb-1">Ваш комментарий</label>
                                    <textarea name="review" id="review" rows="4"
                                              class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 bg-white/50 backdrop-blur-sm text-gray-800 py-2 px-3"
                                              required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Кнопка отправки -->
                    <div class="flex justify-center pt-4">
                        <button type="submit"
                                class="group relative inline-flex items-center justify-center h-11 px-8 rounded-xl bg-white text-black border border-black font-medium overflow-hidden transition-all duration-300 hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/20 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                            <span class="relative z-10">Оставить отзыв</span>
                            <span class="absolute inset-0 bg-red-500 bg-opacity-20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
</div>


<script>
    function openLeaveReviewModal() {
        const modal = document.getElementById('leave-review-modal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.querySelector('.modal-content').style.opacity = '1';
            modal.querySelector('.modal-content').style.transform = 'scale(1)';
        }, 50);
    }

    function closeLeaveReviewModal() {
        const modal = document.getElementById('leave-review-modal');
        const content = modal.querySelector('.modal-content');
        content.style.opacity = '0';
        content.style.transform = 'scale(0.95)';
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Закрытие при клике вне окна
    document.getElementById('leave-review-modal').addEventListener('click', function(e) {
        // Проверяем, клик был именно по фону, а не по самому окну
        if (e.target.id === 'leave-review-modal') {
            closeLeaveReviewModal();
        }
    });


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