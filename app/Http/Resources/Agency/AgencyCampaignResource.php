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
            'agency_name' => $this->agency->name,
            'campaign_name' => $this->campaign->name,
            'campaign_id' => $this->campaign_id,
            'scripts' => ScriptResponseResource::collection($this->campaign->scriptResponses),
        ];
    }
}
