<?php

namespace App\Http\Resources\Agency;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AgencyCampaignCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => AgencyCampaignResource::collection($this->collection),
        ];
    }
}
