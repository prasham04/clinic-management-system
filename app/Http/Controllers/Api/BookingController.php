<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::get();

        return $this->apiResponse(200, 'All bookings', 'null', $bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);

        if(!$booking) {
            return $this->apiResponse(404, 'Booking not found', 'Booking not found', $booking);
        }

        $booking->delete();

        return $this->apiResponse(200, 'Booking deleted', 'null', $booking);
    }
}
