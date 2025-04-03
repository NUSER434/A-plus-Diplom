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

    <!-- Навигация -->
    <section class="mt-12">
        <div class="max-w-[1200px] mx-auto flex items-center space-x-4">
            <a href="{{ route('home') }}" class="text-black hover:text-red-500 transition duration-300">Главная</a>
            <span class="text-gray-400">|</span>
            <a href="{{ route('portfolio.index') }}" class="text-black hover:text-red-500 transition duration-300">Портфолио</a>
            <span class="text-gray-400">|</span>
            <span class="text-black hover:text-red-500 transition duration-300">{{ ucfirst($category) }}</span>
        </div>
    </section>

    <section class="mt-12">
        <div class="max-w-[1200px] mx-auto flex items-center space-x-4">
            <h2 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300 ">{{ ucfirst($category) }}</h2>
        </div>
    </section>

    <!-- Основной контент -->
    <main class="mt-16">

        <!-- Контейнеры с изображениями -->
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($images as $image)
                <div class="group cursor-pointer" onclick="openModal('{{ $image->image }}')">
                    <img src="{{ $image->image }}" alt="{{ $image->category }}" class="w-[270px] h-[200px] object-cover rounded-lg">
                </div>
            @endforeach
        </div>

        <!-- Модальное окно -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center">
            <div class="relative ml-[35%] mt-[5%]">
                <button id="close-modal" class="absolute top-4 right-4 text-white text-xl font-bold">&times;</button>
                <div class="flex space-x-4">
                    <button id="prev-image" class="text-white text-2xl font-bold"><</button>
                    <img id="modal-image" src="" alt="Preview" class="max-w-[90vw] max-h-[80vh] object-contain">
                    <button id="next-image" class="text-white text-2xl font-bold">></button>
                </div>
            </div>
        </div>
    </main>

    @include('partials.basic.footer')
    @include('partials.buttons')

    <script>
        let currentIndex = 0;
        const images = {!! json_encode($images->pluck('image')->toArray()) !!};

        function openModal(src) {
            currentIndex = images.indexOf(src);
            document.getElementById('modal-image').src = src;
            document.getElementById('modal').classList.remove('hidden');
        }

        document.getElementById('close-modal').addEventListener('click', () => {
            document.getElementById('modal').classList.add('hidden');
        });

        document.getElementById('prev-image').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById('modal-image').src = images[currentIndex];
        });

        document.getElementById('next-image').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById('modal-image').src = images[currentIndex];
        });
    </script>
</body>
</html>