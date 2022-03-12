<?php

namespace App\Http\Resources\Freelancer;

use App\Models\FreelancerAd;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Freelancer\FreelancerAdResource;

class SavedProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "freelancer_ad_id" => new FreelancerAdResource($this->freelanceAd) ,
        ];
    }
}
