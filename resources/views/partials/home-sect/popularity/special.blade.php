<div class="grid grid-cols-1 md:grid-cols-4 gap-[20px]">
    @foreach ($specialServices as $service)
    <a href="{{ route('all-services.show', $service->slug) }}" class="block w-[278px] h-[300px] rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1 relative group">
            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 w-full p-4">
                <p class="text-white font-bold text" style="-webkit-text-stroke: 0.5px black;">{{ $service->name }}</p>
            </div>
            <div class="absolute top-0 right-0 bg-rose-500 text-white px-4 py-2 rounded-bl-[10px]">
                Скидка 20%
            </div>
            <div class="absolute bottom-0 left-0 w-full h-full bg-black bg-opacity-90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                <p class="text-white text-center">Описание скидки или акции</p>
            </div>
        </a>
    @endforeach
</div>