<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Bookings') }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Bookings</h2>
            <a href="{{ route('bookings.create') }}" class="px-3 py-2 bg-gray-800 text-white rounded">New Booking</a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-4xl mx-auto p-4">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-center">Customer</th>
                        <th class="px-4 py-2 text-center">Service</th>
                        <th class="px-4 py-2 text-center">Schedule</th>
                        <th class="px-4 py-2 text-center">Price</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                    <tr>
                        <td class="px-4 py-2 text-center">{{ $booking->customer_name }}</td>
                        <td class="px-4 py-2 text-center">{{ $booking->service->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-center">{{ $booking->scheduled_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($booking->price,2) }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('bookings.show', $booking) }}" class="text-blue-600 mr-2">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
