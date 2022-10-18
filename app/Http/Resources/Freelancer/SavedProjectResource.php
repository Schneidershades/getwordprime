<?php

namespace App\Http\Resources\Freelancer;

use Illuminate\Http\Resources\Json\JsonResource;

class SavedProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'freelancer_ad_id' => new FreelancerAdResource($this->freelanceAd),
        ];
    }
}
