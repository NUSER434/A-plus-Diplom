<div class="w-full flex justify-center mt-10">
    <div class="card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[20px] w-full max-w-[1200px]">
        @foreach ($specialServices as $service)
            <div class="flex justify-center">
                <!-- Добавили group -->
                <a href="{{ route('all-services.show', $service->slug) }}" 
                   class="card block w-full h-[300px] rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 relative opacity-0 animate-fade-up group"
                   style="animation-delay: {{ $loop->index * 100 }}ms;">
                    
                    <!-- Изображение с анимацией приближения -->
                    <img src="{{ asset($service->image) }}" 
                         alt="{{ $service->name }}" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">

                    <!-- Название услуги -->
                    <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-bold text-sm md:text-base" style="-webkit-text-stroke: 0.5px black;">
                            {{ $service->name }}
                        </p>
                    </div>

                    <!-- Бейдж "Скидка" -->
                    <div class="absolute top-0 right-0 bg-rose-500 text-white px-4 py-2 rounded-bl-lg text-sm font-medium z-10">
                        Скидка 20%
                    </div>

                    <!-- Описание при наведении -->
                    <div class="absolute bottom-0 left-0 w-full h-full bg-black bg-opacity-90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                        <p class="text-white text-center px-4">Описание скидки или акции</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>