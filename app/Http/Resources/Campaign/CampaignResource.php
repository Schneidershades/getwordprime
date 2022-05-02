<?php

namespace App\Http\Resources\Campaign;

use App\Http\Resources\Script\ScriptResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Script\ScriptResponseResource;

class CampaignResource extends JsonResource
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
            'name' => $this->name,
            'scripts_count' => $this->scriptsResponses->count(),
            'scripts' => ScriptResponseResource::collection($this->scriptResponses),
            // 'scripts' => ScriptResource::collection($this->scripts),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
