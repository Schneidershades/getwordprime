<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptTypeCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'scriptTypes_count' => $this->scriptTypes_count,
            'scriptTypes' => ScriptTypeResource::collection($this->whenLoaded('scriptTypes')),
        ];
    }
}
