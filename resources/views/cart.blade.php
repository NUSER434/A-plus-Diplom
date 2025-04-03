<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Типография А-Плюс - Первый шаг</title>
    <link rel="icon" type="" href="images/logo.png">
    <link rel="shortcut icon" type="" href="images/logo.png">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
@include('partials.basic.header')

    <!-- Навигация -->
    <section class="mt-12">
        <div class="max-w-[1200px] mx-auto flex items-center space-x-4">
            <a href="{{ route('home') }}" class="text-black hover:text-red-500 transition duration-300">Главная</a>
            <span class="text-gray-400">|</span>
            <span class="text-black hover:text-red-500 transition duration-300">Коризина</span>
        </div>
    </section>

<main class="mt-16">
    <!-- Титл -->
    <div class="container mx-auto max-w-[1200px] mt-8">
        <h1 class="text-4xl font-bold text-gray-900">Корзина ({{ $cartItems->count() }})</h1>
    </div>

    <!-- Область с товарами -->
    <div class="container mx-auto max-w-[1200px] mt-8">
        @if ($cartItems->isEmpty())
            <p class="text-gray-700">Ваша корзина пуста.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($cartItems as $item)
                <div class="border border-gray-300 rounded-lg p-4">
                    <h3 class="text-xl font-bold">{{ $item->service_name }}</h3>
                    <p class="text-gray-700"><strong>Параметры:</strong></p>
                    <ul class="list-disc ml-6">
                        @foreach ($item->options as $key => $value)
                        <li>{{ $key }}: {{ is_array($value) ? implode(', ', $value) : $value }}</li>
                        @endforeach
                    </ul>
                    <p class="text-gray-700"><strong>Количество:</strong> {{ $item->quantity }}</p>
                    <p class="text-gray-700"><strong>Цена:</strong> {{ $item->price }} ₽</p>
                </div>
                @endforeach
            </div>

            <!-- Кнопка "Оформить" -->
            <div class="container mx-auto max-w-[1200px] mt-8">
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition-all">
                        Оформить заказ
                    </button>
                </form>
            </div>
        @endif
    </div>
</main>

@include('partials.basic.footer')
@include('partials.buttons')
</body>
</html>