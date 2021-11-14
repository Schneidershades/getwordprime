<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserScriptTypePresetCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => UserScriptTypePresetResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'answer' => 'answer',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'answer' => 'answer',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
