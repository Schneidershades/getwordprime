<?php

namespace App\Http\Resources\Script;

use App\Models\ScriptResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ScriptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'response' => ScriptResponse::collection($this->scriptResponses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
