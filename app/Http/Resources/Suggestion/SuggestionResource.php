<?php

namespace App\Http\Resources\Suggestion;

use Illuminate\Http\Resources\Json\JsonResource;

class SuggestionResource extends JsonResource
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
            'message' => $this->message,
            'status' => $this->status,
            'user' => $this->user,
            'parent' => $this->parent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
