<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteScriptResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'response' => ScriptResponseResource::collection($this->scriptResponses),
        ];
    }
}
