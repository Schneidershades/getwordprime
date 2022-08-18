<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptTypePresetResource extends JsonResource
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
            'scriptType' => $this->scriptType?->name,
            'label' => $this->label,
            'placeholder' => $this->placeholder,
            'field_type' => $this->field_type,
            'question' => $this->question,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
