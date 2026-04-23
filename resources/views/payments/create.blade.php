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
