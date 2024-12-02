<?php

namespace App\Http\Controllers\Api;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Traits\ApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    use ApiTrait, UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::get();

        return $this->apiResponse(200, 'All Majors', 'null', $majors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'unique:majors,title'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(400, 'Validation error', $validator->errors(), 'null');
        }

        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), Major::IMAGE_PATH);
        }

        $major = Major::create([
            'title' => $request->title,
            'image' => $imageName ?? null
        ]);

        return $this->apiResponse(201, 'major created', 'null', $major);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $major = Major::find($id);

        if(! $major) {
            return $this->apiResponse(404, 'major not found', 'major not found', null);
        }

        return $this->apiResponse(200, 'major found', 'null', $major);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $major = Major::find($id);

        if(! $major) {
            return $this->apiResponse(404, 'major not found', 'major not found', null);
        }

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string','unique:majors,title,' . $id ],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(400, 'Validation error', $validator->errors(), 'null');
        }

        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->image, Major::IMAGE_PATH, $major->image);
        }      

        $major->update([
            'title' => $request->title,
            'image' => $imageName ?? $major->image
        ]);

        return $this->apiResponse(201, 'major updated', 'null', $major);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $major = Major::find($id);

        if (! $major) {
            return $this->apiResponse(404, 'not found','not found', $major);
        }

        $major->delete();

        return $this->apiResponse(200, 'Major deleted', 'null', 'null');
    }
}
