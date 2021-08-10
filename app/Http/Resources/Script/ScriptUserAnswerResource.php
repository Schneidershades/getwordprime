<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptUserAnswerResource extends JsonResource
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
            'answer' => $this->answer,
        ];
    }
}
