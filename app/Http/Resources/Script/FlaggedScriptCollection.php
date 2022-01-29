<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FlaggedScriptCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => FlaggedScriptResource::collection($this->collection),
        ];
    }
}
