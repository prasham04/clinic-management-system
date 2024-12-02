<?php

namespace App\Http\Controllers\user;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;

class DoctorController extends Controller
{
    public function index() {
        $doctors = Doctor::with('major')
        ->orderBy('id', 'desc')
        ->paginate(12);
        return view('front.doctors.index', compact('doctors'));
    }

    public function bookingPage(Doctor $doctor) {
        return view('front.doctors.booking', compact('doctor'));
    }

    public function booking(StoreBookingRequest $request, Doctor $doctor) {

        //dd($doctor);

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'doctor_id' => $doctor->id        
        ]);

        return redirect()->back()->with('success', 'Your appointment has been booked successfully');
        
    }
}
