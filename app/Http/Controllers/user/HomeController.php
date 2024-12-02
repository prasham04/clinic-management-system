<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $majors = Major::orderBy('id', 'desc')
        ->limit(8)
        ->get();

        $doctors = Doctor::with('major')
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();

        return view('front.pages.home', compact('majors', 'doctors'));
    }
}
