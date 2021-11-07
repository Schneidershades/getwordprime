<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScriptTypeUserPromptAnswerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ScriptTypeUserPromptAnswerResource::collection($this->collection),
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
