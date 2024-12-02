<?php

namespace App\Http\Controllers\admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('doctor')
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function destroy(Booking $booking) {

        $booking->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully');
    }
}
