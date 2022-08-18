<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserFavoriteScriptResponseCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => UserFavoriteScriptResponseResource::collection($this->collection),
        ];
    }
}
