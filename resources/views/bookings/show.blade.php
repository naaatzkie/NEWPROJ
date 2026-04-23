<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Booking Details') }}</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-lg font-semibold mb-4">Booking Details</h2>

        <div class="bg-white p-6 rounded shadow">
            <p><strong>Customer:</strong> {{ $booking->customer_name }}</p>
            <p><strong>Contact:</strong> {{ $booking->customer_email }} / {{ $booking->customer_phone }}</p>
            <p><strong>Service:</strong> {{ $booking->service->name ?? '-' }}</p>
            <p><strong>Scheduled:</strong> {{ $booking->scheduled_at->format('Y-m-d H:i') }}</p>
            <p><strong>Price:</strong> {{ number_format($booking->price,2) }}</p>
            <p><strong>Status:</strong> {{ $booking->status }}</p>

            <div class="mt-4">
                <a href="{{ route('payments.create', $booking) }}" class="px-3 py-2 bg-gray-800 text-white rounded">Record Payment</a>
                <a href="{{ route('bookings.index') }}" class="ml-2 text-gray-600">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
