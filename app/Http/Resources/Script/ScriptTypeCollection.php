<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScriptTypeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ScriptTypeResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'icon' => 'icon',
            'description' => 'description',
            'usage' => 'usage',
            'activate' => 'activate',
            'language' => 'language',
            'tone' => 'tone',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'icon' => 'icon',
            'description' => 'description',
            'usage' => 'usage',
            'activate' => 'activate',
            'language' => 'language',
            'tone' => 'tone',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
