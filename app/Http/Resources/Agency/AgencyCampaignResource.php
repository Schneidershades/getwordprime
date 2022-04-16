<?php

namespace App\Http\Resources\Agency;

use App\Http\Resources\Campaign\CampaignResource;
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
            // 'campaign_count' => $this->campaign->count(),
            // 'campaign' => new CampaignResource($this->campaign),
            'link' => $this->link,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
