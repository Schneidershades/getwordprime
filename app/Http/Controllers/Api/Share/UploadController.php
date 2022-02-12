<?php

namespace App\Http\Controllers\Api\Share;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
Use Image;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240',
            'path' => ['required', Rule::in(["script_type"])],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse("Validation error", 422);
        }

        $file = $request->file('image');
             
        $ogImage = Image::make($file);
        $originalPath = 'public/';
        $ogImage =  $ogImage->save($originalPath.time().$file->getClientOriginalName());


        // $path = $this->uploadImage($request->file, $request->path);

        $media = Media::create([
            'file_path' => $ogImage,
            'fileable_id' => 0,
            'fileable_type' => "NULL",
        ]);

        return response()->json(['data' => $media], 200);
    }
}
