<?php

namespace App\Http\Resources\Agency;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AgencyCollection extends ResourceCollection
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
            'data' => AgencyResource::collection($this->collection),
        ];
    }
}
