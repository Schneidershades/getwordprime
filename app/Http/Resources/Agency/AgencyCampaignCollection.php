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

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'agency_id' => 'agency_id',
            'campaign_id' => 'campaign_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'agency_id' => 'agency_id',
            'campaign_id' => 'campaign_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
