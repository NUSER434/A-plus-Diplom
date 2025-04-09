<div class="grid grid-cols-1 md:grid-cols-4 gap-[20px]">
    @foreach ($popularServices as $service)
        <a href="{{ route('all-services.show', $service->slug) }}" class="block w-[278px] h-[300px] rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1 relative">
            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 w-full p-4">
                <p class="text-white font-bold text" style="-webkit-text-stroke: 0.5px black;">{{ $service->name }}</p>
            </div>
        </a>
    @endforeach
</div>