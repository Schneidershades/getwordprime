<?php

namespace App\Http\Resources\Suggestion;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SuggestionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}