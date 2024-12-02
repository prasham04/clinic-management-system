<?php 

namespace App\Http\Traits;

trait UploadFile {

    private function uploadImage($image, $path, $old_file = Null) {
        if ($old_file) {
            $this->deleteImage($old_file, $path);
        }
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $imageName);
        return $imageName;
    }

    private function deleteImage($old_file, $path) {
        if (file_exists(public_path($path . $old_file))) {
            unlink(public_path($path . $old_file));
        }
    }


}