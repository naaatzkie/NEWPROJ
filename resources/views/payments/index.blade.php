<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Payments') }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-xl font-semibold mb-4">Payments</h2>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-4xl mx-auto p-4">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-center">Booking</th>
                        <th class="px-4 py-2 text-center">Amount</th>
                        <th class="px-4 py-2 text-center">Method</th>
                        <th class="px-4 py-2 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($payments as $payment)
                    <tr>
                        <td class="px-4 py-2 text-center">{{ $payment->booking->customer_name ?? '-' }} ({{ $payment->booking->service->name ?? '-' }})</td>
                        <td class="px-4 py-2 text-center">{{ number_format($payment->amount,2) }}</td>
                        <td class="px-4 py-2 text-center">{{ $payment->method }}</td>
                        <td class="px-4 py-2 text-center">{{ $payment->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
