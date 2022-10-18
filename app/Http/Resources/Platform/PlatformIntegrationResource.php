<?php

namespace App\Http\Resources\Platform;

use Illuminate\Http\Resources\Json\JsonResource;

class PlatformIntegrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'platform_integration_id' => $this->platform_integration_id,
            'user_id' => $this->user_id,
            'platform_keys' => $this->platform_keys,
            'activate' => $this->activate ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
