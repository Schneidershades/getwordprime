<?php

namespace App\Http\Resources\Agency;

use App\Http\Resources\Script\ScriptResponseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AgencyCampaignResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'agency_id' => $this->agency_id,
            'name' => $this->agency->name,
            'campaign_name' => $this->campaign->name,
            'campaign_id' => $this->campaign_id,
            // 'scripts_count' => $this->scriptResponses->count(),
            'scripts' => ScriptResponseResource::collection($this->scriptResponses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
