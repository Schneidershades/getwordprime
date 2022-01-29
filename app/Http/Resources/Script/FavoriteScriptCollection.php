<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FavoriteScriptCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => FavoriteScriptResource::collection($this->collection),
        ];
    }
}
