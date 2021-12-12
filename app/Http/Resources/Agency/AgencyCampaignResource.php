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
            'title' => $this->title,
            'campaign_count' => $this->campaigns->count(),
            'campaign' => CampaignResource::collection($this->campaigns),
            'description' => $this->description,
            'link' => $this->link,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
