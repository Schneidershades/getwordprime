<?php

namespace App\Http\Resources\Freelancer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SavedProjectCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
