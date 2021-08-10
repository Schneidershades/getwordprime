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
}
