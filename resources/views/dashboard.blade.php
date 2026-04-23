<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium">Services</h3>
                    <p class="text-3xl font-bold mt-4">{{ \App\Models\Service::count() }}</p>
                    <a href="{{ route('services.index') }}" class="inline-block mt-4 text-sm text-gray-600">Manage Services</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium">Bookings</h3>
                    <p class="text-3xl font-bold mt-4">{{ \App\Models\Booking::count() }}</p>
                    <a href="{{ route('bookings.index') }}" class="inline-block mt-4 text-sm text-gray-600">Manage Bookings</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium">Payments</h3>
                    <p class="text-3xl font-bold mt-4">{{ \App\Models\Payment::count() }}</p>
                    <a href="{{ route('payments.index') }}" class="inline-block mt-4 text-sm text-gray-600">View Payments</a>
                </div>
            </div>

            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-700">Welcome — use the links above to manage services, bookings, and payments. </p>
            </div>
        </div>
    </div>
</x-app-layout>
