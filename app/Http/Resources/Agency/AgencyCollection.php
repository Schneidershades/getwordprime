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
}
