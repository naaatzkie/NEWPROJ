<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Record Payment') }}</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-lg font-semibold mb-4">Record Payment for Booking</h2>

        <div class="bg-white p-6 rounded shadow mb-4">
            <p><strong>Customer:</strong> {{ $booking->customer_name }}</p>
            <p><strong>Service:</strong> {{ $booking->service->name ?? '-' }}</p>
            <p><strong>Scheduled:</strong> {{ $booking->scheduled_at->format('Y-m-d H:i') }}</p>
            <p><strong>Price:</strong> {{ number_format($booking->price,2) }}</p>
        </div>

        <form action="{{ route('payments.store', $booking) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Amount</label>
                <input name="amount" class="w-full border px-3 py-2" value="{{ old('amount', $booking->price) }}">
                @error('amount') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Method</label>
                <input name="method" class="w-full border px-3 py-2" value="{{ old('method') }}">
                @error('method') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Status</label>
                <select name="status" class="w-full border px-3 py-2">
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
                @error('status') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Transaction Reference</label>
                <input name="transaction_reference" class="w-full border px-3 py-2" value="{{ old('transaction_reference') }}">
                @error('transaction_reference') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <button class="px-4 py-2 bg-gray-800 text-white rounded">Save Payment</button>
                <a href="{{ route('payments.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <h2 class="text-lg font-semibold mb-4">Record Payment</h2>

    <form action="{{ route('payments.store', $booking) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Booking</label>
            <div class="p-2 border">{{ $booking->customer_name }} — {{ $booking->service->name ?? '-' }} ({{ number_format($booking->price,2) }})</div>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Amount</label>
            <input name="amount" class="w-full border px-3 py-2" value="{{ old('amount', $booking->price) }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Method</label>
            <input name="method" class="w-full border px-3 py-2" value="{{ old('method') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2">
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Transaction Reference</label>
            <input name="transaction_reference" class="w-full border px-3 py-2" value="{{ old('transaction_reference') }}">
        </div>
        <div>
            <button class="px-4 py-2 bg-gray-800 text-white rounded">Save</button>
            <a href="{{ route('bookings.show', $booking) }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
