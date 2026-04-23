<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Service') }}</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-lg font-semibold mb-4">Edit Service</h2>

        <form action="{{ route('services.update', $service) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-1">Name</label>
                <input name="name" class="w-full border px-3 py-2" value="{{ old('name', $service->name) }}">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Price</label>
                <input name="price" class="w-full border px-3 py-2" value="{{ old('price', $service->price) }}">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Duration (minutes)</label>
                <input name="duration" class="w-full border px-3 py-2" value="{{ old('duration', $service->duration) }}">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Description</label>
                <textarea name="description" class="w-full border px-3 py-2">{{ old('description', $service->description) }}</textarea>
            </div>
            <div>
                <button class="px-4 py-2 bg-gray-800 text-white rounded">Update</button>
                <a href="{{ route('services.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
