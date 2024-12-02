<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index() {

        $majors = Major::orderBy('id', 'desc')
        ->paginate(12);

        return view('front.majors.index', compact('majors'));
    }

    public function show(Major $major) {

        $doctors = Doctor::with('major')
        ->where('major_id', '=', $major->id)
        ->orderBy('id', 'desc')
        ->paginate(12);

        return view('front.majors.show', compact('doctors', 'major'));
    }

}
