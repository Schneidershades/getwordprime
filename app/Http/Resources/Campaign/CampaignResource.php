<?php

namespace App\Http\Resources\Campaign;

use App\Http\Resources\Script\ScriptResponseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'scripts_count' => $this->scriptResponses->count(),
            'scripts' => ScriptResponseResource::collection($this->scriptResponses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
