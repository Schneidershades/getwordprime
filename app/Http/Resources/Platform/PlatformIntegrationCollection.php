<?php

namespace App\Http\Resources\Platform;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PlatformIntegrationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'platform_integration_id' => 'platform_integration_id',
            'user_id' => 'user_id',
            'platform_keys' => 'platform_keys',
            'activate' => 'activate',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'platform_integration_id' => 'platform_integration_id',
            'user_id' => 'user_id',
            'platform_keys' => 'platform_keys',
            'activate' => 'activate',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}