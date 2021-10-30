<?php

namespace App\Http\Resources\Agency;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AgencyCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => AgencyResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'user_id' => 'user_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'user_id' => 'user_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
