@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Edit Profil Merchant</h1>
    <form action="{{ route('merchant.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $merchant->company_name) }}" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea id="address" name="address" class="mt-1 block w-full" required>{{ old('address', $merchant->address) }}</textarea>
        </div>
        <div class="mb-4">
            <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $merchant->contact) }}" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="mt-1 block w-full">{{ old('description', $merchant->description) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
