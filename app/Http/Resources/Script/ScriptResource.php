<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Script\ScriptResponseResource;

class ScriptResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'scriptResponses' => ScriptResponseResource::collection($this->scriptResponses),
            'favorite' => $this->favorite ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
