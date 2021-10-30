<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScriptTypeQuestionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ScriptTypeQuestionResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'script_type_id' => 'script_type_id',
            'question' => 'question',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'script_type_id' => 'script_type_id',
            'question' => 'question',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}