<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\UploadFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    use ApiTrait, UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::get();

        return $this->apiResponse(200, 'All doctors', 'null', $doctors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'major_id' => ['required', 'exists:majors,id']            
        ]);

        if($validator->fails()) {
            return $this->apiResponse(400, 'Validation error', $validator->errors(), 'null');
        }

        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), Doctor::IMAGE_PATH);
        }

        $doctor = Doctor::create([
            'name' => $request->name,
            'image' => $imageName ?? null,
            'major_id' => $request->major_id
        ]);

        return $this->apiResponse(200, 'Doctor Created', 'null', $doctor);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return $this->apiResponse(404, 'Not Found', 'not found', null);
        }

        return $this->apiResponse(200, 'doctor found', 'null', $doctor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return $this->apiResponse(404, 'Not Found', 'not found', null);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'major_id' => ['nullable', 'exists:majors,id']            
        ]);

        if($validator->fails()) {
            return $this->apiResponse(400, 'Validation error', $validator->errors(), 'null');
        }

        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), Doctor::IMAGE_PATH);
        }

        $doctor->update([
            'name' => $request->name,
            'image' => $imageName ?? $doctor->image,
            'major_id' => $request->major_id ?? $doctor->major_id
        ]);

        return $this->apiResponse(200, 'Doctor Updated', 'null', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return $this->apiResponse(404, 'Not Found', 'not found', null);
        }

        $doctor->delete();

        return $this->apiResponse(200, 'Doctor Deleted', 'null', $doctor);

    }
}
