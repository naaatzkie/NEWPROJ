<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Services') }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Services</h2>
            <a href="{{ route('services.create') }}" class="px-3 py-2 bg-gray-800 text-white rounded">Add Service</a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-4xl mx-auto p-4">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-center">Name</th>
                        <th class="px-4 py-2 text-center">Price</th>
                        <th class="px-4 py-2 text-center">Duration</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($services as $service)
                    <tr>
                        <td class="px-4 py-2 text-center">{{ $service->name }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($service->price,2) }}</td>
                        <td class="px-4 py-2 text-center">{{ $service->duration }} mins</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('services.edit', $service) }}" class="text-blue-600 mr-2">Edit</a>
                            <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
