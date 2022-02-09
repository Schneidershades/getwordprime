<?php

namespace App\Http\Controllers\Api\Share;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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


        $path = $this->uploadImage($request->file, $request->path);

        dd($path);


        dd('ss');

        // $media = Media::create([
        //     'file_path' => $path,
        //     'fileable_id' => 0,
        //     'fileable_type' => "NULL",
        // ]);

        // return response()->json(['data' => $media], 200);
    }
}
