<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScriptUserAnswerCollection extends ResourceCollection
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
            'data' => ScriptUserAnswerResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'script_type_question_id' => 'script_type_question_id',
            'user_id' => 'user_id',
            'answers' => 'answers',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'script_type_question_id' => 'script_type_question_id',
            'user_id' => 'user_id',
            'answers' => 'answers',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}