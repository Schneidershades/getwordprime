<?php

namespace App\Http\Resources\Agency;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AgencyCampaignCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => AgencyCampaignResource::collection($this->collection),
        ];
    }
}
