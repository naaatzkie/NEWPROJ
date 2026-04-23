<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('New Booking') }}</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-lg font-semibold mb-4">New Booking</h2>

        <form action="{{ route('bookings.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Customer Name</label>
                <input name="customer_name" class="w-full border px-3 py-2" value="{{ old('customer_name') }}">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input name="customer_email" class="w-full border px-3 py-2" value="{{ old('customer_email') }}">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Phone</label>
                <input name="customer_phone" class="w-full border px-3 py-2" value="{{ old('customer_phone') }}">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Service</label>
                <select name="service_id" class="w-full border px-3 py-2">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }} - {{ number_format($service->price,2) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Date & Time</label>
                <input type="datetime-local" name="scheduled_at" class="w-full border px-3 py-2" value="{{ old('scheduled_at') }}">
            </div>
            <div>
                <button class="px-4 py-2 bg-gray-800 text-white rounded">Book</button>
                <a href="{{ route('bookings.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
