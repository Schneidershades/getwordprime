<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserScriptTypeToneResource extends JsonResource
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
            "script_type_allowed_tone" => $this->scriptType->tone ? true : false,
            "script_type_tone_question" => 'Choose a tone (Optional)',
            "tone" => $this->tone,
        ];
    }
}
