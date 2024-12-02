<?php

namespace App\Http\Controllers\admin;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Traits\UploadFile;
use App\Models\Major;

class DoctorController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('major')
        ->orderBy('id', 'desc')
        ->paginate('10');
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::get();
        return view('admin.doctors.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {

        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->image, Doctor::IMAGE_PATH);
        }

        Doctor::create([
            'name' => $request->name,
            'major_id' => $request->major_id,
            'image' => $imageName?? null
        ]);

        return redirect()->route('admin.doctor.index')->with('success', 'Doctor added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $majors = Major::get();
        return view('admin.doctors.edit', compact('doctor','majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {

        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->image, Doctor::IMAGE_PATH, $doctor->image);
        }

        $doctor->update([
            'name' => $request->name,
            'major_id' => $request->major_id,
            'image' => $imageName?? $doctor->image
        ]);

        return redirect()->route('admin.doctor.index')->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor) {

        // Delete old image
       $this->deleteImage($doctor->image, Doctor::IMAGE_PATH);
        // Delete doctor
        $doctor->delete();
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor deleted successfully');
    }
}
