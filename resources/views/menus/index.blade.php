<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu List') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <a href="{{ route('menus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Menu</a>
        <ul class="space-y-4">
            @forelse ($menus as $menu)
                <li class="border p-4 rounded shadow-sm bg-white">
                    <h2 class="text-xl font-semibold mb-2">{{ $menu->name }}</h2>
                    <p class="mb-2">{{ $menu->description }}</p>
                    <p class="mb-2">Price: ${{ $menu->price }}</p>
                    @if ($menu->photo)
                        <img src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" class="w-32 h-32 object-cover mb-2">
                    @endif
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('menus.edit', $menu) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <p>No menus available.</p>
            @endforelse
        </ul>
    </div>
</x-app-layout>
