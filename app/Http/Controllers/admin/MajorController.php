<?php

namespace App\Http\Controllers\admin;

use App\Models\Major;
use App\Http\Traits\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;

class MajorController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::orderBy('id', 'desc')
        ->paginate();
        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMajorRequest $request)
    {
        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), Major::IMAGE_PATH);
        }

        Major::create([
            'title' => $request->title,
            'image' => $imageName ?? null
        ]);

        return redirect()
        ->route('admin.major.index')
        ->with('success','Major saved successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {       

            if($request->hasFile('image')) {
                $imageName = $this->uploadImage($request->image, Major::IMAGE_PATH, $major->image);
            }            

            $major->update(
                [
                    'title' => $request->title,
                    'image' => $imageName?? $major->image
                ]
            );

            return redirect()
            ->route('admin.major.index')
            ->with('success','Major is updated successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $this->deleteImage($major->image, Major::IMAGE_PATH);
        $major->delete();

        return redirect()
        ->back()
        ->with('success','Major is deleted successfully');
    }
}
