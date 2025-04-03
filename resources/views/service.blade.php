<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Типография А-Плюс - Главаня страница</title>
    <link rel="icon" type="" href="images/logo.png">
    <link rel="shortcut icon" type="" href="images/logo.png">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
@include('partials.basic.header')

<main class="mt-[50px]">
    <!-- Навигация -->
    <div class="container mx-auto max-w-[1200px]">
        <div class="flex items-center space-x-2 text-gray-700">
            <a href="{{ route('home') }}" class="hover:text-black">Главная</a>
            <span>|</span>
            <a href="{{ route('all-services.index') }}" class="hover:text-black">Все услуги</a>
            <span>|</span>
            <span>{{ $service->name }}</span>
        </div>
    </div>

    <!-- Титл -->
    <div class="container mx-auto max-w-[1200px] mt-8">
        <h1 class="text-4xl font-bold text-gray-900">{{ $service->name }}</h1>
    </div>

    <!-- 1) Информация о услуге -->
    <section class="container mx-auto max-w-[1200px] mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Изображение -->
            <div>
                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}"
                    class="w-full h-auto rounded-lg shadow-md">
            </div>

            <!-- Описание услуги -->
            <div>
                <p class="text-gray-700 leading-relaxed">
                    {{ $service->description ?? 'Описание услуги отсутствует.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Кнопки фильтрации -->
    <div class="container mx-auto max-w-[1200px] mt-[100px]">
        <div class="flex flex-wrap gap-4 justify-center"> <!-- Добавлен justify-center -->
            <button id="calculator-button"
                class="w-[200px] h-[40px] border border-black bg-transparent text-black hover:bg-black hover:text-white transition-all rounded-[10px] filter-button active">
                Онлайн-Калькулятор
            </button>
            <button id="portfolio-button"
                class="w-max-auto h-[40px] border border-black bg-transparent text-black hover:bg-black hover:text-white transition-all rounded-[10px] filter-button pl-[20px] pr-[20px]">
                Примеры "{{ $service->name }}"
            </button>
        </div>
    </div>

    <!-- 3) Область вывода контента -->
    <div class="container mx-auto max-w-[1200px] mt-8" id="content-area">
        <!-- Модуль онлайн-калькулятора (скрыт по умолчанию) -->
        <div id="calculator-module" class="hidden">
        @include('partials.services.calculator', ['service' => $service])
        </div>

     <!-- Портфолио (скрыто по умолчанию) -->
    <div id="portfolio-module" class="hidden">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Примеры работ: "{{ $service->name }}"</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @if ($portfolios->isEmpty())
                <p class="text-gray-700">Примеры работ пока отсутствуют.</p>
            @else
                @foreach ($portfolios as $portfolio)
                <div class="rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}" class="w-[270px] h-[200px] object-cover">
                </div>
                @endforeach
            @endif
        </div>
    </div>
    </div>

    <!-- Секция "А также вы можете заказать:" -->
    <section class="container mx-auto max-w-[1200px] mt-[100px]">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">А также вы можете заказать:</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($randomServices as $randomService)
            <a href="{{ route('all-services.show', $randomService->slug) }}" class="block w-[278px] h-[300px] rounded-lg overflow-hidden shadow-md relative">
                <img src="{{ asset($randomService->image) }}" alt="{{ $randomService->name }}"
                    class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 w-full p-4 ">
                    <p class="text-white font-bold text" style="-webkit-text-stroke: 0.5px black;">{{ $randomService->name }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </section>


</main>

@include('partials.basic.footer')
@include('partials.buttons')
</body>
</html>


<script src="{{ asset('js/service.js') }}"></script>
<!-- JavaScript для переключения разделов -->
<script>
    // JavaScript для переключения между модулями
    document.getElementById('calculator-button').addEventListener('click', function () {
        document.getElementById('calculator-module').classList.remove('hidden');
        document.getElementById('portfolio-module').classList.add('hidden');
        this.classList.add('active');
        document.getElementById('portfolio-button').classList.remove('active');
    });

    document.getElementById('portfolio-button').addEventListener('click', function () {
        document.getElementById('portfolio-module').classList.remove('hidden');
        document.getElementById('calculator-module').classList.add('hidden');
        this.classList.add('active');
        document.getElementById('calculator-button').classList.remove('active');
    });
</script>