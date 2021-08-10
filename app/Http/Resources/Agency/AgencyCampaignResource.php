<?php

namespace App\Http\Resources\Agency;

use Illuminate\Http\Resources\Json\JsonResource;

class AgencyCampaignResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
        ];
    }
}
