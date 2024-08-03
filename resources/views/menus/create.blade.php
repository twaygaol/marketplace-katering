<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Menu Katering') }}
        </h2>
    </x-slot>
    <div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h1 class="text-2xl font-bold">Add Menu</h1>
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" step="0.01" class="mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" id="photo" name="photo" class="mt-1 block w-full">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Menu</button>
            </form>
        </div>
    </div>
</x-app-layout>
