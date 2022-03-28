<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScriptResponseCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ScriptResponseResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'text' => 'text',
            'script_content' => 'script_content',
            'script_type_name' => 'script_type_name',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'text' => 'text',
            'script_content' => 'script_content',
            'script_type_name' => 'script_type_name',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
