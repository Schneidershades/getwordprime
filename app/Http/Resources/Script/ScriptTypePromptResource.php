<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptTypePromptResource extends JsonResource
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
            'scriptType' => $this->scriptType->name,
            'question' => $this->question,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
