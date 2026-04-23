<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = Booking::with('service')->orderBy('scheduled_at', 'desc')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $services = Service::orderBy('name')->get();
        return view('bookings.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'scheduled_at' => 'required|date',
        ]);

        $service = Service::findOrFail($data['service_id']);

        $data['price'] = $service->price;
        $booking = Booking::create($data);

        return redirect()->route('bookings.index')->with('success', 'Booking created.');
    }

    public function show(Booking $booking)
    {
        $booking->load('service','payment');
        return view('bookings.show', compact('booking'));
    }
}
