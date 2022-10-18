<?php

namespace App\Traits\Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait AwsS3
{
    public function storeImage($connection, $image)
    {
        $extension = $image->getClientOriginalExtension();
        $name = Str::slug(now()->toDayDateTimeString())
            .random_int(20, 3000000)
            .'.'
            .$extension;

        Storage::disk($connection)->put($path = "public/images/ride_request/$name", fopen($image, 'r+'));

        return config('services.s3.url').$path;
    }

    protected function uploadImage($image, $path, $connection = 's3')
    {
        $path = $image->store($path, $connection);
        dd($path);

        return $path;
    }

    protected function delete($image, $path, $connection)
    {
        $file_path = parse_url($path);
        Storage::disk('s3')->delete($file_path);
    }
}
