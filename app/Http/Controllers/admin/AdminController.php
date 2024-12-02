<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Major;
use App\Models\Doctor;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        $majors = Major::count();
        $doctors = Doctor::count();
        $bookings = Booking::count();
        $users = User::count();

        return view ('admin.home', compact('majors', 'doctors', 'bookings', 'users'));
    }
}
