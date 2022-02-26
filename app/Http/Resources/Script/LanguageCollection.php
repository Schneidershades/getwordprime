<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LanguageCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => LanguageResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
