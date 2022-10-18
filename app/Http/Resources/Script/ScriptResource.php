<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'scriptResponses' => ScriptResponseResource::collection($this->scriptResponses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
