<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptFavoriteFlagResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'responses' => ScriptResponseResource::collection($this->scriptResponses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
