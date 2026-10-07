<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6 items-stretch">
    @foreach ($category->menus->filter(fn($menu) => $menu->is_active)->sortBy('order')->sortByDesc('is_featured') as $menu)
        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg flex flex-col">
            @if (config('menu.show_images'))
                <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
            @endif
            <div class="px-6 py-4 bg-white flex-grow">
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                    {{ $menu->name }}
                </h4>
                <p class="leading-normal text-gray-700">
                    {{ $menu->description }}
                </p>
            </div>
            <div class="flex items-center justify-between p-4 bg-white">
                <span class="text-xl text-green-600">{{ $menu->price }} MKD</span>
            </div>
        </div>
    @endforeach
</div>

    </div>
</x-guest-layout>
