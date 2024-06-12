<?php

namespace App\Utilities;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class FileUploadHelper
{
    private const DS = "/";

    /**
     * Store a file in disk
     *
     * @param UploadedFile $file
     * @param path $dir
     * @param oldPath $file_path
     * @return string stored location
     */
    public static function store($file, $dir, $oldPath = null): string|array
    {
        if ($oldPath != null && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        if (is_array($file)) {
            $savedLocation = [];
            foreach ($file as $key => $value) {
                $picName = $value->getClientOriginalName();
                $savedLocation[$key] = $value->storeAs($dir, $picName, 'public');
            }
        } else {
            $picName = $file->getClientOriginalName();
            $savedLocation = $file->storeAs($dir, $picName, 'public');
        }
        return $savedLocation;
    }
}
