<?php

namespace App\Traits\Image;

use Illuminate\Support\Facades\File;
use Image;

class ImageHelper
{
    public static function uploadAnything($file, $pathDirectory)
    {
        $image = $file;
        $filename = rand (100000,9000000). '.' . $image->getClientOriginalExtension();

        $directory = $pathDirectory.'/';
        $path = $directory . $filename;

        if (!File::exists($directory)) {
            File::makeDirectory($directory, $mode = 0777, true, true);
        }


        Image::make($image)->save($path);

        return $path;
    }
}
