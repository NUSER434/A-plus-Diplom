<div class="w-full flex justify-center">
    <div class="card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[20px] w-full max-w-[1200px]">
        @foreach ($popularServices as $service)
            <div class="flex justify-center">
                <a href="{{ route('all-services.show', $service->slug) }}" 
                   class="card block w-full h-[300px] rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 relative opacity-0 animate-fade-up"
                   style="animation-delay: {{ $loop->index * 100 }}ms;">
                    <!-- Изображение с анимацией приближения -->
                    <img src="{{ asset($service->image) }}" 
                         alt="{{ $service->name }}" 
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                    <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-bold text-sm md:text-base" style="-webkit-text-stroke: 0.5px black;">
                            {{ $service->name }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>