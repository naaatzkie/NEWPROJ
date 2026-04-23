<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Show all bookings with their payment status on the payments page
        $bookings = Booking::with('service', 'payment')->orderBy('scheduled_at', 'desc')->get();
        return view('payments.index', compact('bookings'));
    }

    public function create(Booking $booking)
    {
        $booking->load('payment');
        return view('payments.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'method' => 'nullable|string|max:255',
            'status' => 'required|string|in:paid,unpaid',
            'transaction_reference' => 'nullable|string|max:255',
        ]);

        $data['booking_id'] = $booking->id;

        Payment::updateOrCreate(
            ['booking_id' => $booking->id],
            $data
        );

        $booking->update(['status' => $data['status'] === 'paid' ? 'confirmed' : $booking->status]);

        return redirect()->route('payments.index')->with('success', 'Payment recorded.');
    }
}
